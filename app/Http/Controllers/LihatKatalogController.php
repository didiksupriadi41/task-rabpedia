<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Pekerjaan;

//Asumsi count($template) = count($content) 
function mapping($template, $content){
	$ret = [];
	for($i = 0; $i < count($template); $i++){
		$ret[$template[$i]] = $content[$i];
	}
	return $ret;
}

class LihatKatalogController extends Controller
{

    public function show_list_katalog(){
    	$kategori_template = ["ID Kategori", "Nama Kategori", "List Pekerjaan"];
		$pekerjaan_template = ["ID", "ID Pekerjaan", "Nama Pekerjaan", "Satuan", "Harga Satuan", "Cabang"];
        $list_pekerjaan_table = Pekerjaan::all();
		$pekerjaan=[];
		foreach($list_pekerjaan_table as $pekerjaan_table){
			array_push($pekerjaan, mapping($pekerjaan_template, [
				$pekerjaan_table->id,
				$pekerjaan_table->id_pekerjaan, 
				$pekerjaan_table->jenis_pekerjaan, 
				$pekerjaan_table->satuan,
				number_format($pekerjaan_table->harga_satuan, 2),
				$pekerjaan_table->cabang_itb
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
    	return view('unitkerja.lihat_katalog', [
    		'list_kategori' => ($list_kategori)
    	]);
	}
	
	public function search_list_katalog(Request $request){
		$search_pekerjaan = $request->search_pekerjaan;
    	$kategori_template = ["ID Kategori", "Nama Kategori", "List Pekerjaan"];
		$pekerjaan_template = ["ID", "ID Pekerjaan", "Nama Pekerjaan", "Satuan", "Harga Satuan", "Cabang"];
		$list_pekerjaan_table = Pekerjaan::where('jenis_pekerjaan','LIKE','%'.$search_pekerjaan.'%')->get();
		$pekerjaan=[];
		foreach($list_pekerjaan_table as $pekerjaan_table){
			array_push($pekerjaan, mapping($pekerjaan_template, [
				$pekerjaan_table->id,
				$pekerjaan_table->id_pekerjaan, 
				$pekerjaan_table->jenis_pekerjaan, 
				$pekerjaan_table->satuan,
				number_format($pekerjaan_table->harga_satuan, 2),
				$pekerjaan_table->cabang_itb
			]));
		}
		$kategori = [];
		$list_kategori_II = Pekerjaan::select('kategori_II')->distinct()->get();
		$array_kategori_II = [];
		foreach($list_kategori_II as $elemen_list_kategori_II){
			$elemen_pekerjaan = substr(Pekerjaan::select('id_pekerjaan')->where('kategori_II', $elemen_list_kategori_II->kategori_II)->first()->id_pekerjaan, 0, 2);
			array_push($array_kategori_II, $elemen_pekerjaan);
			// $filter_elemen = Pekerjaan::select('id_pekerjaan')->where('jenis_pekerjaan','LIKE','%'.$search_pekerjaan.'%')->where('kategori_II', $elemen_list_kategori_II->kategori_II)->get();
			// foreach($filter_elemen as $pekerjaan_elemen){
			// 	$elemen_pekerjaan = substr($pekerjaan_elemen['id_pekerjaan'], 0, 2);
			// }
			// array_push($array_kategori_II, $elemen_pekerjaan);

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
    	return view('unitkerja.lihat_katalog', [
    		'list_kategori' => ($list_kategori)
    	]);
	}
}