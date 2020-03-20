<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Pekerjaan;
use \App\Bahan;
use \App\Material;
use \App\Upah;
use \App\AnalisaBahan;
use \App\AnalisaMaterial;
use \App\AnalisaUpah;

//Asumsi count($template) = count($content) 
function mapping($template, $content){
    $ret = [];
    for($i = 0; $i < count($template); $i++){
        $ret[$template[$i]] = $content[$i];
    }
    return $ret;
}

class PenambahanPekerjaanDitlogController extends Controller
{

    public function show_list_pekerjaan(){
        $kategori_template = ["ID Kategori", "Nama Kategori", "List Pekerjaan"];
        $pekerjaan_template = ["ID", "ID Pekerjaan", "Nama Pekerjaan", "Satuan", "Harga Satuan", "Cabang", "Analisis"];
        $analisis_template = ["ID", "Tipe", "Bahan-Upah-Material", "Koefisien", "Satuan", "Harga Satuan"];
        $list_pekerjaan_table = Pekerjaan::all();
        $list_analisa_bahan_table = AnalisaBahan::all();
        $list_analisa_upah_table = AnalisaUpah::all();
        $list_analisa_material_table = AnalisaMaterial::all();
        $analisa = [];
        $last_id = Pekerjaan::select('id')->orderBy('id', 'desc')->first()->id;
        for($i = 0; $i < $last_id; $i++){
            array_push($analisa, []);
        }
        foreach($list_analisa_bahan_table as $analisa_bahan_table){
            $pekerjaan_id = $analisa_bahan_table->id;
            $bahan_id = $analisa_bahan_table->id_bahan;
            $bahan = Bahan::where('id_bahan', $bahan_id)->firstOrFail();
            array_push($analisa[$pekerjaan_id-1], mapping($analisis_template, [
                $analisa_bahan_table->id_analisa_bahan, 
                "bahan", 
                $bahan->jenis_bahan_bangunan, 
                number_format($analisa_bahan_table->koefisien, 4), 
                $bahan->satuan, 
                number_format($bahan->harga_satuan, 2)
            ]));
        }
        foreach($list_analisa_upah_table as $analisa_upah_table){
            $pekerjaan_id = $analisa_upah_table->id;
            $upah_id = $analisa_upah_table->id_upah;
            $upah = Upah::where('id_upah', $upah_id)->firstOrFail();
            array_push($analisa[$pekerjaan_id-1], mapping($analisis_template, [
                $analisa_upah_table->id_analisa_upah, 
                "upah", 
                $upah->jenis_pekerja, 
                number_format($analisa_upah_table->koefisien, 4), 
                $upah->satuan, 
                number_format($upah->harga_satuan, 2)
            ]));
        }
        foreach($list_analisa_material_table as $analisa_material_table){
            $pekerjaan_id = $analisa_material_table->id;
            $material_id = $analisa_material_table->id_material;
            $material = Material::where('id_material', $material_id)->firstOrFail();
            array_push($analisa[$pekerjaan_id-1], mapping($analisis_template, [
                $analisa_material_table->id_analisa_material, 
                "material", 
                $material->item_material,
                number_format($analisa_material_table->koefisien, 4), 
                $material->satuan, 
                number_format($material->harga_satuan, 2)
            ]));
        }
        $pekerjaan=[];
        foreach($list_pekerjaan_table as $pekerjaan_table){
            array_push($pekerjaan, mapping($pekerjaan_template, [
                $pekerjaan_table->id,
                $pekerjaan_table->id_pekerjaan, 
                $pekerjaan_table->jenis_pekerjaan, 
                $pekerjaan_table->satuan,
                number_format($pekerjaan_table->harga_satuan, 2),
                $pekerjaan_table->cabang_itb, 
                $analisa[($pekerjaan_table->id)-1]
            ]));
        }
        $kategori = [];
        $list_kategori_II = Pekerjaan::select('kategori_II')->distinct()->get();
        $array_kategori_II = [];
        foreach($list_kategori_II as $elemen_list_kategori_II){
            $elemen_pekerjaan = substr(Pekerjaan::select('id_pekerjaan')->where('kategori_II', $elemen_list_kategori_II->kategori_II)->first()->id_pekerjaan, 0, 2);
            array_push($array_kategori_II, $elemen_pekerjaan);
        }
        $num_kategori_II = $list_kategori_II->count();
        for($i = 0; $i < $num_kategori_II; $i++){
            array_push($kategori, []);
        }
        foreach($pekerjaan as $elemen_pekerjaan){
            $kategori_num = (array_search(substr($elemen_pekerjaan["ID Pekerjaan"], 0, 2), $array_kategori_II));
            array_push($kategori[$kategori_num], $elemen_pekerjaan);
        }
        $list_kategori = [];
        for($i = 0; $i < $num_kategori_II; $i++){
            array_push($list_kategori, mapping($kategori_template, [
                $array_kategori_II[$i], 
                $list_kategori_II[$i]->kategori_II, 
                $kategori[$i]
            ]));
        }
        $bahan = Bahan::all();
        $upah = Upah::all();
        $material = Material::all();
        $pekerjaan_satuan = Pekerjaan::select('satuan')->distinct()->get();
        $pekerjaan_cabang = Pekerjaan::select('cabang_itb')->distinct()->get();
        return view('unitkerja.penambahan.ditlog.pekerjaan', [
            'list_kategori' => ($list_kategori), 
            'bahan' => ($bahan), 
            'upah' => ($upah), 
            'material' => ($material), 
            'pekerjaan_satuan' => ($pekerjaan_satuan), 
            'pekerjaan_cabang' => ($pekerjaan_cabang)
        ]);
    }

    public function deletePekerjaan(Request $request){
        $pekerjaan_id = $request->id;

        $analisa_bahan_deleted = AnalisaBahan::where([
            ['id', '=', $pekerjaan_id]
        ])->delete();
        $analisa_upah_deleted = AnalisaUpah::where([
            ['id', '=', $pekerjaan_id]
        ])->delete();
        $analisa_material_deleted = AnalisaMaterial::where([
            ['id', '=', $pekerjaan_id]
        ])->delete();

        $pekerjaan_deleted = Pekerjaan::where([
            ['id', '=', $pekerjaan_id]
        ])->delete();

        return response()->json();
    }

    public function storePekerjaan(Request $request){
        $validatedData = $request->validate([
            'jenis_pekerjaan' => 'required', 
            'spesifikasi_teknis' => 'required', 
            'satuan' => 'required',
            'harga_satuan' => 'required',
            'cabang_itb' => 'required' 
        ]);

        $pekerjaan = new Pekerjaan;

        $pekerjaan_kategori_II = Pekerjaan::select('kategori_II')->where('id_pekerjaan', ($request->id_kategori."-001"))->first();
        $last_id_pekerjaan = Pekerjaan::select('id_pekerjaan')->where([
            ['cabang_itb', "=", $request->cabang_itb], 
            ['kategori_II', "=", $pekerjaan_kategori_II->kategori_II]
        ])->orderBy('id', 'desc')->first()->id_pekerjaan;

        $int_last_id_pekerjaan = intval(substr($last_id_pekerjaan, 3, 3));
        $new_int_id_pekerjaan = $int_last_id_pekerjaan + 1;
        $new_id_pekerjaan = "";

        //Max digit is 3
        if ($new_int_id_pekerjaan < 10){
            $new_id_pekerjaan = $request->id_kategori."-00".$new_int_id_pekerjaan;
        } else if ($new_int_id_pekerjaan < 100){
            $new_id_pekerjaan = $request->id_kategori."-0".$new_int_id_pekerjaan;
        } else {
            $new_id_pekerjaan = $request->id_kategori."-".$new_int_id_pekerjaan;
        }

        $pekerjaan->id_pekerjaan = $new_id_pekerjaan;
        $pekerjaan->jenis_pekerjaan = $request->jenis_pekerjaan;
        $pekerjaan->spesifikasi_teknis = $request->spesifikasi_teknis;
        $pekerjaan->satuan = $request->satuan;
        $pekerjaan->harga_satuan = $request->harga_satuan;
        $pekerjaan->cabang_itb = $request->cabang_itb;
        $pekerjaan->kategori_I = Pekerjaan::select('kategori_I')->where('kategori_II', $pekerjaan_kategori_II->kategori_II)->first()->kategori_I;
        $pekerjaan->kategori_II = $pekerjaan_kategori_II->kategori_II;

        $pekerjaan->save();

        $pekerjaan_template = ["ID", "ID Pekerjaan", "Nama Pekerjaan", "Satuan", "Harga Satuan", "Cabang", "Analisis"];
        return response()->json([
            "ID" => $pekerjaan->id,
            "ID Pekerjaan" => $pekerjaan->id_pekerjaan, 
            "Nama Pekerjaan" => $pekerjaan->jenis_pekerjaan,
            "Satuan" => $pekerjaan->satuan,
            "Harga Satuan" => number_format($pekerjaan->harga_satuan, 2), 
            "Cabang" => $pekerjaan->cabang_itb,
            "Analisis" => [], 
            "Int Last ID Pekerjaan" => $last_id_pekerjaan
        ]);
    }

    public function deleteAnalisa(Request $request){

        $id_analisa_tipe = $request->id_analisa_tipe;
        $id_analisa = $request->id_analisa;
        $pekerjaan_harga_satuan = 0;
        $pekerjaan_id_pekerjaan = "";

        if(substr($id_analisa_tipe, 0, 4) == "baha"){
            $analisa_bahan = AnalisaBahan::where('id_analisa_bahan', $id_analisa)->first();
            $bahan = Bahan::where('id_bahan', $analisa_bahan->id_bahan)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_bahan->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round(($analisa_bahan->koefisien * $bahan->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_bahan_deleted = AnalisaBahan::where([
                ['id_analisa_bahan', '=', $id_analisa]
            ])->delete();
        } elseif(substr($id_analisa_tipe, 0, 4) == "upah"){
            $analisa_upah = AnalisaUpah::where('id_analisa_upah', $id_analisa)->first();
            $upah = Upah::where('id_upah', $analisa_upah->id_upah)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_upah->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round(($analisa_upah->koefisien * $upah->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_upah_deleted = AnalisaUpah::where([
                ['id_analisa_upah', '=', $id_analisa]
            ])->delete();
        } elseif(substr($id_analisa_tipe, 0, 4) == "mate"){
            $analisa_material = AnalisaUpah::where('id_analisa_material', $id_analisa)->first();
            $material = Material::where('id_material', $analisa_material->id_material)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_material->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round(($analisa_material->koefisien * $material->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_material_deleted = AnalisaMaterial::where([
                ['id_analisa_material', '=', $id_analisa]
            ])->delete();
        }

        return response()->json([
            'ID Pekerjaan' => $pekerjaan_id_pekerjaan, 
            'Harga Satuan Pekerjaan' => number_format($pekerjaan_harga_satuan, 2)
        ]);     
    }

    public function updateAnalisa(Request $request){
        $validatedData = $request->validate([
            'koefisien' => 'required'
        ]);

        $id_analisa_tipe = $request->id_analisa_tipe;
        $id_analisa = $request->id_analisa;
        $pekerjaan_harga_satuan = 0;
        $pekerjaan_id_pekerjaan = "";

        if(substr($id_analisa_tipe, 0, 4) == "baha"){
            $analisa_bahan = AnalisaBahan::where('id_analisa_bahan', $id_analisa)->first();
            $bahan = Bahan::where('id_bahan', $analisa_bahan->id_bahan)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_bahan->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round((($analisa_bahan->koefisien - $request->koefisien) * $bahan->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_bahan->koefisien = $request->koefisien;
            $analisa_bahan->save();
        } elseif(substr($id_analisa_tipe, 0, 4) == "upah"){
            $analisa_upah = AnalisaUpah::where('id_analisa_upah', $id_analisa)->first();
            $upah = Upah::where('id_upah', $analisa_upah->id_upah)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_upah->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round((($analisa_upah->koefisien - $request->koefisien) * $upah->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_upah->koefisien = $request->koefisien;
            $analisa_upah->save();
        } elseif(substr($id_analisa_tipe, 0, 4) == "mate"){
            $analisa_material = AnalisaMaterial::where('id_analisa_material', $id_analisa)->first();
            $material = Material::where('id_material', $analisa_material->id_material)->first();
            $pekerjaan = Pekerjaan::where('id', $analisa_material->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round((($analisa_material->koefisien - $request->koefisien) * $material->harga_satuan)*1.1, -2);
            $pekerjaan_id_pekerjaan = $pekerjaan->id_pekerjaan;
            $pekerjaan_harga_satuan = $pekerjaan->harga_satuan;
            $pekerjaan->save();
            $analisa_material->koefisien = $request->koefisien;
            $analisa_material->save();
        }
        return response()->json([
            'ID Pekerjaan' => $pekerjaan->id_pekerjaan, 
            'Harga Satuan Pekerjaan' => number_format($pekerjaan->harga_satuan, 2), 
            'Koefisien' => number_format($request->koefisien, 4)
        ]);
    }

    public function storeAnalisa(Request $request){
        if($request->tipe_analisa == "bahan"){
            $analisa_bahan = new AnalisaBahan;

            $analisa_bahan->id_bahan = $request->id_analisa;
            $analisa_bahan->id = $request->id_pekerjaan;
            $analisa_bahan->koefisien = $request->koefisien;

            $analisa_bahan->save();
            $bahan = Bahan::where('id_bahan', $analisa_bahan->id_bahan)->first();

            $pekerjaan = Pekerjaan::where('id', $analisa_bahan->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round(($analisa_bahan->koefisien * $bahan->harga_satuan)*1.1, -2);
            $pekerjaan->save();

            return response()->json([
                'ID Pekerjaan' => $pekerjaan->id_pekerjaan, 
                'Harga Satuan Pekerjaan' => number_format($pekerjaan->harga_satuan, 2), 
                'ID'=> $analisa_bahan->id_analisa_bahan, 
                'Tipe' => "bahan", 
                'Bahan-Upah-Material'=> $bahan->jenis_bahan_bangunan, 
                'Koefisien' => number_format($analisa_bahan->koefisien, 4), 
                'Satuan'=> $bahan->satuan, 
                'Harga Satuan'=> number_format($bahan->harga_satuan, 2)
            ]);
        } else if($request->tipe_analisa == "upah"){
            $analisa_upah = new AnalisaUpah;

            $analisa_upah->id_upah = $request->id_analisa;
            $analisa_upah->id = $request->id_pekerjaan;
            $analisa_upah->koefisien = $request->koefisien;

            $analisa_upah->save();
            $upah = Upah::where('id_upah', $analisa_upah->id_upah)->first();

            $pekerjaan = Pekerjaan::where('id', $analisa_upah->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round(($analisa_upah->koefisien * $upah->harga_satuan)*1.1, -2);
            $pekerjaan->save();

            return response()->json([
                'ID Pekerjaan' => $pekerjaan->id_pekerjaan, 
                'Harga Satuan Pekerjaan' => number_format($pekerjaan->harga_satuan, 2), 
                'ID'=> $analisa_upah->id_analisa_upah, 
                'Tipe' => "upah", 
                'Bahan-Upah-Material'=> $upah->jenis_pekerja, 
                'Koefisien' => number_format($analisa_upah->koefisien, 4), 
                'Satuan'=> $upah->satuan, 
                'Harga Satuan'=> number_format($upah->harga_satuan, 2)
            ]);
        } else if($request->tipe_analisa == "material"){
            $analisa_material = new AnalisaMaterial;

            $analisa_material->id_material = $request->id_analisa;
            $analisa_material->id = $request->id_pekerjaan;
            $analisa_material->koefisien = $request->koefisien;

            $analisa_material->save();
            $material = Material::where('id_material', $analisa_material->id_material)->first();

            $pekerjaan = Pekerjaan::where('id', $analisa_material->id)->first();
            $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round(($analisa_material->koefisien * $material->harga_satuan)*1.1, -2);
            $pekerjaan->save();

            return response()->json([
                'ID Pekerjaan' => $pekerjaan->id_pekerjaan, 
                'Harga Satuan Pekerjaan' => number_format($pekerjaan->harga_satuan, 2), 
                'ID'=> $analisa_material->id_analisa_material, 
                'Tipe' => "material", 
                'Bahan-Upah-Material'=> $material->jenis_material, 
                'Koefisien' => number_format($analisa_material->koefisien, 4), 
                'Satuan'=> $material->satuan, 
                'Harga Satuan'=> number_format($material->harga_satuan, 2)
            ]);
        }        
    }
}
