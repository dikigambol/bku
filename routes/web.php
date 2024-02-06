<?php

use App\Http\Controllers\RkaklController;
use Illuminate\Support\Facades\Route;

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

Route::get('/config-reset', function () {
    Artisan::call('migrate:fresh --seed');
    return 'Migrated successfully!';
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::post('rkakl/import', 'HomeController@import')->name('import');
Route::get('/all-log-import', 'HomeController@getImportLog')->name('getImportLog');
Route::post('rkakl/edit', 'HomeController@updateRkakl')->name('editRkakl');
Route::post('/getRkakl', 'HomeController@filRkakl')->name('getRkakl');
Route::get('/idxRkakl', 'HomeController@rkakl')->name('idxRkakl');
Route::post('/getLevel', 'HomeController@getLevel')->name('getLevel');
Route::get('/countCart', 'HomeController@countCart')->name('countCart');
Route::get('/getCart', 'HomeController@getCart')->name('getCart');
Route::put('/addCart', 'HomeController@addCart')->name('addCart');
Route::post('/delCart', 'HomeController@delCart')->name('delCart');
Route::post('/delItem', 'HomeController@delItem')->name('delItem');
Route::post('/canCart', 'HomeController@canCart')->name('canCart');
Route::post('/saveCart', 'HomeController@saveCart')->name('saveCart');
Route::post('/addTup', 'HomeController@addTup')->name('addTup');
Route::get('/download/{id}', 'HomeController@download')->name('download');
Route::get('/cetak/{id}', 'HomeController@cetak')->name('cetak');
Route::post('/closeTup', 'HomeController@closeTup')->name('closeTup');
Route::post('/search', 'HomeController@search')->name('search');

Route::get('/rkakl/{id}', 'HomeController@index');
Route::post('/chgStatus', 'RkaklController@update')->name('chgStatus');
Route::get('/riwayat', 'RkaklController@riwayat');
Route::post('/filter', 'RkaklController@filter')->name('filter');
Route::post('/approve', 'RkaklController@approve');
Route::get('/detail/{id_cart}', 'RkaklController@detailPengajuan');

Route::get('/riwayat_tf', 'TransferController@riwayat')->name('riwayat_tf');
Route::resource('transfer', TransferController::class);

Route::get('/formSatker/{aksi}/{id}', 'SatkerController@tampil_form')->name('formSatker');
Route::resource('satker', SatkerController::class);

Route::resource('unor', UnorController::class);

Route::resource('user', UsersController::class);
