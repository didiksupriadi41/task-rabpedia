@extends('master')

@section('title', 'Pengajuan')

@section('content')
<div class="container">
    <div class="row p-3">
        <button type="button" class="btn btn-success bg-primary px-5">
            <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                Print
        </button>
    </div>
    <div class="row align-items-center">
        <div class="col">
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
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <h2> Total : Rp 1.000.000</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="col justify-content-center">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                <label class="form-check-label" for="exampleRadios1">
                    Setuju
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                <label class="form-check-label" for="exampleRadios2">
                    Tidak Setuju
                </label>
            </div>
            <div class="container py-5">
                <p> Komentar </p>
                <div class="form-group">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
            </div>
            </div>
            <button type="button" class="btn btn-success bg-primary p-3">
                <span class="oi oi-spreadsheet" title="spreadsheet" aria-hidden="true"></span>
                    Konfirmasi
            </button>
        </div>
    </div>
<div>
@endsection
