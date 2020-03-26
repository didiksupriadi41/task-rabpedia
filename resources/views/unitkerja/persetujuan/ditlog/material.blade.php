@extends('master')

@section('title', 'Persetujuan Material Ditlog')
@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Persetujuan Material</h1>
    <div id="mainContent">
      <h2 id="component"> Insert Material Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
            <th class="attribute text-light font-weight-bold">Item Material</th>
              <th class="attribute text-light font-weight-bold">Volume</th>
              <th class="attribute text-light font-weight-bold">Satuan</th>
              <th class="attribute text-light font-weight-bold">Harga Pembanding</th>
              <th class="attribute text-light font-weight-bold">Harga Saat Ini</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Keterangan Tambahan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($material_insert as $elemen_material_insert)
          <tr class ='insert{{$elemen_material_insert->id}}'>
          	<td hidden class='material-insert-ID' value='{{$elemen_material_insert->id}}'></td>
            <td class='value item_material'>{{$elemen_material_insert->item_material}}</td>
            <td class='value volume'>{{$elemen_material_insert->volume}}</td>
            <td class='value satuan'>{{$elemen_material_insert->satuan}}</td>
            <td class='value harga_pembanding'>{{$elemen_material_insert->harga_pembanding}}</td>
            <td class='value harga_saat_ini'>{{$elemen_material_insert->harga_saat_ini}}</td>
            <td class='value harga_satuan'>{{$elemen_material_insert->harga_satuan}}</td>
            <td class='value keterangan_tambahan'>{{$elemen_material_insert->keterangan_tambahan}}</td>
            <td class='value cabang_itb'>{{$elemen_material_insert->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_material_insert->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_material_insert->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
            	<button class='declineInsertRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_material_insert->id}}'>X</button>
            	<button class='agreeInsertRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_material_insert->id}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
      <h2 id="component"> Update Material Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Item Material</th>
              <th class="attribute text-light font-weight-bold">Volume</th>
              <th class="attribute text-light font-weight-bold">Harga Pembanding</th>
              <th class="attribute text-light font-weight-bold">Harga Saat Ini</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($material_update as $elemen_material_update)
          <tr class ='update{{$elemen_material_update->id}}'>
            <td hidden class='material-ID' value='{{$elemen_material_update->id}}'></td>
            <td hidden class='material-update-ID' value='{{$elemen_material_update->id_material_update}}'></td>
            <td class='value item_material'>{{$elemen_material_update->item_material}}</td>
            <td class='value volume'>{{$elemen_material_update->volume}}</td>
            <td class='value harga_pembanding'>{{$elemen_material_update->harga_pembanding}}</td>
            <td class='value harga_saat_ini'>{{$elemen_material_update->harga_saat_ini}}</td>
            <td class='value harga_satuan'>{{$elemen_material_update->harga_satuan}}</td>
            <td class='value id_pengaju'>{{$elemen_material_update->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_material_update->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
            	<button class='declineUpdateRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_material_update->id_material}}'>X</button>
            	<button class='agreeUpdateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold m-2' data-toggle="button" aria-pressed="false" id='{{$elemen_material_update->id_material}}'>V</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
        <h2 id="component"> Delete Material Pekerjaan </h2>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
            <th class="attribute text-light font-weight-bold">Item Material</th>
              <th class="attribute text-light font-weight-bold">Volume</th>
              <th class="attribute text-light font-weight-bold">Satuan</th>
              <th class="attribute text-light font-weight-bold">Harga Pembanding</th>
              <th class="attribute text-light font-weight-bold">Harga Saat Ini</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Keterangan Tambahan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute text-light font-weight-bold">ID Pengaju</th>
              <th class="attribute text-light font-weight-bold">Komentar</th>
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($material_delete as $elemen_material_delete)
          <tr class ='delete{{$elemen_material_delete->id_material}}'>
            <td hidden class='material-ID' value='{{$elemen_material_delete->id}}'></td>
            <td hidden class='material-delete-ID' value='{{$elemen_material_delete->id_material_delete}}'></td>
            <td class='value item_material'>{{$elemen_material_delete->item_material}}</td>
            <td class='value volume'>{{$elemen_material_delete->volume}}</td>
            <td class='value satuan'>{{$elemen_material_delete->satuan}}</td>
            <td class='value harga_pembanding'>{{$elemen_material_delete->harga_pembanding}}</td>
            <td class='value harga_saat_ini'>{{$elemen_material_delete->harga_saat_ini}}</td>
            <td class='value harga_satuan'>{{$elemen_material_delete->harga_satuan}}</td>
            <td class='value keterangan_tambahan'>{{$elemen_material_delete->keterangan_tambahan}}</td>
            <td class='value cabang_itb'>{{$elemen_material_delete->cabang_itb}}</td>
            <td class='value id_pengaju'>{{$elemen_material_delete->id_pengaju}}</td>
            <td class='value komentar'>{{$elemen_material_delete->komentar}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
            	<button class='updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_material_delete->id_material}}'>Update</button>
            	<button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_material_delete->id_material}}'>Delete</button>
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
<script type="text/javascript" src="{{ asset('js/ditlog/penyetujuanmaterial.js') }}"></script>
@endsection