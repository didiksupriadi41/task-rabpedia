@extends('master')

@section('title', 'Penambahan Katalog Jasa')

@section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')

<div class="m-2 p-2" id="content">
    <h1 class="text-center mb-4" id="title">List Pekerjaan/Jasa</h1>
    <div id="mainContent">

    	@foreach ($list_kategori as $kategori)
        <div class="accordion my-1" id='{{$kategori["ID Kategori"]}}'>
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-success rounded pb-0" id='{{$kategori["ID Kategori"]}}Summary'
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">{{$kategori["Nama Kategori"]}}</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target='#collapse{{$kategori["ID Kategori"]}}' aria-expanded="true" aria-controls='collapse{{$kategori["ID Kategori"]}}' id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id='collapse{{$kategori["ID Kategori"]}}' class="collapse" aria-labelledby='heading{{$kategori["ID Kategori"]}}' data-parent='#{{$kategori["ID Kategori"]}}'>
                @foreach ($kategori["List Pekerjaan"] as $pekerjaan)
                <div class="accordion my-1 ml-4" id='{{$pekerjaan["ID Pekerjaan"]}}'>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-secondary rounded pb-0" id='{{$pekerjaan["ID Pekerjaan"]}}Summary'
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">{{$pekerjaan["Nama Pekerjaan"]}}@if($pekerjaan["Cabang"] == "Cirebon") (Cirebon) @elseif($pekerjaan["Cabang"] == "Ganesha") (Ganesha)@endif</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabelNum">{{$pekerjaan["Harga Satuan"]}}</h5>
                                <h5 class="text-light mx-3" id="groupPriceLabel">/</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">{{$pekerjaan["Satuan"]}}</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target='#collapse{{$pekerjaan["ID Pekerjaan"]}}' aria-expanded="false" aria-controls='collapse{{$pekerjaan["ID Pekerjaan"]}}' id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id='collapse{{$pekerjaan["ID Pekerjaan"]}}' class="collapse" aria-labelledby='heading{{$pekerjaan["ID Pekerjaan"]}}' data-parent='#{{$pekerjaan["ID Pekerjaan"]}}'>
                        <div class="card-body">
                            <table class="table table-hover p-5">           
                              <tr class="contentHeader">
                                <th class="attribute">Bahan-Upah-Material</th>
                                <th class="attribute">Koefisien</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute"></th>
                              </tr>
                            @foreach ($pekerjaan["Analisis"] as $analisis)
                              <tr class='{{$analisis["Tipe"].$analisis["ID"]}}'>
                                <td hidden class='analisis-Tipe' value="{{$analisis['Tipe']}}"></td>
                                <td hidden class='analisis-ID' value="{{$analisis['ID']}}"></td>
                                <td class='value'>{{$analisis["Bahan-Upah-Material"]}}</td>
                                <td class='value'>{{$analisis["Koefisien"]}}</td>
                                <td class='value'>{{$analisis["Satuan"]}}</td>
                                <td class='value'>{{$analisis["Harga Satuan"]}}</td>
                                <td><button class='deleteRow' id='{{$analisis["Tipe"].$analisis["ID"]}}'>X</td>
                              </tr>                              
                            @endforeach
                            </table>
                            <button class="w-100 rounded insertButton" value='{{$pekerjaan["ID"]}}' id='addBahanUpahMaterial{{$pekerjaan["ID"]}}' data-toggle="modal" data-target="#ModalInsert"><span class="font-weight-bold">+</span></button>
                        </div>      
                    </div>
                </div>              
                @endforeach
            </div>
        </div>
    	@endforeach    
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalInsert" tabindex="-1" role="dialog" aria-labelledby="ModalInsert" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Analisa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="pekerjaan">
        <tr>
        <td><select id="Analisa">
            <option value=""></option>
            <option value="bahan">Bahan</option>
            <option value="upah">Upah</option>
            <option value="material">Material</option>
        </select></td>
        <td><select hidden id="Bahan">
            @foreach($bahan as $elemen_bahan)
                <option value="{{$elemen_bahan->id_bahan}}">{{$elemen_bahan->jenis_bahan_bangunan . ", " . $elemen_bahan->satuan . ", " . $elemen_bahan->harga_satuan . ", " . $elemen_bahan->cabang_itb}}</option>
            @endforeach
        </select>
        <select hidden id="Upah">
            @foreach($upah as $elemen_upah)
                <option value="{{$elemen_upah->id_upah}}">{{$elemen_upah->jenis_pekerja . ", " . $elemen_upah->satuan . ", " . $elemen_upah->harga_satuan . ", " . $elemen_upah->cabang_itb}}</option>
            @endforeach
        </select>
        <select hidden id="Material">
            @foreach($material as $elemen_material)
                <option value="{{$elemen_material->id_material}}">{{$elemen_material->item_material . ", " . $elemen_material->satuan . ", " . $elemen_material->harga_satuan . ", " . $elemen_material->cabang_itb}}</option>
            @endforeach
        </select></td>
        <td><input type="number" id="koefisien" value="0"></td>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button hidden type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsert">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/penambahankatalog.js') }}"></script>
@endsection