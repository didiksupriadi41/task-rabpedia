@extends('master')

@section('title', 'Persetujuan Bahan Ditlog')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Persetujuan Bahan</h1>
    <div id="mainContent">
      <h2 id="component"> Insert Bahan Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Bahan Bangunan</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Kelompok Bahan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($bahan_insert as $elemen_bahan_insert)
          <tr class ='insert{{$elemen_bahan_insert->id}}'>
            <td hidden class='bahan-ID' value='{{$elemen_bahan_insert->id}}'></td>
            <td class='value jenis_bahan_bangunan'>{{$elemen_bahan_insert->jenis_bahan_bangunan}}</td>
            <td class='value satuan'>{{$elemen_bahan_insert->satuan}}</td>
            <td class='value harga_satuan'>{{$elemen_bahan_insert->harga_satuan}}</td>
            <td class='value kelompok_bahan'>{{$elemen_bahan_insert->kelompok_bahan}}</td>
            <td class='value cabang_itb'>{{$elemen_bahan_insert->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_bahan_insert->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_bahan_insert->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
                <button class='declineInsertRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-3' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_insert->id}}'>X</button>
              	<button class='agreeInsertRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-3' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_insert->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
      <h2 id="component"> Update Bahan Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Bahan Bangunan</th>
              <th class="attribute text-light font-weight-bold">Harga Satuan</th> 
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($bahan_update as $elemen_bahan_update)
          <tr class ='update{{$elemen_bahan_update->id}}'>
            <td hidden class='bahan-ID' value='{{$elemen_bahan_update->id}}'></td>
            <td hidden class='bahan-update-ID' value='{{$elemen_bahan_update->id_bahan_update}}'></td>
            <td class='value jenis_bahan_bangunan'>{{$elemen_bahan_update->jenis_bahan_bangunan}}</td>
            <td class='value harga_satuan'>{{$elemen_bahan_update->harga_satuan}}</td>
            <td class='value id_pengaju'>{{$elemen_bahan_update->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_bahan_update->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='declineUpdateRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_update->id}}'>X</button>
              	<button class='agreeUpdateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_update->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
      <h2 id="component"> Delete Bahan Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
          <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Bahan Bangunan</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Kelompok Bahan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($bahan_delete as $elemen_bahan_delete)
          <tr class ='delete{{$elemen_bahan_delete->id}}'>
            <td hidden class='bahan-ID' value='{{$elemen_bahan_delete->id}}'></td>
            <td hidden class='bahan-delete-ID' value='{{$elemen_bahan_delete->id_bahan}}'></td>
            <td class='value jenis_bahan_bangunan'>{{$elemen_bahan_delete->jenis_bahan_bangunan}}</td>
            <td class='value satuan'>{{$elemen_bahan_delete->satuan}}</td>
            <td class='value harga_satuan'>{{$elemen_bahan_delete->harga_satuan}}</td>
            <td class='value kelompok_bahan'>{{$elemen_bahan_delete->kelompok_bahan}}</td>
            <td class='value cabang_itb'>{{$elemen_bahan_delete->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_bahan_delete->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_bahan_delete->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='declineDeleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_delete->id}}'>X</button>
              	<button class='agreeDeleteRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan_delete->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
    
</div>
@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/ditlog/penyetujuanbahan.js') }}"></script>
@endsection