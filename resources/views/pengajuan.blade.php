@extends('master')

@section('title', 'Penambahan Ditlog')

@section('content')

<div class="m-2 p-2" id="content">
  <h1 class="text-center mb-4" id="title">Pengajuan Bahan, Pekerjaan, Material atau Upah yang kurang</h1>
    <div id="mainContent">
      <div class="container">
		<h1 class="text-center pb-4"> Bahan </h1>
      	<div class="row mb-2">
      	  <div class="col col-md-4">
				<a href='/penambahan-bahan-user'>
			    		<button class='btn btn-primary btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Tambah</button><br><br>
	  	    	</a>
					</div>
					<div class="col col-md-4">
				<a href='/pengeditan-bahan-user'>
			    		<button class='btn btn-success btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Update</button><br><br>
	  	    	</a>
					</div>
					<div class="col col-md-4">
						<a href='/pengurangan-bahan-user'>
			    		<button class='btn btn-warning btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Delete</button><br><br>
	  	    	</a>
					</div>
				</div>
		<h1 class="text-center pb-4">  Material </h1>
      	<div class="row mb-2">
			<div class="col col-md-4">
				<a href='/penambahan-material-user'>
					<button class='btn btn-primary btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Tambah</button><br><br>
				</a>
			</div>
			<div class="col col-md-4">
				<a href='/pengeditan-material-user'>
					<button class='btn btn-success btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Update</button><br><br>
				</a>
			</div>
			<div class="col col-md-4">
				<a href='/pengurangan-material-user'>
					<button class='btn btn-warning btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Delete</button><br><br>
			</a>
			</div>
		</div>
		<h1 class="text-center pb-4"> Upah </h1>
      	<div class="row mb-2">
      	  <div class="col col-md-4">
				<a href='/penambahan-upah-user'>
					<button class='btn btn-primary btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Tambah</button><br><br>
	  	    	</a>
			</div>
			<div class="col col-md-4">
				<a href='/pengeditan-upah-user'>
					<button class='btn btn-success btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Update</button><br><br>
	  	    	</a>
			</div>
			<div class="col col-md-4">
				<a href='/pengurangan-upah-user'>
					<button class='btn btn-warning btn-lg text-light btn-block font-weight-bold mx-5' aria-pressed="false">Delete</button><br><br>
				</a>
			</div>
		</div>
  	  </div>
    </div>
</div>


@endsection