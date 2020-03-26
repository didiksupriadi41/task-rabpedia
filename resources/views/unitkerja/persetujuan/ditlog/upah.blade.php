@extends('master')

@section('title', 'Persetujuan Upah Ditlog')
@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Persetujuan Upah</h1>
    <div id="mainContent">
      <h2 id="component"> Insert Upah Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Pekerja</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($upah_insert as $elemen_upah_insert)
          <tr class ='insert{{$elemen_upah_insert->id}}'>
            <td hidden class='upah-insert-ID' value='{{$elemen_upah_insert->id}}'></td>
            <td class='value jenis_pekerja'>{{$elemen_upah_insert->jenis_pekerja}}</td>
            <td class='value satuan'>{{$elemen_upah_insert->satuan}}</td>
            <td class='value harga_satuan'>{{$elemen_upah_insert->harga_satuan}}</td>
            <td class='value cabang_itb'>{{$elemen_upah_insert->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_upah_insert->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_upah_insert->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='declineInsertRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_insert->id}}'>X</button>
              	<button class='agreeInsertRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_insert->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
      <h2 id="component"> Update Upah Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
            	<th class="attribute text-light font-weight-bold">Jenis Pekerja</th>
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($upah_update as $elemen_upah_update)
          <tr class ='update{{$elemen_upah_update->id}}'>
            <td hidden class='upah-ID' value='{{$elemen_upah_update->id}}'></td>
            <td hidden class='upah-update-ID' value='{{$elemen_upah_update->id_upah_update}}'></td>
            <td class='value jenis_pekerja'>{{$elemen_upah_update->jenis_pekerja}}</td>
            <td class='value harga_satuan'>{{$elemen_upah_update->harga_satuan}}</td>
            <td class='value id_pengaju'>{{$elemen_upah_update->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_upah_update->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='declineUpdateRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_update->id}}'>X</button>
              	<button class='agreeUpdateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_update->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
      <h2 id="component"> Delete Upah Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
					<tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Pekerja</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($upah_delete as $elemen_upah_delete)
          <tr class ='{{$elemen_upah_delete->id}}'>
            <td hidden class='bahan-ID' value='{{$elemen_upah_delete->id_bahan_update}}'></td>
            <td class='value jenis_pekerja'>{{$elemen_upah_delete->jenis_pekerja}}</td>
            <td class='value satuan'>{{$elemen_upah_delete->satuan}}</td>
            <td class='value harga_satuan'>{{$elemen_upah_delete->harga_satuan}}</td>
            <td class='value cabang_itb'>{{$elemen_upah_delete->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_upah_delete->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_upah_delete->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_delete->id}}'>Update</button>
              	<button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_upah_delete->id}}'>Delete</button>
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
<script type="text/javascript" src="{{ asset('js/ditlog/penyetujuanupah.js') }}"></script>
@endsection