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

    Route::get('/riwayat-pengajuan', 'StatusPengajuanController@detail_pengajuan');
	Route::get('/lihat-katalog', 'LihatKatalogController@show_list_katalog');
	Route::get('/penambahan-katalog', 'PenambahanKatalogJasaController@show_list_jasa');   	

    Route::get('/penambahan-ditlog', function(){
        return view('unitkerja.penambahan.ditlog.home');
    });

    Route::get('/penambahan-upah-ditlog', 'PenambahanUpahDitlogController@show_list_upah');
    Route::get('/penambahan-material-ditlog', 'PenambahanMaterialDitlogController@show_list_material');
    Route::get('/penambahan-pekerjaan-ditlog', 'PenambahanPekerjaanDitlogController@show_list_pekerjaan');
    Route::get('/penambahan-bahan-ditlog', 'PenambahanBahanDitlogController@show_list_bahan');

    Route::get('/persetujuan-bahan-ditlog', 'PenyetujuanBahanDitlogController@show_list_bahan_pengajuan');
    Route::get('/persetujuan-material-ditlog', 'PenyetujuanMaterialDitlogController@show_list_material_pengajuan');
    Route::get('/persetujuan-upah-ditlog', 'PenyetujuanUpahDitlogController@show_list_upah_pengajuan');
    Route::get('/penambahan-bahan-user', 'PenambahanBahanDitlogController@show_list_bahan_user');
    Route::get('/penambahan-upah-user', 'PenambahanUpahDitlogController@show_list_upah_user');
    Route::get('/penambahan-material-user', 'PenambahanMaterialDitlogController@show_list_material_user');    
    Route::get('/pengurangan-bahan-user', 'PenambahanBahanDitlogController@show_list_delete_bahan_user');        
    Route::get('/pengurangan-material-user', 'PenambahanMaterialDitlogController@show_list_delete_material_user');
    Route::get('/pengurangan-upah-user', 'PenambahanUpahDitlogController@show_list_delete_upah_user');
    Route::get('/pengeditan-bahan-user', 'PenambahanBahanDitlogController@show_list_edit_bahan_user');        
    Route::get('/pengeditan-material-user', 'PenambahanMaterialDitlogController@show_list_edit_material_user');        
    Route::get('/pengeditan-upah-user', 'PenambahanUpahDitlogController@show_list_edit_upah_user');
    
    Route::post('/deletefrommaterialinsertditlog', 'PenyetujuanMaterialDitlogController@delete_material_insert_user');
    Route::post('/insertfrommaterialinsertditlog', 'PenyetujuanMaterialDitlogController@insert_material_insert_user');
    
    Route::post('/deletefrommaterialupdateditlog', 'PenyetujuanMaterialDitlogController@delete_material_update_user');
    Route::post('/insertfrommaterialupdateditlog', 'PenyetujuanMaterialDitlogController@insert_material_update_user');
    
    Route::post('/deletefrommaterialdeleteditlog', 'PenyetujuanMaterialDitlogController@delete_material_delete_user');
    Route::post('/insertfrombamaterialdeleteditlog', 'PenyetujuanMaterialDitlogController@insert_material_delete_user');
    Route::post('/deletefrombahaninsertditlog', 'PenyetujuanBahanDitlogController@delete_bahan_insert_user');
    Route::post('/insertfrombahaninsertditlog', 'PenyetujuanBahanDitlogController@insert_bahan_insert_user');

    Route::post('/deletefrombahanupdateditlog', 'PenyetujuanBahanDitlogController@delete_bahan_update_user');
    Route::post('/insertfrombahanupdateditlog', 'PenyetujuanBahanDitlogController@insert_bahan_update_user');

    Route::post('/deletefrombahandeleteditlog', 'PenyetujuanBahanDitlogController@delete_bahan_delete_user');
    Route::post('/insertfrombahandeleteditlog', 'PenyetujuanBahanDitlogController@insert_bahan_delete_user');


    Route::get('/riwayat-pengajuan/{id}', 'StatusPengajuanController@show');
    Route::resource('persetujuan', 'PersetujuanController');
});

Route::post('/insertrowbahanuser', 'PenambahanBahanDitlogController@storeBahanUser');
Route::post('/deleterowbahanuser', 'PenambahanBahanDitlogController@deleteBahanUser');
Route::post('/updaterowbahanuser', 'PenambahanBahanDitlogController@updateBahanUser');
Route::post('/insertrowmaterialuser', 'PenambahanMaterialDitlogController@storeMaterialUser');
Route::post('/deleterowmaterialuser', 'PenambahanMaterialDitlogController@deleteMaterialUser');
Route::post('/updaterowmaterialuser', 'PenambahanMaterialDitlogController@updateMaterialUser');
Route::post('/insertrowupahuser', 'PenambahanUpahDitlogController@storeUpahUser');
Route::post('/deleterowupahuser', 'PenambahanUpahDitlogController@deleteUpahUser');
Route::post('/updaterowupahuser', 'PenambahanUpahDitlogController@updateUpahUser');

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