@extends('master')

@section('title', 'Penambahan Katalog Jasa')

{{-- @section('head-extra')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection --}}

@section('content')

<div class="m-2 p-2" id="content">
    <h1 class="text-center mb-4" id="title">Ajukan Perubahan Pekerjaan </h1>
    <div class="accordion my-1">
        <div class="card">
            <div class="card-header d-flex justify-content-between bg-primary rounded"
                id='{{$pekerjaan["id_pekerjaan"]}}Summary'>
                <h5 class="text-light font-weight-bold pl-1 my-1" id="groupName">
                    {{$pekerjaan["jenis_pekerjaan"]}} @if($pekerjaan["cabang_itb"] == "Cirebon") (Cirebon)
                    @elseif($pekerjaan["cabang_itb"] == "Ganesha") (Ganesha)@endif</h5>
                <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                    <h5 class="text-light mx-3 my-1" id="groupPriceLabelNum">{{$pekerjaan["harga_satuan"]}}
                    </h5>
                    <h5 class="text-light mx-3 my-1" id="groupPriceLabel">/</h5>
                    <h5 class="text-light mx-3 my-1" id="groupPriceNumber">{{$pekerjaan["satuan"]}}</h5>
                </div>
            </div>

            <div class="card-body">
                <form action="{{url('/pengajuan-analisa-user/'.$pekerjaan['id'])}}" method="post">
                    {{ csrf_field() }}
                    <table id="table-analisa" class="table table-hover p-5">
                        <tr class="contentHeader">
                            <th class="attribute">Bahan-Upah-Material</th>
                            <th class="attribute">Koefisien</th>
                            <th class="attribute">Satuan</th>
                            <th class="attribute">Harga Satuan</th>
                            <th class="attribute"></th>
                        </tr>
                        @foreach ($pekerjaan["analisis"] as $analisis)
                        <tr id='row-{{$analisis["Tipe"].$analisis["ID"]}}'>
                            <td hidden><input hidden name='data[{{$analisis["Tipe"].$analisis["ID"]}}][jenis_analisa]'
                                    value="{{$analisis['Tipe']}}" /></td>
                            <td hidden><input hidden name='data[{{$analisis["Tipe"].$analisis["ID"]}}][id_analisa]'
                                    value="{{$analisis['ID']}}" /></td>

                            <td class='value'>{{$analisis["Bahan-Upah-Material"]}}</td>
                            <td class='value'>
                                <input class='form-control form-control-sm' type='number'
                                    name='data[{{$analisis["Tipe"].$analisis["ID"]}}][koefisien]'
                                    value='{{$analisis["Koefisien"]}}'>
                            </td>
                            <td class='value'>{{$analisis["Satuan"]}}</td>
                            <td class='value'>{{$analisis["Harga Satuan"]}}</td>
                            <td class='changeDBButton'>
                                <button type="button"
                                    class='delete-row btn btn-secondary btn-danger btn-sm text-light font-weight-bold'
                                    id='{{$analisis["Tipe"].$analisis["ID"]}}'>Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <div class="d-flex">
                        <button class="w-50 mr-2 rounded btn btn-primary flex-fill" value='{{$pekerjaan["id"]}}'
                            id='addBahanUpahMaterial{{$pekerjaan["id"]}}' data-toggle="modal"
                            data-target="#ModalInsertAnalisa" type="button">
                            <span class="font-weight-bold">Tambahkan Analisa</span>
                        </button>
                        <button class="w-50 ml-2 rounded btn btn-success flex-fill" type="submit">
                            <span class="font-weight-bold">Ajukan Perubahan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Modal Insert Analisa-->
<div class="modal fade" id="ModalInsertAnalisa" tabindex="-1" role="dialog" aria-labelledby="ModalInsertAnalisa"
    aria-hidden="true">
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
                            <label for="Analisa">
                                <h6>Jenis Analisa</h6>
                            </label>
                            <select class="form-control" id="Analisa">
                                <option value="bahan">Bahan</option>
                                <option value="upah">Upah</option>
                                <option value="material">Material</option>
                            </select>
                        </div>
                        <div class="form-group col-md">
                            <label for="Koefisien">
                                <h6>Koefisien</h6>
                            </label>
                            <input class="form-control" type="number" id="Koefisien" value="0">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md">
                            <label for="ListAnalisa">
                                <h6 id="JenisAnalisa">Bahan</h6>
                            </label>
                            <select class="form-control" id="Bahan">
                                @foreach($bahan as $elemen_bahan)
                                <option value="{{$elemen_bahan->id_bahan}}">
                                    {{$elemen_bahan->jenis_bahan_bangunan . ", " . $elemen_bahan->satuan . ", " . $elemen_bahan->harga_satuan . ", " . $elemen_bahan->cabang_itb}}
                                </option>
                                @endforeach
                            </select>
                            <select class="form-control" hidden id="Upah">
                                @foreach($upah as $elemen_upah)
                                <option value="{{$elemen_upah->id_upah}}">
                                    {{$elemen_upah->jenis_pekerja . ", " . $elemen_upah->satuan . ", " . $elemen_upah->harga_satuan . ", " . $elemen_upah->cabang_itb}}
                                </option>
                                @endforeach
                            </select>
                            <select class="form-control" hidden id="Material">
                                @foreach($material as $elemen_material)
                                <option value="{{$elemen_material->id_material}}">
                                    {{$elemen_material->item_material . ", " . $elemen_material->satuan . ", " . $elemen_material->harga_satuan . ", " . $elemen_material->cabang_itb}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="submitInsertAnalisa">Save
                    changes</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script-end')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('js/user/pengajuanAnalisa.js') }}"></script>
@endsection