<?php

namespace App\Http\Controllers;

use App\Helper\ImageUrl;
use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Models\Kamar;

class LandingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fasilitas = FasilitasHotel::select('id','nama_fasilitas_hotel','foto_fasilitas_hotel','deskripsi_fasilitas_hotel')->get();
        $kamar = Kamar::select('id','nama_kamar','foto_kamar','nama_kamar as option')->get();
     

        $fasilitas->map(function($items){
            $items->nama_fasilitas_hotel = ucwords($items->nama_fasilitas_hotel);
            $items->foto_fasilitas_hotel = ImageUrl::get('assets/hotel/',$items->foto_fasilitas_hotel);
            return $items;
        });

        $kamar->map(function($items){
            $items->nama_kamar = ucwords($items->nama_kamar);
            $items->foto_kamar = ImageUrl::get('assets/kamar/',$items->foto_kamar);
            $items->option = ucwords($items->option);
            return $items;
        });


      
        return view('pages.user.home',[
            'fasilitas' => $fasilitas,
            'kamar'=>$kamar
        ]);

      


    }

    public function booking()
    {
     
    }


}