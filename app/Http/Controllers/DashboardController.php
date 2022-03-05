<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Models\Admin;
use App\Models\FasilitasHotel;
use App\Models\FasilitasKamar;

class DashboardController extends Controller
{
    public function index(){

    $kamar = Kamar::select(
        DB::raw('count(id) as jumlah_kamar')
    )->first();

    $fasilitas_hotel = FasilitasHotel::select(
        DB::raw('count(id) as jumlah_fasilitas_hotel')
    )->first();

    $admin = Admin::select(
        DB::raw('count(id) as jumlah_admin')
    )->first();

    $fasilitas_kamar = FasilitasKamar::select(
        DB::raw('count(id) as jumlah_fasilitas_kamar')
    )->first();


    $pemesanan = Pemesanan::select(
        DB::raw("SUM(IF(status = 'pending',1,0) ) as jum_permintaan"),
        DB::raw("SUM(IF(status = 'checkin',1,0) ) as checkin"),
    )->first();

    return view('pages.dashboard',[
        'pemesanan'=>$pemesanan,
        'kamar' =>$kamar,
        'fasilitas_hotel' => $fasilitas_hotel,
        'admin' => $admin,
        'fasilitas_kamar' => $fasilitas_kamar
    ]);

    }
}
