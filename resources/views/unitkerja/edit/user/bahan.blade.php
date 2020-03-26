@extends('master')

@section('title', 'Pengurangan Bahan User')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Bahan Pekerjaan</h1>
    <div id="mainContent">
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Bahan Bangunan</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Kelompok Bahan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute"></th>
            </tr>
          </thead>
        @foreach ($bahan as $elemen_bahan)
          <tr class ='{{$elemen_bahan->id_bahan}}'>
          	<td hidden class='bahan-ID' value='{{$elemen_bahan->id_bahan}}'></td>
            <td class='value jenis_bahan_bangunan'><input type='text' value="{{$elemen_bahan->jenis_bahan_bangunan}}"></td>
            <td class='value satuan'>{{$elemen_bahan->satuan}}</td>
            <td class='value harga_satuan'><input type='number' value="{{$elemen_bahan->harga_satuan}}"></td>
            <td class='value kelompok_bahan'>{{$elemen_bahan->kelompok_bahan}}</td>
            <td class='value cabang_itb'>{{$elemen_bahan->cabang_itb}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='editRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="modal" data-modal-id="{{$elemen_bahan->id_bahan}}" data-target="#modalEdit" aria-pressed="false" id="{{$elemen_bahan->id_bahan}}">Edit</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
</div>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
              <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
            </div>
            <form method="post">
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="editButton">Update</button>
            </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/user/penambahanbahan.js') }}"></script>
@endsection