<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/home', function () {
    return view('home');
});
Route::get('/persetujuan', function () {
    return view('unitkerja.persetujuan');
});
Route::get('/pengajuan-jasa', function () {
    return view('unitkerja.pengajuan');
});

Route::get('/riwayat-pengajuan', function () {
    return view('unitkerja.riwayat');
});
