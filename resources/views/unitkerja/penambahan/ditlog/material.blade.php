@extends('master')

@section('title', 'Penambahan Bahan Ditlog')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Material Pekerjaan</h1>
    <div id="mainContent">
    	<button class='insertButton btn btn-primary btn-lg text-light font-weight-bold' data-toggle="modal" data-target="#ModalInsert" aria-pressed="false">Insert</button><br><br>
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
            <td class='value item_material'><input type='text' value="{{$elemen_material->item_material}}"></td>
            <td class='value volume'><input type='number' value="{{$elemen_material->volume}}"></td>
            <td class='value satuan'>{{$elemen_material->satuan}}</td>
            <td class='value harga_pembanding'><input type='number' value="{{$elemen_material->harga_pembanding}}"></td>
            <td class='value harga_saat_ini'><input type='number' value="{{$elemen_material->harga_saat_ini}}"></td>
            <td class='value harga_satuan'><input type='number' value="{{$elemen_material->harga_satuan}}"></td>
            <td class='value keterangan_tambahan'><input type='text' value="{{$elemen_material->keterangan_tambahan}}"></td>
            <td class='value cabang_itb'>{{$elemen_material->cabang_itb}}</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
            	<button class='updateRow btn btn-secondary btn-success btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_material->id_material}}'>Update</button>
            	<button class='deleteRow btn btn-secondary btn-danger btn-sm text-light font-weight-bold' data-toggle="button" aria-pressed="false" id='{{$elemen_material->id_material}}'>Delete</button>
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
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Material</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="form-row">
            <div class="form-group col-md">
              <label for="item_material"><h6>Item Material</h6></label>
              <input class="form-control" type="text" id="item_material" placeholder="Item Material">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="volume"><h6>Volume</h6></label>
              <input class="form-control" type="number" id="volume" placeholder="Volume">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="harga_pembanding"><h6>Harga Pembanding</h6></label>
              <input class="form-control" type="number" id="harga_pembanding" placeholder="Harga Pembanding">
            </div>
            <div class="form-group col-md-6">
              <label for="harga_saat_ini"><h6>Harga Saat Ini</h6></label>
              <input class="form-control" type="number" id="harga_saat_ini" placeholder="Harga Saat Ini">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="satuan"><h6>Satuan</h6></label>
              <select class="form-control" id="satuan">
                @foreach($material_satuan as $elemen_material_satuan)
                    <option value="{{$elemen_material_satuan->satuan}}">
                      {{$elemen_material_satuan->satuan}}
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
              <label for="keterangan_tambahan"><h6>Keterangan Tambahan</h6></label>
              <input class="form-control" type="text" id="keterangan_tambahan" placeholder="Keterangan Tambahan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="cabang_itb"><h6>Cabang ITB</h6></label>
              <select class="form-control" id="cabang_itb">
                @foreach($material_cabang as $elemen_material_cabang)
                  <option value="{{$elemen_material_cabang->cabang_itb}}">
                    {{$elemen_material_cabang->cabang_itb}}
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
<script type="text/javascript" src="{{ asset('js/ditlog/penambahanmaterial.js') }}"></script>
@endsection