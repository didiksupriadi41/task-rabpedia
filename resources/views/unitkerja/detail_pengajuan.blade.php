@extends('master')

@section('title', 'Detail Pengajuan')

@section('content')
<div class="container">
    <div class="row p-3">
        <button type="button" class="btn btn-success bg-primary px-5">
            <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                Print
        </button>
    </div>
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
                    <?php $total = 0; ?>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" font-size="large">No</th>
                                    <th scope="col">Jasa</th>
                                    <th class="text-right" scope="col">Jumlah</th>
                                    <th class="text-right" scope="col">Biaya</th>
                                </tr>
                            </thead>
                            @foreach($detail_pengajuan as $dtl_pngj)
                            <tbody>
                                <?php $jumlah_analisa_jlh_harga = 0; ?>
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $dtl_pngj->nama_pekerjaan }}</td>
                                        <td class="text-right">{{ $dtl_pngj->volume }} {{ $dtl_pngj->satuan }}</td>
                                        <?php 
                                            $jlh_harga = $dtl_pngj->volume * $dtl_pngj->harga_satuan; 
                                            $total = $total + $jlh_harga;
                                        ?>
                                        <td class="text-right">Rp {{ $jlh_harga }}</td>
                                            <div>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"></th>
                                                            <th scope="col">Nama Bahan/Material/Upah</th>
                                                            <th class="text-right" scope="col">Koefisien</th>
                                                            <th class="text-right" scope="col">Satuan</th>
                                                            <th class="text-right" scope="col">Harga Satuan</th>
                                                            <th class="text-right" scope="col">Jumlah Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($analisa_detail_pengajuan as $analisa_dtl_pngj)
                                                            @if($analisa_dtl_pngj->id_detail_pengajuan == $dtl_pngj->id_detail_pengajuan)
                                                                <tr>
                                                                    <th scope="row"></th>
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
                                                            <td scope="row"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right">Jumlah</td>
                                                            <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right">Keuntungan Maksimum 10%</td>
                                                            <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga * 0.1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right">Jumlah dengan Keuntungan</td>
                                                            <td class="text-right">Rp {{ $jumlah_analisa_jlh_harga * 1.1 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td scope="row"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right"></td> <td class="text-right">Dibulatkan</td>
                                                            <?php
                                                                    $ratusan = substr(round($jumlah_analisa_jlh_harga * 1.1), -2);
                                                                    $akhir = round($jumlah_analisa_jlh_harga * 1.1) + (100-$ratusan);
                                                            ?>
                                                            <td class="text-right">Rp {{ $akhir }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                    </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card">
                    <h2 class="text-right"> Total : Rp {{ $total }}</h2>
                </div>
            </div>
        </div>
        <div class="col justify-content-center">
            <div class="container py-5">
                <p> Komentar </p>
                <div class="form-group">
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="8">{{ $pengajuan->komentar }}</textarea>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection
