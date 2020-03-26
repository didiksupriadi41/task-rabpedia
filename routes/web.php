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

// Unprotected route
Route::get('/', function () {
    return view('welcome');
})->name('login');

// Authentication routes
Route::get('/login-form', 'Auth\LoginController@showLoginForm');
Route::get('/sso-login', 'Auth\LoginController@ssoLogin');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/pengajuan-jasa', function () {
        return view('unitkerja.pengajuan');
    });

    Route::get('/riwayat-pengajuan', 'StatusPengajuanController@index');
	Route::get('/lihat-katalog', 'LihatKatalogController@show_list_katalog');
	Route::get('/penambahan-katalog', 'PenambahanKatalogJasaController@show_list_jasa');   	

    Route::get('/penambahan-ditlog', function(){
        return view('unitkerja.penambahan.ditlog.home');
    });
    Route::get('/penambahan-bahan-ditlog', 'PenambahanBahanDitlogController@show_list_bahan');
    Route::get('/penambahan-upah-ditlog', 'PenambahanUpahDitlogController@show_list_upah');
    Route::get('/penambahan-material-ditlog', 'PenambahanMaterialDitlogController@show_list_material');
    Route::get('/penambahan-pekerjaan-ditlog', 'PenambahanPekerjaanDitlogController@show_list_pekerjaan');

    Route::get('/riwayat-pengajuan/{id}', 'StatusPengajuanController@show');

    Route::resource('persetujuan', 'PersetujuanController');
});

Route::post('/deleterowanalisa', 'PenambahanKatalogJasaController@deleteAnalisa');
Route::post('/insertrowanalisa', 'PenambahanKatalogJasaController@storeAnalisa');

Route::post('/deleterowupahditlog', 'PenambahanUpahDitlogController@deleteUpah');
Route::post('/insertrowupahditlog', 'PenambahanUpahDitlogController@storeUpah');
Route::post('/updaterowupahditlog', 'PenambahanUpahDitlogController@updateUpah');
Route::post('/deleterowbahanditlog', 'PenambahanBahanDitlogController@deleteBahan');
Route::post('/insertrowbahanditlog', 'PenambahanBahanDitlogController@storeBahan');
Route::post('/updaterowbahanditlog', 'PenambahanBahanDitlogController@updateBahan');
Route::post('/deleterowmaterialditlog', 'PenambahanMaterialDitlogController@deleteMaterial');
Route::post('/insertrowmaterialditlog', 'PenambahanMaterialDitlogController@storeMaterial');
Route::post('/updaterowmaterialditlog', 'PenambahanMaterialDitlogController@updateMaterial');

Route::post('/deleterowpekerjaanditlog', 'PenambahanPekerjaanDitlogController@deletePekerjaan');
Route::post('/insertrowpekerjaanditlog', 'PenambahanPekerjaanDitlogController@storePekerjaan');
Route::post('/deleterowanalisaditlog', 'PenambahanPekerjaanDitlogController@deleteAnalisa');
Route::post('/insertrowanalisaditlog', 'PenambahanPekerjaanDitlogController@storeAnalisa');
Route::post('/updaterowanalisaditlog', 'PenambahanPekerjaanDitlogController@updateAnalisa');