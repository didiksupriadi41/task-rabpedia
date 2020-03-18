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

// // Unprotected route
// Route::get('/', function () {
//     return view('welcome');
// })->name('login');

// // Authentication routes
// Route::get('/login-form', 'Auth\LoginController@showLoginForm');
// Route::get('/sso-login', 'Auth\LoginController@ssoLogin');
// Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Routes protected by authentication middleware
// Route::middleware(['auth'])->group(function () {
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/pengajuan-jasa', function () {
        return view('unitkerja.pengajuan');
    });

    Route::get('/riwayat-pengajuan', 'StatusPengajuanController@detail_pengajuan');
	Route::get('/lihat-katalog', 'LihatKatalogController@show_list_katalog');
    Route::get('/penambahan-katalog', 'PenambahanKatalogJasaController@show_list_jasa');
    
    Route::get('/riwayat-pengajuan/{id}', 'StatusPengajuanController@show');

    // Route::get('/detail-pengajuan', function () {
    //     return view('unitkerja.detail_pengajuan');
    // });

    Route::resource('persetujuan', 'PersetujuanController');
// });

Route::post('/deleterowanalisa', 'PenambahanKatalogJasaController@deleteAnalisa');
Route::post('/insertrowanalisa', 'PenambahanKatalogJasaController@storeAnalisa');