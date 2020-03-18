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
                    </div>
                    <?php $total = 0; ?>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Pekerjaan</th>
                                    <th class="text-right" scope="col">Volume</th>
                                    <th class="text-right" scope="col">Biaya</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detail_pengajuan as $dtl_pngj)
                                    @if($dtl_pngj->id_pengajuan == $pengajuan->id_pengajuan)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $dtl_pngj->nama_pekerjaan }}</td>
                                            <td class="text-right">{{ $dtl_pngj->volume }} {{ $dtl_pngj->satuan }}</td>
                                            <?php 
                                                $jlh_harga = $dtl_pngj->volume * $dtl_pngj->harga_satuan; 
                                                $total = $total + $jlh_harga;
                                            ?>
                                            <td class="text-right">Rp {{ $jlh_harga }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card">
                    <h2> Total : Rp {{ $total }}</h2>
                </div>
            </div>
        </div>
        <div class="col justify-content-center">
            <div class="container py-5">
                <p> Komentar </p>
                <div class="form-group">
                    <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection
