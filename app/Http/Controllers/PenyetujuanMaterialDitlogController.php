<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Material;
use \App\PengajuanMaterialInsert;
use \App\PengajuanMaterialUpdate;
use \App\PengajuanMaterialDelete;

class PenyetujuanMaterialDitlogController extends Controller
{
        public function show_list_material_pengajuan(){
        $material_insert = PengajuanMaterialInsert::all();
        $material_update = PengajuanMaterialUpdate::all();
        $material_delete = PengajuanMaterialDelete::join('material', 'pengajuan_material_delete.id_material_delete', '=', 'material.id_material')
                            ->select('id', 'id_material', 'item_material', 'volume', 'satuan', 'harga_pembanding', 'harga_saat_ini', 'harga_satuan', 'keterangan_tambahan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.material', [
    		'material_insert' => ($material_insert), 
    		'material_update' => ($material_update),
    		'material_delete' => ($material_delete)
    	]);
    }

    public function insert_material_delete_user(Request $request){
    	$validatedData = $request->validate([
            'id' => 'required',
    		'item_material' => 'required', 
    		'volume' => 'required', 
    		'satuan' => 'required', 
    		'harga_pembanding' => 'required', 
    		'harga_saat_ini' => 'required', 
            'harga_satuan' => 'required',
    		'cabang_itb' => 'required' 
    	]);

    	$material = new Material;

    	$material->item_material = $request->item_material;
    	$material->volume = $request->volume;
    	$material->satuan = $request->satuan;
    	$material->harga_pembanding = $request->harga_pembanding;
    	$material->harga_saat_ini = $request->harga_saat_ini;
    	$material->harga_satuan = $request->harga_satuan;
    	$material->keterangan_tambahan = $request->keterangan_tambahan;
    	$material->cabang_itb = $request->cabang_itb;

        $material->save();
        
        $this->delete_material_insert_user($request);

    	return response()->json([
    		'material' => ($material)
    	]);
    }
    
    public function insert_material_update_user(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
            'id_material' => 'required',
            'item_material' => 'required', 
            'volume' => 'required',
            'harga_pembanding' => 'required',
            'harga_saat_ini' => 'required',
            'harga_satuan' => 'required',
        ]);


        $material = Material::where('id_material', $request->id_material)->first();

        $material->item_material = $request->item_material;
        $material->volume = $request->volume;
        $material->harga_pembanding = $request->harga_pembanding;    
        $material->harga_saat_ini = $request->harga_saat_ini;    
        $material->harga_satuan = $request->harga_satuan;    

        $material->save();
        $this->delete_material_update_user($request);

        return response()->json([
            'material' => ($material) 
        ]);    
    }
    

    public function delete_material_insert_user(Request $request){
        $id = $request->id;
        $bahan_deleted = PengajuanMaterialInsert::where([
            ['id', '=', $id]
        ])->delete();

        return response()->json([
        ]);
    }

    public function delete_material_update_user(Request $request){
        $id = $request->id;
        $bahan_deleted = PengajuanMaterialUpdate::where([
            ['id', '=', $id]
        ])->delete();

        return response()->json([
        ]);
    }
}