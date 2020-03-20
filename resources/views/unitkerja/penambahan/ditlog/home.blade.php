@extends('master')

@section('title', 'Penambahan Ditlog')

@section('content')

<div class="m-2 p-2" id="content">
  <h1 class="text-center mb-4" id="title">Update Database for Ditlog</h1>
    <div id="mainContent">
      <div class="container">
      	<div class="row">
      	  <div class="col">
	      	<a href='/penambahan-bahan-ditlog' type="button" class="btn btn-lg btn-block btn-primary btn-outline-dark text-light font-weight-bold">Bahan</a>
	      </div>
	      <div class="col">
	      	<a href='/penambahan-upah-ditlog' type="button" class="btn btn-lg btn-block btn-primary btn-outline-dark text-light font-weight-bold">Upah</a>
	  	  </div>
	  	</div>
	  	<br>
	  	<div class="row">
	  	  <div class="col">
	      	<a href='/penambahan-material-ditlog' type="button" class="btn btn-lg btn-block btn-primary btn-outline-dark text-light font-weight-bold">Material</a>
	      </div>
	      <div class="col">
	      	<a href='/penambahan-pekerjaan-ditlog' type="button" class="btn btn-lg btn-block btn-primary btn-outline-dark text-light font-weight-bold">Pekerjaan</a>
	      </div>
	    </div>
  	  </div>
    </div>
</div>


@endsection