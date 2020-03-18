@extends('master')

@section('title', 'Penambahan Upah Ditlog')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Upah Pekerja</h1>
    <div id="mainContent">
    	<button class='insertButton btn btn-primary btn-lg text-light font-weight-bold' data-toggle="modal" data-target="#ModalInsert" aria-pressed="false">Insert</button><br><br>
    	<table class="table table-hover table-striped table-bordered p-5">   
          <thead class="bg-info">
            <tr class="contentHeader">
              <th class="attribute text-light font-weight-bold">Jenis Pekerja</th>
              <th class="attribute text-light font-weight-bold">Satuan</th> 
              <th class="attribute text-light font-weight-bold">Harga Satuan</th>
              <th class="attribute text-light font-weight-bold">Cabang ITB</th>
              <th class="attribute"></th>
            </tr>
          </thead>
        @foreach ($upah as $elemen_upah)
          <tr class ='{{$elemen_upah->id_upah}}'>
          	<td hidden class='upah-ID' value='{{$elemen_upah->id_upah}}'></td>
            <td class='value jenis_pekerja'><input type='text' value="{{$elemen_upah->jenis_pekerja}}"></td>
            <td class='value satuan'>{{$elemen_upah->satuan}}</td>
            <td class='value harga_satuan'><input type='number' value="{{$elemen_upah->harga_satuan}}"></td>
            <td class='value cabang_itb'>{{$elemen_upah->cabang_itb}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
            	<button class='updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_upah->id_upah}}'>Update</button>
            	<button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_upah->id_upah}}'>Delete</button>
              </div>
            </td>
          </tr>
        @endforeach
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="ModalInsert" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Upah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <tr>
        <td>
        	<input type="text" id="jenis_pekerja" placeholder="Jenis Pekerja">
        </td>
        <td><select id="satuan">
            @foreach($upah_satuan as $elemen_upah_satuan)
                <option value="{{$elemen_upah_satuan->satuan}}">
                	{{$elemen_upah_satuan->satuan}}
                </option>
            @endforeach
        </select></td>
        <td><input type="number" id="harga_satuan" placeholder="Harga Satuan"></td>
        <td><select id="cabang_itb">
        	@foreach($upah_cabang as $elemen_upah_cabang)
        		<option value="{{$elemen_upah_cabang->cabang_itb}}">
        			{{$elemen_upah_cabang->cabang_itb}}
        		</option>
        	@endforeach
        </select></td>
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
<script type="text/javascript" src="{{ asset('js/ditlog/penambahanupah.js') }}"></script>
@endsection