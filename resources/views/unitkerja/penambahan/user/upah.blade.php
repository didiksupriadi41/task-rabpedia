@extends('master')

@section('title', 'Penambahan Upah User')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">   
    <h2 class="pb-3">Insert Upah</h2>
    <div class="modal-content">
      <div class="modal-body">
      	<div class="container">
      	  <div class="form-row">
      	  	<div class="form-group col-md">
      	  	  <label for="jenis_pekerja"><h6>Jenis Pekerja</h6></label>
      	  	  <input class="form-control" type="text" id="jenis_pekerja" placeholder="Jenis Pekerja">  
      	  	</div>
      	  </div>
      	  <div class="form-row">
      	  	<div class="form-group col-md-6">
      	  	  <label for="satuan"><h6>Satuan</h6></label>
      	  	  <select class="form-control" id="satuan">
	            @foreach($upah_satuan as $elemen_upah_satuan)
	                <option value="{{$elemen_upah_satuan->satuan}}">
	                	{{$elemen_upah_satuan->satuan}}
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
      	  	  <label for="cabang_itb"><h6>Cabang ITB</h6></label>
      	  	  <select class="form-control" id="cabang_itb">
	        	@foreach($upah_cabang as $elemen_upah_cabang)
	        		<option value="{{$elemen_upah_cabang->cabang_itb}}">
	        			{{$elemen_upah_cabang->cabang_itb}}
	        		</option>
	        	@endforeach
	          </select>
      	  	</div>
			</div>
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
      	</div>
      <div class="modal-footer">
        <a href='/pengajuan'>
            <button type="button" class="btn btn-secondary">Back</button>
    	</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsert">Insert</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/user/penambahanupah.js') }}"></script>
@endsection
