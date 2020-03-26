<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Pekerjaan;
use App\DetailPengajuan;
use App\AnalisaDetailPengajuan;
use Illuminate\Http\Request;

class PersetujuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengajuan = Pengajuan::all();
        // dump($pengajuan);
        $detail_pengajuan = DetailPengajuan::all();
        // dump($detail_pengajuan);
        $pekerjaan = Pekerjaan::all();
        // dump($pekerjaan);
        $pengajuan = Pengajuan::all();
      return view('unitkerja.persetujuan.index', compact(['pengajuan', 'detail_pengajuan', 'pekerjaan']));
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
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengajuan $pengajuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
      $pengajuan = Pengajuan::find($id);
      $detail_pengajuan = DetailPengajuan::where('id_pengajuan', $id)->orderBy('kategori_I', 'asc')->orderBy('kategori_II', 'asc')->get();
      $analisa_detail_pengajuan = AnalisaDetailPengajuan::all();
      return view('unitkerja.persetujuan.edit', compact(['pengajuan', 'detail_pengajuan', 'analisa_detail_pengajuan']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $pengajuan = Pengajuan::find($id);

      $pengajuan->status_pengajuan = request('status_pengajuan');
      $pengajuan->komentar = request('komentar');
      $pengajuan->save();

      return redirect('/riwayat-pengajuan/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengajuan  $pengajuan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengajuan $pengajuan)
    {
        //
    }
}
