@extends('master')

@section('title', 'Riwayat Pengajuan')

@section('content')
<div class="mt-4">
    
    @foreach($pengajuan as $pngj)   
        <?php $i = 0;?>     
        <div class="accordion" id="accordionHistory">
            <div class="card">
                <div class="card-header d-flex justify-content-between" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link text-left text-dark" type="button" data-toggle="collapse"
                            data-target="#collapseOne_{{ $pngj->id_pengajuan }}" aria-expanded="true" aria-controls="collapseOne">
                            <span>{{ $pngj->nama_rab }}</span><br>
                            <span>{{ $pngj->created_at }}</span>
                        </button>
                    </h2>
                    <div class="d-flex align-items-center">
                        @if($pngj->status_pengajuan === 'Ditolak')
                            <span class="status-pill bg-danger text-white">{{ $pngj->status_pengajuan }}</span>
                        @elseif($pngj->status_pengajuan === 'Selesai')
                            <span class="status-pill bg-success text-white">{{ $pngj->status_pengajuan }}</span>
                        @else
                            <span class="status-pill bg-warning">{{ $pngj->status_pengajuan }}</span>
                        @endif
                    </div>
                </div>
                <div id="collapseOne_{{ $pngj->id_pengajuan }}" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionHistory">
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Jasa</th>
                                    <th class="text-right" scope="col">Jumlah</th>
                                    <th class="text-right" scope="col">Biaya</th>
                                </tr>
                            </thead>
                            @foreach($detail_pengajuan as $dtl_pngj)
                                @if($dtl_pngj->id_pengajuan == $pngj->id_pengajuan)
                                    <tbody>
                                        <tr>
                                            @foreach($pekerjaan as $pkj)
                                                @if($dtl_pngj->id_pekerjaan == $pkj->id)
                                                    <?php $i += 1;?>
                                                    <th scope="row"> {{ $i }} </th>
                                                    <td>{{ $pkj->jenis_pekerjaan }}</td>
                                                @endif
                                            @endforeach
                                            <td class="text-right">{{ $dtl_pngj->volume }} {{$pkj->satuan}}</td>
                                            <td class="text-right">Rp {{ $dtl_pngj->jumlah_harga }}</td>
                                        </tr>
                                    </tbody>
                                @endif
                            @endforeach
                        </table>
                        <div class="text-right">
                            <button type="button" class="btn btn-success">
                                <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                                Download RAB
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
</div>
@endsection