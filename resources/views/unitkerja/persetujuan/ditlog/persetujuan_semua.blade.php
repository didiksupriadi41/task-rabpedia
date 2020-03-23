@extends('master')

@section('title', 'Persetujuan Ditlog')

@section('content')

<div class="m-2 p-2" id="content">
	<h1 class="text-center mb-4" id="title">List Persetujuan</h1>
    <div id="mainContent">
      <h2 id="component"> Bahan Pekerjaan </h2>
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
          <tr>
          	<td hidden class='bahan-ID'></td>
            <td class='value jenis_bahan_bangunan'>Pasir</td>
            <td class='value satuan'>m3</td>
            <td class='value harga_satuan'>10000</td>
            <td class='value kelompok_bahan'>AGREGAT KASAR</td>
            <td class='value cabang_itb'>GANESHA</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='btn btn-secondary btn-success btn-sm text-light font-weight-bold mr-2' data-toggle="button" aria-pressed="false">v</button>
              	<button class='btn btn-secondary btn-danger btn-sm text-light font-weight-bold ml-2' data-toggle="button" aria-pressed="false">x</button>
              </div>
            </td>
          </tr>
        </table>
      <h2 id="component"> Material </h2>
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
          <tr>
          	<td hidden class='bahan-ID'></td>
            <td class='value jenis_bahan_bangunan'>Pasir</td>
            <td class='value satuan'>m3</td>
            <td class='value harga_satuan'>10000</td>
            <td class='value kelompok_bahan'>AGREGAT KASAR</td>
            <td class='value cabang_itb'>GANESHA</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='btn btn-secondary btn-success btn-sm text-light font-weight-bold mr-2' data-toggle="button" aria-pressed="false">v</button>
              	<button class='btn btn-secondary btn-danger btn-sm text-light font-weight-bold ml-2' data-toggle="button" aria-pressed="false">x</button>
              </div>
            </td>
          </tr>
        </table>
      <h2 id="component"> Pekerjaan </h2>
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
          <tr>
          	<td hidden class='bahan-ID'></td>
            <td class='value jenis_bahan_bangunan'>Pasir</td>
            <td class='value satuan'>m3</td>
            <td class='value harga_satuan'>10000</td>
            <td class='value kelompok_bahan'>AGREGAT KASAR</td>
            <td class='value cabang_itb'>GANESHA</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='btn btn-secondary btn-success btn-sm text-light font-weight-bold mr-2' data-toggle="button" aria-pressed="false">v</button>
              	<button class='btn btn-secondary btn-danger btn-sm text-light font-weight-bold ml-2' data-toggle="button" aria-pressed="false">x</button>
              </div>
            </td>
          </tr>
        </table>
      <h2 id="component"> Upah </h2>
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
          <tr>
          	<td hidden class='bahan-ID'></td>
            <td class='value jenis_bahan_bangunan'>Pasir</td>
            <td class='value satuan'>m3</td>
            <td class='value harga_satuan'>10000</td>
            <td class='value kelompok_bahan'>AGREGAT KASAR</td>
            <td class='value cabang_itb'>GANESHA</td>
            <td class='changeDBButton'>
              <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
              	<button class='btn btn-secondary btn-success btn-sm text-light font-weight-bold mr-2' data-toggle="button" aria-pressed="false">v</button>
              	<button class='btn btn-secondary btn-danger btn-sm text-light font-weight-bold ml-2' data-toggle="button" aria-pressed="false">x</button>
              </div>
            </td>
          </tr>
        </table>
    </div>
    
</div>
@endsection

@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
@endsection