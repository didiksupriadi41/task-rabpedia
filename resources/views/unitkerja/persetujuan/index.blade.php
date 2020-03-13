@extends('master')

@section('title', 'Pengajuan')

@section('content')
    

<div class="card">
  <div class="card-header d-flex justify-content-between" id="headingOne">
    @foreach ($pengajuan as $itemPengajuan)
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
  </div>
</div>

@endsection
