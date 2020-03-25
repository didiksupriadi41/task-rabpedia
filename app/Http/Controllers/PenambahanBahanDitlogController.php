<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bahan;

class PenambahanBahanDitlogController extends Controller
{
    public function show_list_bahan(){
    	$bahan = Bahan::all();
    	$bahan_satuan = Bahan::select('satuan')->distinct()->get();
    	$bahan_kelompok = Bahan::select('kelompok_bahan')->distinct()->get();
    	$bahan_cabang = Bahan::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.ditlog.bahan', [
    		'bahan' => ($bahan), 
    		'bahan_satuan' => ($bahan_satuan),
    		'bahan_kelompok' => ($bahan_kelompok),  
    		'bahan_cabang' => ($bahan_cabang)
    	]);
	}

	public function show_list_bahan_user(){
    	$bahan = Bahan::all();
    	$bahan_satuan = Bahan::select('satuan')->distinct()->get();
    	$bahan_kelompok = Bahan::select('kelompok_bahan')->distinct()->get();
    	$bahan_cabang = Bahan::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.user.bahan', [
    		'bahan' => ($bahan), 
    		'bahan_satuan' => ($bahan_satuan),
    		'bahan_kelompok' => ($bahan_kelompok),  
    		'bahan_cabang' => ($bahan_cabang)
    	]);
    }

    public function deleteBahan(Request $request){
    	$id_bahan = $request->id_bahan;

    	$bahan_deleted = Bahan::where([
    		['id_bahan', '=', $id_bahan]
    	])->delete();

    	return response()->json([
    	]);
    }

    public function storeBahan(Request $request){
    	$validatedData = $request->validate([
    		'jenis_bahan_bangunan' => 'required', 
    		'satuan' => 'required', 
    		'harga_satuan' => 'required',
    		'kelompok_bahan' => 'required', 
    		'cabang_itb' => 'required' 
    	]);

    	$bahan = new Bahan;

    	$bahan->jenis_bahan_bangunan = $request->jenis_bahan_bangunan;
    	$bahan->satuan = $request->satuan;
    	$bahan->harga_satuan = $request->harga_satuan;
    	$bahan->kelompok_bahan = $request->kelompok_bahan;
    	$bahan->cabang_itb = $request->cabang_itb;

    	$bahan->save();

    	return response()->json([
    		'bahan' => ($bahan)
    	]);
    }

    public function updateBahan(Request $request){
    	$validatedData = $request->validate([
    		'id_bahan' => 'required',
    		'jenis_bahan_bangunan' => 'required', 
    		'harga_satuan' => 'required'
    	]);

    	$bahan = Bahan::where('id_bahan', $request->id_bahan)->first();

    	$bahan->jenis_bahan_bangunan = $request->jenis_bahan_bangunan;
    	$bahan->harga_satuan = $request->harga_satuan;

    	$bahan->save();

    	return response()->json([
    		'bahan' => ($bahan) 
    	]);
    }
}
