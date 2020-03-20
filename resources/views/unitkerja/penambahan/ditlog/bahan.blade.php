@extends('master')

@section('title', 'Penambahan Bahan Ditlog')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Bahan Pekerjaan</h1>
    <div id="mainContent">
    	<button class='insertButton btn btn-primary btn-lg text-light font-weight-bold' data-toggle="modal" data-target="#ModalInsert" aria-pressed="false">Insert</button><br><br>
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
              	<button class='updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan->id_bahan}}'>Update</button>
              	<button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_bahan->id_bahan}}'>Delete</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="ModalInsert" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Bahan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-row">
            <div class="form-group col-md">
              <label for="jenis_bahan_bangunan"><h6>Jenis Bahan Bangunan</h6></label>
              <input class="form-control" type="text" id="jenis_bahan_bangunan" placeholder="Jenis Bahan Bangunan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="satuan"><h6>Satuan</h6></label>
              <select class="form-control" id="satuan">
                @foreach($bahan_satuan as $elemen_bahan_satuan)
                    <option value="{{$elemen_bahan_satuan->satuan}}">
                      {{$elemen_bahan_satuan->satuan}}
                    </option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="harga_satuan"><h6>Harga Satuan</h6></label>
              <input class="form-control" type="number" id="harga_satuan" placeholder="Harga Satuan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="kelompok_bahan"><h6>Kelompok Bahan</h6></label>
              <select class="form-control" id="kelompok_bahan">
                @foreach($bahan_kelompok as $elemen_bahan_kelompok)
                  <option value="{{$elemen_bahan_kelompok->kelompok_bahan}}">
                    {{$elemen_bahan_kelompok->kelompok_bahan}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="cabang_itb"><h6>Cabang ITB</h6></label>
              <select class="form-control" id="cabang_itb">
                @foreach($bahan_cabang as $elemen_bahan_cabang)
                  <option value="{{$elemen_bahan_cabang->cabang_itb}}">
                    {{$elemen_bahan_cabang->cabang_itb}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsert">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/ditlog/penambahanbahan.js') }}"></script>
@endsection