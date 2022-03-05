<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use App\Helper\ImageUrl;

class FacilitiesController extends Controller
{
    public function facilities()
    {
        $fasilitas = FasilitasHotel::select('id','nama_fasilitas_hotel','foto_fasilitas_hotel','deskripsi_fasilitas_hotel')->get();
        
        $fasilitas->map(function($items){
            $items->nama_fasilitas_hotel = ucwords($items->nama_fasilitas_hotel);
            $items->foto_fasilitas_hotel = ImageUrl::get('assets/hotel/',$items->foto_fasilitas_hotel);
            return $items;
        });


        return view('pages.user.facilities',['fasilitas'=>$fasilitas]);
    }
}
