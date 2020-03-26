<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PengajuanUpahInsert;
use \App\PengajuanUpahUpdate;
use \App\PengajuanUpahDelete;

class PenyetujuanUpahDitlogController extends Controller
{
        public function show_list_upah_pengajuan(){
        $upah_insert = PengajuanUpahInsert::all();
        $upah_update = PengajuanUpahUpdate::all();
        $upah_delete = PengajuanUpahDelete::join('upah', 'pengajuan_upah_delete.id_upah_delete', '=', 'upah.id_upah')
                            ->select('id_upah', 'jenis_pekerja', 'satuan', 'harga_satuan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.upah', [
    		'upah_insert' => ($upah_insert), 
    		'upah_update' => ($upah_update),
    		'upah_delete' => ($upah_delete)
    	]);
    }
}