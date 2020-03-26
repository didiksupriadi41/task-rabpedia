<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Bahan;
use \App\PengajuanBahanInsert;
use \App\PengajuanBahanUpdate;
use \App\PengajuanBahanDelete;

class PenyetujuanBahanDitlogController extends Controller
{
        public function show_list_bahan_pengajuan(){
        $bahan_insert = PengajuanBahanInsert::all();
        $bahan_update = PengajuanBahanUpdate::all();
        $bahan_delete = PengajuanBahanDelete::join('bahan', 'pengajuan_bahan_delete.id_bahan_delete', '=', 'bahan.id_bahan')
                            ->select('id', 'id_bahan', 'jenis_bahan_bangunan', 'satuan', 'harga_satuan', 'kelompok_bahan', 'cabang_itb', 'id_pengaju', 'komentar')
                            ->distinct()
                            ->get();
    	return view('unitkerja.persetujuan.ditlog.bahan', [
    		'bahan_insert' => ($bahan_insert), 
    		'bahan_update' => ($bahan_update),
    		'bahan_delete' => ($bahan_delete)
    	]);
        }

        public function insert_bahan_insert_user(Request $request){
            $validatedData = $request->validate([
                'id' => 'required',
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

            $this->delete_bahan_user($request);
    
            return response()->json([
                'bahan' => ($bahan)
            ]); 
        }

        public function insert_bahan_update_user(Request $request){
            $validatedData = $request->validate([
                'id' => 'required',
                'id_bahan' => 'required',
                'jenis_bahan_bangunan' => 'required', 
                'harga_satuan' => 'required'
            ]);
    
    
            $bahan = Bahan::where('id_bahan', $request->id_bahan)->first();
    
            $bahan->jenis_bahan_bangunan = $request->jenis_bahan_bangunan;
            $bahan->harga_satuan = $request->harga_satuan;    
    
            $bahan->save();
            $this->delete_bahan_update_user($request);

            return response()->json([
                'bahan' => ($bahan) 
            ]);    
        }

        public function insert_bahan_delete_user(Request $request){
            $id = $request->id;
            $id_bahan = $request->id_bahan;

            $this->delete_bahan_delete_user($request);

            $bahan_deleted = Bahan::where([
                ['id_bahan', '=', $id_bahan]
            ])->delete();
    

            return response()->json([
            ]);    
        }
    
        public function delete_bahan_insert_user(Request $request){
            $id = $request->id;
            $bahan_deleted = PengajuanBahanInsert::where([
                ['id', '=', $id]
            ])->delete();
    
            return response()->json([
            ]);
        }

        public function delete_bahan_update_user(Request $request){
            $id = $request->id;
            $bahan_deleted = PengajuanBahanUpdate::where([
                ['id', '=', $id]
            ])->delete();
    
            return response()->json([
            ]);
        }

        public function delete_bahan_delete_user(Request $request){
            $id = $request->id;
            $bahan_deleted = PengajuanBahanDelete::where([
                ['id', '=', $id]
            ])->delete();
    
            return response()->json([
            ]);
        }

}