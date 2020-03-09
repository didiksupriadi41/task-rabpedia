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
use \App\PekerjaanKategori;

//Asumsi count($template) = count($content) 
function mapping($template, $content){
	$ret = [];
	for($i = 0; $i < count($template); $i++){
		$ret[$template[$i]] = $content[$i];
	}
	return $ret;
}

function search_kategori_in_message($kategori_id, $message) {
    foreach ($message as $message_part) {
        if(is_array($message_part) && $message_part["ID Kategori"] == $kategori_id){
        	return $message_part;
        }
    }
    return false;
}

class PenambahanKatalogJasaController extends Controller
{

    public function show_list_jasa(){
    	$kategori_template = ["ID Kategori", "Nama Kategori", "List Pekerjaan"];
		$pekerjaan_template = ["ID", "ID Pekerjaan", "Nama Pekerjaan", "Satuan", "Harga Satuan", "Cabang", "Analisis"];
		$analisis_template = ["ID", "Tipe", "Bahan-Upah-Material", "Koefisien", "Satuan", "Harga Satuan"];
		$list_pekerjaan_table = Pekerjaan::all();
		$list_analisa_bahan_table = AnalisaBahan::all();
		$list_analisa_upah_table = AnalisaUpah::all();
		$list_analisa_material_table = AnalisaMaterial::all();
		$analisa = [];
		foreach($list_pekerjaan_table as $pekerjaan_table){
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
		$num_kategori = 16;
		for($i = 0; $i < $num_kategori; $i++){
			array_push($kategori, []);
		}
		foreach($pekerjaan as $elemen_pekerjaan){
			$pekerjaan_kategori_id = substr($elemen_pekerjaan["ID Pekerjaan"], 0, 2);
			$kategori_num = (PekerjaanKategori::where('id_kategori', $pekerjaan_kategori_id)->first()->id)-1;
			array_push($kategori[$kategori_num], $elemen_pekerjaan);
		}
		$list_kategori = [];
		$pekerjaan_kategori = PekerjaanKategori::all();
		foreach($pekerjaan_kategori as $elemen_pekerjaan_kategori){
			array_push($list_kategori, mapping($kategori_template, [
				$elemen_pekerjaan_kategori->id_kategori, 
				$elemen_pekerjaan_kategori->nama_kategori, 
				$kategori[($elemen_pekerjaan_kategori->id)-1]
			]));
		}
		$bahan = Bahan::all();
		$upah = Upah::all();
		$material = Material::all();
    	return view('unitkerja.penambahankatalog', [
    		'list_kategori' => ($list_kategori), 
    		'bahan' => ($bahan), 
    		'upah' => ($upah), 
    		'material' => ($material)
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
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round($analisa_bahan->koefisien * $bahan->harga_satuan, -2);
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
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round($analisa_upah->koefisien * $upah->harga_satuan, -2);
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
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan - round($analisa_material->koefisien * $material->harga_satuan, -2);
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

    public function storeAnalisa(Request $request){
    	if($request->tipe_analisa == "bahan"){
    		$analisa_bahan = new AnalisaBahan;

	        $analisa_bahan->id_bahan = $request->id_analisa;
	        $analisa_bahan->id = $request->id_pekerjaan;
	        $analisa_bahan->koefisien = $request->koefisien;

	        $analisa_bahan->save();
	        $bahan = Bahan::where('id_bahan', $analisa_bahan->id_bahan)->first();

	        $pekerjaan = Pekerjaan::where('id', $analisa_bahan->id)->first();
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round($analisa_bahan->koefisien * $bahan->harga_satuan, -2);
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
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round($analisa_upah->koefisien * $upah->harga_satuan, -2);
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
    		$analisa_material = new AnalisaBahan;

	        $analisa_material->id_material = $request->id_analisa;
	        $analisa_material->id = $request->id_pekerjaan;
	        $analisa_material->koefisien = $request->koefisien;

	        $analisa_material->save();
	        $material = Material::where('id_material', $analisa_material->id_material)->first();

	        $pekerjaan = Pekerjaan::where('id', $analisa_material->id)->first();
	        $pekerjaan->harga_satuan = $pekerjaan->harga_satuan + round($analisa_material->koefisien * $material->harga_satuan, -2);
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
