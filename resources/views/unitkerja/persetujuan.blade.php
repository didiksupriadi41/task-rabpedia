@extends('master')

@section('title', 'Pengajuan')

@section('content')

@isset($listPengajuan)
@foreach ($listPengajuan as $itemPengajuan)
  <div aria-label="Pengajuan" role="group">
    <div class="p-0 mt-0">
      <div class="d-flex position-relative">
        <div class="flex-shrink-0 pt-2 pl-3">
          <span aria-label="Pengajuan Dibuka">
            <svg viewBox="0 0 14 16" version="1.1" width="14" height="16" aria-hidden="true">
              <path fill-rule="evenodd"
                d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 011.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z">
              </path>
            </svg>
          </span>
        </div>

      <!-- Nama Pengajuan column -->
        <div class="p-2 pr-3 pr-md-2">
          <a class="h4" href="/persetujuan/{{ $itemPengajuan->id_pengajuan }}/edit">{{ $itemPengajuan->nama_rab }}</a>
          <div class="mt-1">
            <?php
              $dtItemPengajuan = new DateTime($itemPengajuan->created_at);
              $fmt = new IntlDateFormatter('id_ID',
                IntlDateFormatter::MEDIUM,
                IntlDateFormatter::NONE);
            ?>
            <span class="">
              #{{ $itemPengajuan->id_pengajuan }}
              diajukan pada {{ $fmt->format($dtItemPengajuan) }} oleh
              <a href="/persetujuan/{{ $itemPengajuan->id_pengajuan }}/edit">Didik Supriadi</a>
            </span>
            <span class="d-none d-md-inline">
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endisset

@isset($pengajuan)
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
                                              <th scope="col">#</th>
                                              <th scope="col">Jasa</th>
                                              <th class="text-right" scope="col">Jumlah</th>
                                              <th class="text-right" scope="col">Biaya</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <th scope="row">1</th>
                                              <td>Cat Dinding Dulux</td>
                                              <td class="text-right">50 m<sup>2</sup></td>
                                              <td class="text-right">Rp 300.000</td>
                                          </tr>
                                          <tr>
                                              <th scope="row">2</th>
                                              <td>Jendela Stainless Steel 1m x 3m</td>
                                              <td class="text-right">2 buah</td>
                                              <td class="text-right">Rp 600.000</td>
                                          </tr>
                                          <tr>
                                              <th scope="row">3</th>
                                              <td>Upah</td>
                                              <td class="text-right">2 Orang</td>
                                              <td class="text-right">Rp 200.000</td>
                                          </tr>
                                      </tbody>
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
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="accept" checked>
                  <label class="form-check-label" for="exampleRadios1">
                      Setuju
                  </label>
              </div>
              <div class="form-check">
                  <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="reject">
                  <label class="form-check-label" for="exampleRadios2">
                      Tidak Setuju
                  </label>
              </div>
              <div class="container py-5">
                  <p> Komentar </p>
                  <div class="form-group">
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
              </div>
              </div>
              <button type="button" class="btn btn-success bg-primary p-3">
                  <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                      Konfirmasi
              </button>
          </div>
      </div>
  <div>
@endisset
@endsection
