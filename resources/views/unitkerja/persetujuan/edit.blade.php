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
    <div class="row align-items-center">
        <div class="col">
            <div class="mt-4">
                <div class="accordion" id="accordionHistory">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link text-left text-dark" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <span>{{ $pengajuan->nama_rab }}</span><br>
                                    <?php
                                      $dtPengajuan = new DateTime($pengajuan->created_at);
                                      $fmt = new IntlDateFormatter('id_ID',
                                        IntlDateFormatter::FULL,
                                        IntlDateFormatter::NONE);
                                    ?>
                                    <span>{{ $fmt->format($dtPengajuan) }}</span>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionHistory">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Jasa</th>
                                            <th class="text-right" scope="col">Jumlah</th>
                                            <th class="text-right" scope="col">Biaya</th>
                                        </tr>
                                    </thead>
                                    @foreach($detail_pengajuan as $dtl_pngj)
                                        @if($dtl_pngj->id_pengajuan == $pengajuan->id_pengajuan)
                                            <tbody>
                                                <tr>
                                                    @foreach($pekerjaan as $pkj)
                                                        @if($dtl_pngj->id_pekerjaan == $pkj->id)
                                                            <td>{{ $pkj->jenis_pekerjaan }}</td>
                                                        @endif
                                                    @endforeach
                                                    <td class="text-right">{{ $dtl_pngj->volume }} {{$pkj->satuan}}</td>
                                                    <td class="text-right">Rp {{ $dtl_pngj->jumlah_harga }}</td>
                                                </tr>
                                            </tbody>
                                        @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <?php $fmt = new NumberFormatter( 'id_ID', NumberFormatter::CURRENCY ); ?>
                        <h2>Total: {{ $fmt->formatCurrency($pengajuan->jumlah_biaya, "IDR") }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col justify-content-center">
          <form method="POST" action="/persetujuan/{{ $pengajuan->id_pengajuan }}">
            @csrf
            @method('PUT')

            <div class="form-check">
                <input class="form-check-input" type="radio" name="status_pengajuan" id="status_pengajuan" value="Selesai" checked>
                <label class="form-check-label" for="status_pengajuan">
                    Setuju
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status_pengajuan" id="status_pengajuan" value="Ditolak">
                <label class="form-check-label" for="status_pengajuan">
                    Tidak Setuju
                </label>
            </div>
            <div class="container py-5">
                <p> Komentar </p>
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
    </div>
<div>

@endsection
