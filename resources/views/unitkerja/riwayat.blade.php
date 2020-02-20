@extends('master')

@section('title', 'Riwayat Pengajuan')

@section('content')
<div class="mt-4">
    <div class="accordion" id="accordionHistory">
        <div class="card">
            <div class="card-header d-flex justify-content-between" id="headingOne">
                <h2 class="mb-0">
                    <button class="btn btn-link text-left text-dark" type="button" data-toggle="collapse"
                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        <span>Pengajuan Perbaikan Lorong Lt4 Labtek V</span><br>
                        <span>Jumat, 14 Februari 2020</span>
                    </button>
                </h2>
                <div class="d-flex align-items-center">
                    <span class="status-pill bg-warning">Diproses Ditlog</span>
                </div>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionHistory">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jasa</th>
                                <th class="text-right" scope="col">Jumlah</th>
                                <th class="text-right" scope="col">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cat Dinding Dulux</td>
                                <td class="text-right">50 m<sup>2</sup></td>
                                <td class="text-right">Rp 300.000</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jendela Stainless Steel 1m x 3m</td>
                                <td class="text-right">2 buah</td>
                                <td class="text-right">Rp 600.000</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Upah</td>
                                <td class="text-right">2 Orang</td>
                                <td class="text-right">Rp 200.000</td>
                            </tr>
                        </tbody>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between" id="headingTwo">
                <h2 class="mb-0">
                    <button class="btn btn-link text-left text-dark collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <span>Pengajuan Perbaikan Kelas 7602</span><br>
                        <span>Jumat, 7 Februari 2020</span>
                    </button>
                </h2>
                <div class="d-flex align-items-center">
                    <span class="status-pill bg-warning">Dikerjakan</span>
                </div>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionHistory">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jasa</th>
                                <th class="text-right" scope="col">Jumlah</th>
                                <th class="text-right" scope="col">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cat Dinding Dulux</td>
                                <td class="text-right">50 m<sup>2</sup></td>
                                <td class="text-right">Rp 300.000</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jendela Stainless Steel 1m x 3m</td>
                                <td class="text-right">2 buah</td>
                                <td class="text-right">Rp 600.000</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Upah</td>
                                <td class="text-right">2 Orang</td>
                                <td class="text-right">Rp 200.000</td>
                            </tr>
                        </tbody>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between" id="headingThree">
                <h2 class="mb-0">
                    <button class="btn btn-link text-left text-dark collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        <span>Pengajuan Perbaikan Kelas 7601</span><br>
                        <span>Jumat, 5 Februari 2020</span>
                    </button>
                </h2>
                <div class="d-flex align-items-center">
                    <span class="status-pill bg-success text-white">Selesai</span>
                </div>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionHistory">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jasa</th>
                                <th class="text-right" scope="col">Jumlah</th>
                                <th class="text-right" scope="col">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cat Dinding Dulux</td>
                                <td class="text-right">50 m<sup>2</sup></td>
                                <td class="text-right">Rp 300.000</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jendela Stainless Steel 1m x 3m</td>
                                <td class="text-right">2 buah</td>
                                <td class="text-right">Rp 600.000</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Upah</td>
                                <td class="text-right">2 Orang</td>
                                <td class="text-right">Rp 200.000</td>
                            </tr>
                        </tbody>
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
        <div class="card">
            <div class="card-header d-flex justify-content-between" id="headingFour">
                <h2 class="mb-0">
                    <button class="btn btn-link text-left text-dark collapsed" type="button" data-toggle="collapse"
                        data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        <span>Pengajuan Perbaikan Lab Bukalapak</span><br>
                        <span>Jumat, 5 Februari 2020</span>
                    </button>
                </h2>
                <div class="d-flex align-items-center">
                    <span class="status-pill bg-danger text-white">Ditolak</span>
                </div>
            </div>
            <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionHistory">
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Jasa</th>
                                <th class="text-right" scope="col">Jumlah</th>
                                <th class="text-right" scope="col">Biaya</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Cat Dinding Dulux</td>
                                <td class="text-right">50 m<sup>2</sup></td>
                                <td class="text-right">Rp 300.000</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jendela Stainless Steel 1m x 3m</td>
                                <td class="text-right">2 buah</td>
                                <td class="text-right">Rp 600.000</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Upah</td>
                                <td class="text-right">2 Orang</td>
                                <td class="text-right">Rp 200.000</td>
                            </tr>
                        </tbody>
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
</div>
@endsection