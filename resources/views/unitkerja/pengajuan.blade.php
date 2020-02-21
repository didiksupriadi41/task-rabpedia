@extends('master')

@section('title', 'Pengajuan Jasa')

@section('content')

<div class="m-2 p-2" id="content">
    <h1 class="text-center mb-4" id="title">Rencana Anggaran Biaya</h1>
    <div id="mainContent">
        <div class="accordion my-1" id="group1">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id="group1Summary"
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">Persiapan dan Bongkaran</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 10.000.000,00</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG1" aria-expanded="true" aria-controls="collapseG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id="collapseG1" class="collapse" aria-labelledby="headingG1" data-parent="#group1">
                <div class="accordion my-1 ml-4" id="subGroup1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup1Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pekerjaan Persiapan</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 4.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG1SG1" aria-expanded="false" aria-controls="collapseG1SG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG1SG1" class="collapse" aria-labelledby="headingSG1" data-parent="#subGroup1">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Listrik Kerja Type A</td>
                                <td class="value">Pemakaian sampai 100kwh</td>
                                <td class="value">ls</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="value">G-01</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                              <tr>
                                <td class="value">Papan Proyek Type C</td>
                                <td class="value">Papan Ukuran 2m x 1,5m</td>
                                <td class="value">m2</td>
                                <td class="value">Rp. 2.500.000,00</td>
                                <td class="value">G-02</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 2.500.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    
                    </div>
        
                </div>

                <div class="accordion my-1 ml-4" id="subGroup2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup2Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pekerjaan Bongkaran</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 3.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG1SG2" aria-expanded="false" aria-controls="collapseG1SG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG1SG2" class="collapse" aria-labelledby="headingSG2" data-parent="#subGroup2">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Bongkar Tangga Putar</td>
                                <td class="value">Pembongkaran dilakukan secara hati-hati, rapih, hasil bongkaran dikoordinasikan dengan pengawas/user</td>
                                <td class="value">m2</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="value">G-04</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                              <tr>
                                <td class="value">Bongkar dinding</td>
                                <td class="value">Pembongkaran dilakukan secara hati-hati, rapih, hasil bongkaran dikoordinasikan dengan pengawas/user</td>
                                <td class="value">m2</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="value">G-05</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.500.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup3Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pemasangan Kembali</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 2.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG1SG3" aria-expanded="false" aria-controls="collapseG1SG3" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG1SG3" class="collapse" aria-labelledby="headingSG3" data-parent="#subGroup3">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pemasangan Kembali Panel</td>
                                <td class="value">Pasang Kembali Panel berikut dengan instalasi, kerusakan menjadi tanggung jawab penyedia</td>
                                <td class="value">unit</td>
                                <td class="value">Rp. 2.000.000,00</td>
                                <td class="value">G-06</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 2.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup4Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pembersihan dan Pembuangan</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG1SG4" aria-expanded="false" aria-controls="collapseG1SG4" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG1SG4" class="collapse" aria-labelledby="headingSG4" data-parent="#subGroup4">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Perbaikan Talang cucuran labtek 5,6,7,8</td>
                                <td class="value">Perbaikan meliputi titik talang yang bocor, diperbaiki dengan hasil yang rapih dan kuat berikut buangan sampah pada talang</td>
                                <td class="value">unit</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-07</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion my-1" id="group2">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id="group2Summary"
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">Sipil</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG2" aria-expanded="true" aria-controls="collapseG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id="collapseG2" class="collapse" aria-labelledby="headingG1" data-parent="#group2">
                <div class="accordion my-1 ml-4" id="subGroup1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup1Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pekerjaan Tanah</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG2SG1" aria-expanded="false" aria-controls="collapseG2SG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG2SG1" class="collapse" aria-labelledby="headingSG1" data-parent="#subGroup1">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Menggali tanah biasa sedalam max 2 meter</td>
                                <td class="value">-</td>
                                <td class="value">m3</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-10</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    
                    </div>
        
                </div>

                <div class="accordion my-1 ml-4" id="subGroup2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup2Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Sipil Struktur</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG2SG2" aria-expanded="false" aria-controls="collapseG2SG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG2SG2" class="collapse" aria-labelledby="headingSG2" data-parent="#subGroup2">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup3Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Sipil Jalan</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG2SG3" aria-expanded="false" aria-controls="collapseG2SG3" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG2SG3" class="collapse" aria-labelledby="headingSG3" data-parent="#subGroup3">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup4Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Sipil Atap</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG2SG4" aria-expanded="false" aria-controls="collapseG2SG4" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG2SG4" class="collapse" aria-labelledby="headingSG4" data-parent="#subGroup4">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion my-1" id="group3">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id="group3Summary"
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">Arsitektural</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 2.000.000,00</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG3" aria-expanded="true" aria-controls="collapseG3" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id="collapseG3" class="collapse" aria-labelledby="headingG1" data-parent="#group3">
                <div class="accordion my-1 ml-4" id="subGroup1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup1Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Dinding, Lantai, dan Penutup Langit-langit</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG3SG1" aria-expanded="false" aria-controls="collapseG3SG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG3SG1" class="collapse" aria-labelledby="headingSG1" data-parent="#subGroup1">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pasang baru lapisan alumunium composite panel PVDF (tanpa rangka)</td>
                                <td class="value">Alumunium Composite menggunakan Seven PVDF tebal 4mm berikut pemasangan menggunakan skrup termasuk sealant khusus ACP</td>
                                <td class="value"></td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-15</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    
                    </div>
        
                </div>

                <div class="accordion my-1 ml-4" id="subGroup2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup2Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Pintu dan Jendela</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG3SG2" aria-expanded="false" aria-controls="collapseG3SG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG3SG2" class="collapse" aria-labelledby="headingSG2" data-parent="#subGroup2">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pasang Handle+kunci Cylinder untuk pintu kayu/panel</td>
                                <td class="value">Pasang handle kunci dan Cylinder menggunakan Dekkson, berikut dengan aksesorisnya.</td>
                                <td class="value">set</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-16</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup3">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup3Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Sanitari</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG3SG3" aria-expanded="false" aria-controls="collapseG3SG3" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG3SG3" class="collapse" aria-labelledby="headingSG3" data-parent="#subGroup3">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>

                <div class="accordion my-1 ml-4" id="subGroup4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup4Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Taman</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG3SG4" aria-expanded="false" aria-controls="collapseG3SG4" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG3SG4" class="collapse" aria-labelledby="headingSG4" data-parent="#subGroup4">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion my-1" id="group4">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id="group4Summary"
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">Mekanikal</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 3.000.000,00</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG4" aria-expanded="true" aria-controls="collapseG4" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id="collapseG4" class="collapse" aria-labelledby="headingG1" data-parent="#group4">
                <div class="accordion my-1 ml-4" id="subGroup1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup1Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Mekanikal Alat</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 2.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG4SG1" aria-expanded="false" aria-controls="collapseG4SG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG4SG1" class="collapse" aria-labelledby="headingSG1" data-parent="#subGroup1">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pemasangan pompa banjir head 10 m</td>
                                <td class="value">Pemasangan pompa menggunakan Pompa celup Grundfos KPC600A head 10m, 266 liter/ menit, tegangan listrik 220 volt,diameter outlet 1 1/4".</td>
                                <td class="value">unit</td>
                                <td class="value">Rp. 2.000.000,00</td>
                                <td class="value">G-20</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 2.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    
                    </div>
        
                </div>

                <div class="accordion my-1 ml-4" id="subGroup2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup2Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Mekanikal Instalasi</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 1.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG4SG2" aria-expanded="false" aria-controls="collapseG4SG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG4SG2" class="collapse" aria-labelledby="headingSG2" data-parent="#subGroup2">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pengisian refrigeran R22</td>
                                <td class="value">Pengisian refrigeran honeywell termasuk pengukuran tekanan kerja discharge dan suction pressure (Psi) dengan menggunakan manifold gauge</td>
                                <td class="value">kg</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-21</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion my-1" id="group5">
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary rounded pb-0" id="group5Summary"
                >
                    <h5 class="text-light font-weight-bold pl-1" id="groupName">Elektrikal</h5>
                    <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                        <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                        <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 4.000.000,00</h5>
                        <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG5" aria-expanded="true" aria-controls="collapseG5" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                    </div>
                </div>
            </div>

            <div id="collapseG5" class="collapse" aria-labelledby="headingG1" data-parent="#group4">
                <div class="accordion my-1 ml-4" id="subGroup1">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup1Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Elektrikal Alat</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 4.000.000,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG5SG1" aria-expanded="false" aria-controls="collapseG5SG1" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG5SG1" class="collapse" aria-labelledby="headingSG1" data-parent="#subGroup1">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                              <tr>
                                <td class="value">Pek. Pasang armatur lampu RM 2x36 watt </td>
                                <td class="value">Pasang armatur lampu TL 2x36 watt menggunakan armatur Kap Lampu RM Philips TBS318 berikut lampunya.</td>
                                <td class="value">buah</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-25</td>
                                <td class="value">3</td>
                                <td class="value">Rp. 3.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                              <tr>
                                <td class="value">Pek. Pasang Screen Projector </td>
                                <td class="value"> BRITE Motorized 84 " [MR-2121] uk. ( 2.13 m x 2.13 m )</td>
                                <td class="value">unit</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="value">G-29</td>
                                <td class="value">1</td>
                                <td class="value">Rp. 1.000.000,00</td>
                                <td class="deleteRow">X</td>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    
                    </div>
        
                </div>

                <div class="accordion my-1 ml-4" id="subGroup2">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-info rounded pb-0" id="subGroup2Summary"
                        >
                            <h5 class="text-light font-weight-bold pl-1" id="groupName">Elektrikal Instalasi</h5>
                            <div class="d-flex justify-content-end font-weight-bold" id="groupLabelRight">
                                <h5 class="text-light mx-3" id="groupPriceLabel">Jumlah Harga</h5>
                                <h5 class="text-light mx-3" id="groupPriceNumber">Rp. 0,00</h5>
                                <button class="btn btn-link text-left text-dark mx-2 collapsed" type="button" data-toggle="collapse" data-target="#collapseG5SG2" aria-expanded="false" aria-controls="collapseG5SG2" id="Expand"><h5 class="text-light font-weight-bold">V</h5></button>
                            </div>
                        </div>
                    </div>
                    
                    <div id="collapseG5SG2" class="collapse" aria-labelledby="headingSG2" data-parent="#subGroup2">
                        <div class="card-body">
                            <table class="table table-hover p-5">
                              <tr class="contentHeader">
                                <th class="attribute">Uraian Pekerjaan</th>
                                <th class="attribute">Spesifikasi</th> 
                                <th class="attribute">Satuan</th>
                                <th class="attribute">Harga Satuan</th>
                                <th class="attribute">Gambar</th>
                                <th class="attribute">Volume</th>
                                <th class="attribute">Jumlah Harga</th>
                                <th class="attribute"></th>
                              </tr>
                            </table>
                            <button class="w-100 rounded" id="addBarang"><span class="font-weight-bold">+</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between m-3 pt-4" id="footer" style="border-top: 2pt solid black;">
        <div class="w-100 h-100 mr-5" id="comment">
            <h5 id="commentLabel">Komentar :</h5>
            <div class="d-block border div-10 w-100 mt-3" id="commentContent"><p class="p-3">Pemasangan dilakukan di ruang 7602.</p></div>
        </div>

        <div id="rightResult">
            <div id="total">
                <table class="table table-hover mr-3 pl-5" id="tableResult">
                    <tr>
                        <td id="jumlahBiaya"><h5>Jumlah Biaya</h5></td>
                        <td class="ml-5" id="jumlahBiaya"><h5>Rp. 20.000.000,00</h5></td>
                    </tr>
                    <tr>
                        <td id="PPN"="resultName"><h5>PPN 10%</h5></td>
                        <td class="ml-5" id="PPNValue"><h5>Rp. 2.000.000,00</h5></td>
                    </tr>
                    <tr>
                        <td id="total"><h5>TOTAL</h5></td>
                        <td class="ml-5" id="totalValue"><h5>Rp. 22.000.000,00</h5></td>
                    </tr>
                    <tr>
                        <td id="dibulatkan"><h5>Dibulatkan</h5></td>
                        <td class="ml-5" id="dibulatkanValue"><h4 class="font-weight-bold">Rp. 22.000.000,00</h4></td>
                    </tr>
                </table>
            </div>

            <div class="d-flex " id="action">
                <h4 class="mx-3 px-3 py-4 rounded border border-dark bg-danger" id="cancelRAB">Batalkan</h4>
                <h4 class="mx-3 px-3 py-4 rounded border border-dark bg-success" id="continueRAB">Lanjutkan</h4>
            </div>

        </div>
    </div>
</div>

@endsection