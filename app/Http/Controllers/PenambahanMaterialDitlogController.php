<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Material;

class PenambahanMaterialDitlogController extends Controller
{
    public function show_list_material(){
    	$material = Material::all();
    	$material_satuan = Material::select('satuan')->distinct()->get();
    	$material_cabang = Material::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.ditlog.material', [
    		'material' => ($material), 
    		'material_satuan' => ($material_satuan),
    		'material_cabang' => ($material_cabang)
    	]);
	}
	
	public function show_list_material_user(){
    	$material = Material::all();
    	$material_satuan = Material::select('satuan')->distinct()->get();
    	$material_cabang = Material::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.user.material', [
    		'material' => ($material), 
    		'material_satuan' => ($material_satuan),
    		'material_cabang' => ($material_cabang)
    	]);
    }

    public function deleteMaterial(Request $request){
    	$id_material = $request->id_material;

    	$material_deleted = Material::where([
    		['id_material', '=', $id_material]
    	])->delete();

    	return response()->json([
    	]);
    }

    public function storeMaterial(Request $request){
    	$validatedData = $request->validate([
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

    	return response()->json([
    		'material' => ($material)
    	]);
    }

    public function updateMaterial(Request $request){
    	$validatedData = $request->validate([
    		'id_material' => 'required',
    		'item_material' => 'required',
    		'harga_pembanding' => 'required', 
    		'harga_saat_ini' => 'required',  
    		'harga_satuan' => 'required'
    	]);

    	$material = Material::where('id_material', $request->id_material)->first();

    	$material->item_material = $request->item_material;
    	$material->volume = $request->volume;
    	$material->harga_pembanding = $request->harga_pembanding;
    	$material->harga_saat_ini = $request->harga_saat_ini;
    	$material->harga_satuan = $request->harga_satuan;
    	$material->keterangan_tambahan = $request->keterangan_tambahan;

    	$material->save();

    	return response()->json([
    		'material' => ($material) 
    	]);
    }
}
