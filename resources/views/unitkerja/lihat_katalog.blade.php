@extends('master')

@section('title', 'Pengajuan Jasa')

@section('content')

<div class="m-2 p-2" id="content">
    <h1 class="text-center mb-4" id="title">List Katalog Pekerjaan</h1>
    <div id="mainContent">

    @foreach ($list_kategori as $kategori)
		<div class="accordion my-1" id='{{$kategori["ID Kategori"]}}'>
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-success rounded pb-0" id='{{$kategori["Nama Kategori"]}}'>
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
                        <div class="card-header d-flex justify-content-between bg-secondary rounded pb-0" id='{{$pekerjaan["ID Pekerjaan"]}}Summary'>
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">{{$pekerjaan["Nama Pekerjaan"]}}@if($pekerjaan["Cabang"] == "Cirebon") (Cirebon) @elseif($pekerjaan["Cabang"] == "Ganesha") (Ganesha)@endif</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabelNum">{{$pekerjaan["Harga Satuan"]}}</h5>
                                <h5 class="text-light mx-3" id="groupPriceLabel">/</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">{{$pekerjaan["Satuan"]}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
    @endforeach
    </div>
</div>

@endsection