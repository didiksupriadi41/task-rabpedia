<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use \App\Pengajuan;
use \App\Pekerjaan;
use \App\DetailPengajuan;
use \App\AnalisaDetailPengajuan;

class StatusPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail_pengajuan()
    {
        $pengajuan = Pengajuan::all();
        $detail_pengajuan = DetailPengajuan::all();
        return view('unitkerja.riwayat', compact(['pengajuan', 'detail_pengajuan']));
    }

    public function redirect_page_detail_pengajuan()
    {
        return view('lihat-katalog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengajuan = Pengajuan::where('id_pengajuan', $id)->firstOrFail();     
        $detail_pengajuan = DetailPengajuan::all();
        $analisa_detail_pengajuan = AnalisaDetailPengajuan::all();
        return view('unitkerja.detail_pengajuan', compact(['pengajuan', 'detail_pengajuan', 'analisa_detail_pengajuan']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
