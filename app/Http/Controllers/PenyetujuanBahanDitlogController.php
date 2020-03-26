<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PengajuanBahanInsert;
use \App\PengajuanBahanUpdate;
use \App\PengajuanBahanDelete;

class PenyetujuanBahanDitlogController extends Controller
{
        public function show_list_bahan_pengajuan(){
        $bahan_insert = PengajuanBahanInsert::all();
        $bahan_update = PengajuanBahanUpdate::all();
        $bahan_delete = PengajuanBahanDelete::join('bahan', 'pengajuan_bahan_delete.id_bahan_delete', '=', 'bahan.id_bahan')
                            ->select('id_bahan', 'jenis_bahan_bangunan', 'satuan', 'harga_satuan', 'kelompok_bahan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.bahan', [
    		'bahan_insert' => ($bahan_insert), 
    		'bahan_update' => ($bahan_update),
    		'bahan_delete' => ($bahan_delete)
    	]);
    }
}