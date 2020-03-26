@extends('master')

@section('title', 'Pengurangan Material User')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Material Pekerjaan</h1>
    <div id="mainContent">
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
              <th class="attribute"></th>
            </tr>
          </thead>
          @foreach ($material as $elemen_material)
          <tr class ='{{$elemen_material->id_material}}'>
          	<td hidden class='material-ID' value='{{$elemen_material->id_material}}'></td>
            <td class='value item_material'>{{$elemen_material->item_material}}</td>
            <td class='value volume'>{{$elemen_material->volume}}</td>
            <td class='value satuan'>{{$elemen_material->satuan}}</td>
            <td class='value harga_pembanding'>{{$elemen_material->harga_pembanding}}</td>
            <td class='value harga_saat_ini'>{{$elemen_material->harga_saat_ini}}</td>
            <td class='value harga_satuan'>{{$elemen_material->harga_satuan}}</td>
            <td class='value keterangan_tambahan'>{{$elemen_material->keterangan_tambahan}}</td>
            <td class='value cabang_itb'>{{$elemen_material->cabang_itb}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
                <button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="modal" data-modal-id="{{$elemen_material->id_material}}" data-target="#modalDelete" aria-pressed="false" id="{{$elemen_material->id_material}}">Delete</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
</div>

<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span>&times;</span></button>
            </div>
            <div class="container">
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="komentar"><h6>Id Pengajuan</h6></label>
                  <input class="form-control" type="number" id="id_pengaju" placeholder="Id Pengaju">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md">
                  <label for="komentar"><h6>Komentar</h6></label>
                  <input class="form-control" type="text" id="komentar" placeholder="Komentar untuk Pengajuan">
                </div>
              </div>
            </div>
            <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
            <form method="post">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="deleteButton">Delete</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/user/penambahanmaterial.js') }}"></script>
@endsection