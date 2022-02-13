<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\PemesananController;

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

Route::get('/', function () {
    return view('welcome');
});



Route::group([
    'prefix'=>config('admin.path'),
    ],function(){
    Route::get('login', [LoginAdminController::class, 'formLogin'])->name('admin.login');
    Route::post('login', [LoginAdminController::class, 'login']);
    Route::group(['middleware'=>'auth:admin'],function(){
    Route::post('logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
    Route::view('/','pages.dashboard')->name('dashboard');
    Route::get('/akun','AdminController@akun')->name('admin.akun');
    Route::put('/akun','AdminController@updateAkun');
    Route::resource('pemesanan','PemesananController');
    Route::get('pemesanan/{pemesanan}/success', [PemesananController::class, 'success'])
    ->name('pemesanan.success');
    Route::get('pemesanan/{pemesanan}/success/invoice', [PemesananController::class, 'invoice'])
    ->name('pemesanan.invoice');
    Route::resource('kamar','KamarController');
    Route::resource('kamar.fasilitas','FasilitasKamarController');
    Route::resource('fasilitas','FasilitasHotelController');

    Route::group(['middleware'=>['can:level,"admin"']], function(){

         Route::resource('admin','AdminController');
    });

    });
});