<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Upah;
use \App\PengajuanUpahInsert;

class PenambahanUpahDitlogController extends Controller
{
    public function show_list_upah(){
    	$upah = Upah::all();
    	$upah_satuan = Upah::select('satuan')->distinct()->get();
    	$upah_cabang = Upah::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.ditlog.upah', [
    		'upah' => ($upah), 
    		'upah_satuan' => ($upah_satuan), 
    		'upah_cabang' => ($upah_cabang)
    	]);
	}
	
	public function show_list_upah_user(){
    	$upah = Upah::all();
    	$upah_satuan = Upah::select('satuan')->distinct()->get();
    	$upah_cabang = Upah::select('cabang_itb')->distinct()->get();
    	return view('unitkerja.penambahan.user.upah', [
    		'upah' => ($upah), 
    		'upah_satuan' => ($upah_satuan), 
    		'upah_cabang' => ($upah_cabang)
    	]);
    }

    public function deleteUpah(Request $request){
    	$id_upah = $request->id_upah;

    	$upah_deleted = Upah::where([
    		['id_upah', '=', $id_upah]
    	])->delete();

    	return response()->json([
    	]);
    }

    public function storeUpah(Request $request){
    	$validatedData = $request->validate([
    		'jenis_pekerja' => 'required', 
    		'satuan' => 'required', 
    		'harga_satuan' => 'required', 
    		'cabang_itb' => 'required' 
    	]);

    	$upah = new Upah;

    	$upah->jenis_pekerja = $request->jenis_pekerja;
    	$upah->satuan = $request->satuan;
    	$upah->harga_satuan = $request->harga_satuan;
    	$upah->cabang_itb = $request->cabang_itb;

    	$upah->save();

    	return response()->json([
    		'upah' => ($upah)
    	]);
	}
	
	public function storeUpahUser(Request $request){
    	$validatedData = $request->validate([
    		'jenis_pekerja' => 'required', 
    		'satuan' => 'required', 
    		'harga_satuan' => 'required', 
			'cabang_itb' => 'required',
			'id_pengaju' => 'required',
			'komentar' => 'required',
    	]);

    	$upah = new PengajuanUpahInsert;

    	$upah->jenis_pekerja = $request->jenis_pekerja;
    	$upah->satuan = $request->satuan;
    	$upah->harga_satuan = $request->harga_satuan;
		$upah->cabang_itb = $request->cabang_itb;
		$upah->id_pengaju = $request->id_pengaju;
		$upah->komentar = $request->komentar;

    	$upah->save();

    	return response()->json([
    		'upah' => ($upah)
    	]);
    }

    public function updateUpah(Request $request){
    	$validatedData = $request->validate([
    		'id_upah' => 'required',
    		'jenis_pekerja' => 'required', 
    		'harga_satuan' => 'required'
    	]);

    	$upah = Upah::where('id_upah', $request->id_upah)->first();

    	$upah->jenis_pekerja = $request->jenis_pekerja;
    	$upah->harga_satuan = $request->harga_satuan;

    	$upah->save();

    	return response()->json([
    		'upah' => ($upah) 
    	]);
    }
}
