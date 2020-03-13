<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Pekerjaan;
use \App\PekerjaanKategori;

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
        $list_pekerjaan_kategori_table = PekerjaanKategori::all();
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
    	return view('unitkerja.lihat_katalog', [
    		'list_kategori' => ($list_kategori)
    	]);
    }
}