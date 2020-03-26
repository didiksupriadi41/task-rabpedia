<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Upah;
use \App\PengajuanUpahInsert;
use \App\PengajuanUpahUpdate;
use \App\PengajuanUpahDelete;

class PenyetujuanUpahDitlogController extends Controller
{
    public function show_list_upah_pengajuan(){
        $upah_insert = PengajuanUpahInsert::all();
        $upah_update = PengajuanUpahUpdate::all();
        $upah_delete = PengajuanUpahDelete::join('upah', 'pengajuan_upah_delete.id_upah_delete', '=', 'upah.id_upah')
                            ->select('id', 'id_upah', 'jenis_pekerja', 'satuan', 'harga_satuan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.upah', [
    		'upah_insert' => ($upah_insert), 
    		'upah_update' => ($upah_update),
    		'upah_delete' => ($upah_delete)
    	]);
    }

    public function insert_upah_insert_user(Request $request){
        $validatedData = $request->validate([
            'id' => 'required',
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

        $this->delete_upah_insert_user($request);

        return response()->json([
            'upah' => ($upah)
        ]); 
    }

    public function delete_upah_insert_user(Request $request){
        $id = $request->id;
        $bahan_deleted = PengajuanUpahInsert::where([
            ['id', '=', $id]
        ])->delete();

        return response()->json([
        ]);
    }
}