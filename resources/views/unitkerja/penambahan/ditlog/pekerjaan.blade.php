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
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id='{{$kategori["ID Kategori"]}}Summary'
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">{{$kategori["Nama Kategori"]}}</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target='#collapse{{$kategori["ID Kategori"]}}' aria-expanded="true" aria-controls='collapse{{$kategori["ID Kategori"]}}' id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id='collapse{{$kategori["ID Kategori"]}}' class="collapse" aria-labelledby='heading{{$kategori["ID Kategori"]}}' data-parent='#{{$kategori["ID Kategori"]}}'>
                <div>
                @foreach ($kategori["List Pekerjaan"] as $pekerjaan)
                <div class="accordion my-1 ml-4" id='accordion{{$pekerjaan["ID Pekerjaan"]}}{{$pekerjaan["Cabang"]}}'>
                  <div class="card">
                    <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id='{{$pekerjaan["ID Pekerjaan"]}}Summary'>
                      <h5 class="text-light font-weight-bold pl-1" id="groupName">{{$pekerjaan["Nama Pekerjaan"]}}@if($pekerjaan["Cabang"] == "Cirebon") (Cirebon) @elseif($pekerjaan["Cabang"] == "Ganesha") (Ganesha)@endif</h5>
                      <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabelNum">{{$pekerjaan["Harga Satuan"]}}</h5>
                        <h5 class="text-light mx-3" id="groupPriceLabel">/</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">{{$pekerjaan["Satuan"]}}</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target='#collapse{{$pekerjaan["ID Pekerjaan"]}}{{$pekerjaan["Cabang"]}}' aria-expanded="false" aria-controls='collapse{{$pekerjaan["ID Pekerjaan"]}}{{$pekerjaan["Cabang"]}}' id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                      </div>
                    </div>
                  </div>
                    
                  <div id='collapse{{$pekerjaan["ID Pekerjaan"]}}{{$pekerjaan["Cabang"]}}' class="collapse" aria-labelledby='heading{{$pekerjaan["ID Pekerjaan"]}}' data-parent='#accordion{{$pekerjaan["ID Pekerjaan"]}}{{$pekerjaan["Cabang"]}}'>
                    <div class="card-body">
                      <input hidden class='pekerjaanid' value='{{$pekerjaan["ID"]}}'>
                      <input hidden class='pekerjaanid_pekerjaan' value='{{$pekerjaan["ID Pekerjaan"]}}'>
                      <input hidden class='pekerjaancabang_itb' value='{{$pekerjaan["Cabang"]}}'>
                      <button class='deleteRowPekerjaan btn btn-secondary btn-danger btn-lg text-light font-weight-bold' id='{{$pekerjaan["ID"]}}'>Delete Pekerjaan</button><br><br>
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
                          <td class='value'><input type="number" value='{{$analisis["Koefisien"]}}'></td>
                          <td class='value'>{{$analisis["Satuan"]}}</td>
                          <td class='value'>{{$analisis["Harga Satuan"]}}</td>
                          <td class='changeDBButton'>
                            <div class="btn-group btn-group-sm" role="group" aria-label="changeDBButtons">
                              <button class='updateRowAnalisa btn btn-secondary btn-success btn-sm text-light font-weight-bold' id='{{$analisis["Tipe"].$analisis["ID"]}}'>Update
                              </button>
                              <button class='deleteRowAnalisa btn btn-secondary btn-danger btn-sm text-light font-weight-bold' id='{{$analisis["Tipe"].$analisis["ID"]}}'>Delete
                              </button>
                            </div>
                          </td>
                        </tr>                              
                        @endforeach
                      </table>
                      <button class="w-100 rounded insertButtonAnalisa" value='{{$pekerjaan["ID"]}}' id='addBahanUpahMaterial{{$pekerjaan["ID"]}}' data-toggle="modal" data-target="#ModalInsertAnalisa"><span class="font-weight-bold">+</span></button>
                    </div>      
                  </div> 
                </div>             
                @endforeach
                </div>
                <button class="w-100 rounded btn-warning insertButtonPekerjaan" value='{{$kategori["ID Kategori"]}}' id='addBahanUpahMaterial{{$kategori["ID Kategori"]}}' data-toggle="modal" data-target="#ModalInsertPekerjaan"><span class="font-weight-bold">Insert Pekerjaan</span></button>
            </div>
        </div>
      @endforeach    
    </div>
</div>

<!-- Modal Insert Analisa-->
<div class="modal fade" id="ModalInsertPekerjaan" tabindex="-1" role="dialog" aria-labelledby="ModalInsertPekerjaan" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Pekerjan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <input type="hidden" id="kategori">
          <div class="form-row">
            <div class="form-group col-md">
              <label for="jenis_pekerjaan"><h6>Jenis Pekerjaan</h6></label>
              <input class="form-control" id="jenis_pekerjaan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="spesifikasi_teknis"><h6>Spesifikasi Teknis</h6></label>
              <input class="form-control" id="spesifikasi_teknis">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-info active">
                  <input type="radio" name="optionsAnalisa" id="dengan_analisa" value="Dengan Analisa" autocomplete="off"> Dengan Analisa
                </label>
                <label class="btn btn-info">
                  <input type="radio" name="optionsAnalisa" id="tanpa_analisa" value="Tanpa Analisa" autocomplete="off" checked> Tanpa Analisa
                </label>
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="satuan"><h6>Satuan</h6></label>
              <select class="form-control" id="satuan">
                @foreach($pekerjaan_satuan as $elemen_pekerjaan_satuan)
                  <option value="{{$elemen_pekerjaan_satuan->satuan}}">
                    {{$elemen_pekerjaan_satuan->satuan}}
                  </option>
                @endforeach
              </select>
            </div>
            <div class="form-group col-md">
              <label for="harga_satuan" class="harga_satuan"><h6>Harga Satuan</h6></label>
              <input class="form-control harga_satuan" type="number" id="harga_satuan" placeholder="Harga Satuan">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="cabang_itb"><h6>Cabang ITB</h6></label>
              <select class="form-control" id="cabang_itb">
                @foreach($pekerjaan_cabang as $elemen_pekerjaan_cabang)
                  <option value="{{$elemen_pekerjaan_cabang->cabang_itb}}">
                    {{$elemen_pekerjaan_cabang->cabang_itb}}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsertPekerjaan">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Insert Analisa-->
<div class="modal fade" id="ModalInsertAnalisa" tabindex="-1" role="dialog" aria-labelledby="ModalInsertAnalisa" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Insert Analisa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <input type="hidden" id="pekerjaan">
          <div class="form-row">
            <div class="form-group col-md">
              <label for="Analisa"><h6>Jenis Analisa</h6></label>
              <select class="form-control" id="Analisa">
                <option value="bahan">Bahan</option>
                <option value="upah">Upah</option>
                <option value="material">Material</option>
              </select>
            </div>
            <div class="form-group col-md">
              <label for="Koefisien"><h6>Koefisien</h6></label>
              <input class="form-control" type="number" id="Koefisien" value="0">  
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md">
              <label for="ListAnalisa"><h6 id="JenisAnalisa">Bahan</h6></label>
              <select class="form-control" id="Bahan">
                @foreach($bahan as $elemen_bahan)
                  <option value="{{$elemen_bahan->id_bahan}}">{{$elemen_bahan->jenis_bahan_bangunan . ", " . $elemen_bahan->satuan . ", " . $elemen_bahan->harga_satuan . ", " . $elemen_bahan->cabang_itb}}</option>
                @endforeach
              </select>
              <select class="form-control" hidden id="Upah">
                @foreach($upah as $elemen_upah)
                  <option value="{{$elemen_upah->id_upah}}">{{$elemen_upah->jenis_pekerja . ", " . $elemen_upah->satuan . ", " . $elemen_upah->harga_satuan . ", " . $elemen_upah->cabang_itb}}</option>
                @endforeach
              </select>
              <select class="form-control" hidden id="Material">
                @foreach($material as $elemen_material)
                  <option value="{{$elemen_material->id_material}}">{{$elemen_material->item_material . ", " . $elemen_material->satuan . ", " . $elemen_material->harga_satuan . ", " . $elemen_material->cabang_itb}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsertAnalisa">Save changes</button>
      </div>
    </div>
  </div>
</div>

@endsection
@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/ditlog/penambahanpekerjaan.js') }}"></script>
@endsection