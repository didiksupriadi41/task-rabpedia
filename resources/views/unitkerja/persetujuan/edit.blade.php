@extends('master')

@section('title', 'Pengajuan')

@section('content')

<div class="container">
    <div class="row p-3">
        <button type="button" class="btn btn-success bg-primary px-5">
            <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                Print
        </button>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="RAB-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">RAB</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="analisa-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Analisa Harga Satuan</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="RAB-tab">
        <div class="row align-items-center">
                <div class="col">
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-left text-dark" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>{{ $pengajuan->nama_rab }}</span><br>
                                        <span>{{ $pengajuan->created_at }}</span>
                                    </button>
                                </h2>
                                <div class="d-flex align-items-center">
                                    @if($pengajuan->status_pengajuan === 'Ditolak')
                                        <span class="status-pill bg-danger text-white">{{ $pengajuan->status_pengajuan }}</span>
                                    @elseif($pengajuan->status_pengajuan === 'Selesai')
                                        <span class="status-pill bg-success text-white">{{ $pengajuan->status_pengajuan }}</span>
                                    @else
                                        <span class="status-pill bg-warning">{{ $pengajuan->status_pengajuan }}</span>
                                    @endif
                                </div>
                            </div>
                            <?php $total = 0;?>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" font-size="large">No</th>
                                            <th scope="col">Pekerjaan</th>
                                            <th scope="col">Spesifikasi</th>
                                            <th scope="col">Kode</th>
                                            <th scope="col">No. Gambar</th>
                                            <th scope="col">Volume</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Harga Satuan</th>
                                            <th class="text-right" scope="col">Jumlah Harga</th>
                                        </tr>
                                    </thead>
                                    <?php
$kategotiI = "empty";
$kategotiII = "empty";
?>
                                    <?php $iter = 1;?>
                                    @foreach($detail_pengajuan as $dtl_pngj)
                                        @if($kategotiI != $dtl_pngj->kategori_I)
                                            <th style="font-size: large;" colspan="9">{{ $dtl_pngj->kategori_I }}</th>
                                            <?php $kategotiI = $dtl_pngj->kategori_I?>
                                            @if($kategotiII != $dtl_pngj->kategori_II)
                                                <!-- <th></th> -->
                                                <tr>
                                                    <th style="font-size: small;" colspan="9">{{ $dtl_pngj->kategori_II }}</th>
                                                </tr>
                                                <!-- <th></th>   <th></th>   <th></th>   <th></th>   <th></th>   <th></th>   <th></th> -->
                                                <?php $iter = 1;?>
                                                <?php $kategotiII = $dtl_pngj->kategori_II?>
                                            @endif
                                        @endif

                                        <tbody>
                                            <?php $jumlah_analisa_jlh_harga = 0;?>
                                                <tr>
                                                    <th scope="row">{{ $iter }}</th>
                                                    <td>{{ $dtl_pngj->nama_pekerjaan }}</td>
                                                    <td>{{ $dtl_pngj->spesifikasi }}</td>
                                                    <td>{{ $dtl_pngj->kode_pekerjaan }}</td>
                                                    <td>{{ $dtl_pngj->no_gambar }}</td>
                                                    <td>{{ $dtl_pngj->volume }}</td>
                                                    <td>{{ $dtl_pngj->satuan }}</td>
                                                    <td>{{ $dtl_pngj->harga_satuan }}</td>
                                                    <?php
$jlh_harga = $dtl_pngj->volume * $dtl_pngj->harga_satuan;
$total = $total + $jlh_harga;
?>
                                                    <td class="text-right">Rp {{ $jlh_harga }}</td>
                                                </tr>
                                        </tbody>
                                        <?php $iter += 1?>
                                    @endforeach
                                    <tr>
                                        <th class="text-right" colspan="8">Jumlah Biaya</th>
                                        <th class="text-right">Rp {{ $total }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-right" colspan="8">PPN 10%</th>
                                        <th class="text-right">Rp {{ $total * 0.1 }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-right" colspan="8">Total</th>
                                        <th class="text-right">Rp {{ $total * 1.1 }}</th>
                                    </tr>
                                    <tr>
                                        <th class="text-right" colspan="8">Dibulatkan</th>
                                        <?php
$ratusan = substr(round($total * 1.1), -2);
$total = round($total * 1.1) + (100 - $ratusan);
?>
                                        <th class="text-right">Rp {{ $total }}</th>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="analisa-tab">
            <div class="row align-items-center">
                <div class="col">
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link text-left text-dark" type="button" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>{{ $pengajuan->nama_rab }}</span><br>
                                        <span>{{ $pengajuan->created_at }}</span>
                                    </button>
                                </h2>
                                <div class="d-flex align-items-center">
                                    @if($pengajuan->status_pengajuan === 'Ditolak')
                                        <span class="status-pill bg-danger text-white">{{ $pengajuan->status_pengajuan }}</span>
                                    @elseif($pengajuan->status_pengajuan === 'Selesai')
                                        <span class="status-pill bg-success text-white">{{ $pengajuan->status_pengajuan }}</span>
                                    @else
                                        <span class="status-pill bg-warning">{{ $pengajuan->status_pengajuan }}</span>
                                    @endif
                                </div>
                            </div>
                            <?php $total = 0;?>
                            <div class="card-body">

                                    <div>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nama Bahan/Material/Upah</th>
                                                    <th class="text-right" scope="col">Koefisien</th>
                                                    <th class="text-right" scope="col">Satuan</th>
                                                    <th class="text-right" scope="col">Harga Satuan</th>
                                                    <th class="text-right" scope="col">Jumlah Harga</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $loopiter = 1;?>
                                            @foreach($detail_pengajuan as $dtl_pngj)
                                                 <?php $jumlah_analisa_jlh_harga = 0;?>
                                                 <tr>
                                                    <th colspan="5"> {{ $loopiter }}. {{ $dtl_pngj->nama_pekerjaan }} </th>
                                                 </tr>
                                                @foreach($analisa_detail_pengajuan as $analisa_dtl_pngj)
                                                    @if($analisa_dtl_pngj->id_detail_pengajuan == $dtl_pngj->id_detail_pengajuan)
                                                        <tr>
                                                            <td> - {{ $analisa_dtl_pngj->nama_bahan_material_upah }}</td>
                                                            <td class="text-right">{{ $analisa_dtl_pngj->koefisien }}</td>
                                                            <td class="text-right">{{ $analisa_dtl_pngj->satuan }}</td>
                                                            <td class="text-right">Rp {{ $analisa_dtl_pngj->harga_satuan }}</td>
                                                            <?php
$analisa_jlh_harga = $analisa_dtl_pngj->koefisien * $analisa_dtl_pngj->harga_satuan;
$jumlah_analisa_jlh_harga += $analisa_jlh_harga;
?>
                                                            <td class="text-right">Rp {{ $analisa_jlh_harga }}</td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                <tr>
                                                    <td class="text-right" colspan="4">Jumlah</td>
                                                    <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4">Keuntungan Maksimum 10%</td>
                                                    <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga * 0.1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4">Jumlah dengan Keuntungan</td>
                                                    <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga * 1.1 }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4">Dibulatkan</td>
                                                    <?php
$ratusan = substr(round($jumlah_analisa_jlh_harga * 1.1), -2);
$akhir = round($jumlah_analisa_jlh_harga * 1.1) + (100 - $ratusan);
?>
                                                    <td class="text-right">Rp {{ $akhir }}</td>
                                                </tr>
                                                <?php $loopiter += 1?>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col justify-content-center">
        <form method="POST" action="/persetujuan/{{ $pengajuan->id_pengajuan }}">
            @csrf
            @method('PUT')
            <div class="container py-5">
                <label for="status_pengajuan">Status Pengajuan</label>

                <select name="status_pengajuan" required id="status_pengajuan" class="form-control">
                    <option value="">--Silakan pilih satu opsi--</option>
                    <option value="Selesai">Setuju</option>
                    <option value="Ditolak">Tidak setuju</option>
                </select>
                <p>Komentar</p>
                <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
            </div>
            </div>
            <button type="submit" class="btn btn-success bg-primary p-3">
                <span class="oi oi-spreadsheet" title="submit" aria-hidden="true"></span>
                    Konfirmasi
            </button>
        </form>
    </div>
<div>
@endsection
