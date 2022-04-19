<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservasiController;

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
Route::group([
    'prefix'=>config('admin.path'),
    ],function(){
    Route::get('login', [LoginAdminController::class, 'formLogin'])->name('admin.login');
    Route::post('login', [LoginAdminController::class, 'login']);
    Route::group(['middleware'=>'auth:admin'],function(){
    Route::post('logout', [LoginAdminController::class, 'logout'])->name('admin.logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/akun','AdminController@akun')->name('admin.akun');
    Route::put('/akun','AdminController@updateAkun');
    Route::resource('pemesanan','PemesananController');
    Route::get('pemesanan/{pemesanan}/success', [PemesananController::class, 'success'])
    ->name('pemesanan.success');
    Route::get('pemesanan/{pemesanan}/success/invoice', [PemesananController::class, 'invoice'])
    ->name('pemesanan.invoice');
    Route::resource('kamar','KamarController');
    Route::resource('user','UserController');
    Route::resource('kamar.fasilitas','FasilitasKamarController');
    Route::resource('fasilitas','FasilitasHotelController');

    Route::group(['middleware'=>['can:level,"admin"']], function(){
         Route::resource('admin','AdminController');
    });

    });
});


Auth::Routes(['verify'=> true]);
Route::get('/verify', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');




Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

Route::get('reservasi/create', [ReservasiController::class, 'index'])->name('reservasi');

Route::get('/','LandingController@index')->name('landing');

Route::get('/room/detail/{kamar}','DetailController@index')->name('room.detail');

Route::get('/room','DetailController@room')->name('room');
Route::get('/room/search/','DetailController@search')->name('search');

Route::get('/facilities','FacilitiesController@facilities')->name('facilities');

Route::get('/contact','ContactController@contact')->name('contact');
Route::post('/contact/send-message','ContactController@sendEmail')->name('contact.send');


Route::get('/detail/booking/{kamar}','BookingController@index')
->name('booking')
->middleware(['auth','verified']);

Route::post('booking/room/{kamar}','BookingController@create')
->name('booking.room')
->middleware(['auth','verified']);

Route::get('booking/payment/{pemesanan}','PaymentController@index')
->name('payment')
->middleware(['auth','verified']);

Route::get('booking/payment/{pemesanan}/success','PaymentController@mail')
->name('mail')
->middleware(['auth','verified']);

