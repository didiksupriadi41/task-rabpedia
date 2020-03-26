<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\PengajuanMaterialInsert;
use \App\PengajuanMaterialUpdate;
use \App\PengajuanMaterialDelete;

class PenyetujuanMaterialDitlogController extends Controller
{
        public function show_list_material_pengajuan(){
        $material_insert = PengajuanMaterialInsert::all();
        $material_update = PengajuanMaterialUpdate::all();
        $material_delete = PengajuanMaterialDelete::join('material', 'pengajuan_material_delete.id_material_delete', '=', 'material.id_material')
                            ->select('id_material', 'item_material', 'volume', 'satuan', 'harga_pembanding', 'harga_saat_ini', 'harga_satuan', 'keterangan_tambahan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.material', [
    		'material_insert' => ($material_insert), 
    		'material_update' => ($material_update),
    		'material_delete' => ($material_delete)
    	]);
    }
}