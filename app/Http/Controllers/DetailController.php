<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use App\Helper\ImageUrl;

class DetailController extends Controller
{
    public function index(Kamar $kamar)
    {    

        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->foto_kamar = ImageUrl::get('assets/kamar/',$kamar->foto_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');

        $fasilitas = FasilitasKamar::where('kamar_id',$kamar->id)->get();

        return view('pages.user.detail',[
            'kamar'=>$kamar,
            'fasilitas'=>$fasilitas
        ]);
        
    }

    public function room(Request $request, Kamar $kamar)
    {

        $search = $request->search;

        $kamar = Kamar::select('nama_kamar','type_kamar')
                    ->when($search,function($query,$search){
                        return $query->where('nama_kamar','like',"%{$search}%")
                                    ->orWhere('type_kamar','like',"%{$search}%");
                    });
                    

        $kamar = Kamar::select('id','nama_kamar','foto_kamar','luas_kamar','panjang_kasur','lebar_kasur','harga_kamar','type_kasur','type_kamar')->get();
        $fasilitas = FasilitasKamar::select('id','nama_fasilitas_kamar')->get();
      

        $kamar->map(function($kamar){
            $kamar->nama_kamar = ucwords($kamar->nama_kamar);
            $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');
            $kamar->foto_kamar = ImageUrl::get('assets/kamar/',$kamar->foto_kamar);
            $kamar->option = ucwords($kamar->option);
            return $kamar;
        });

       
        $fasilitas->map(function($kamar){
            $kamar->nama_fasilitas_kamar = ucwords($kamar->nama_fasilitas_kamar);
            return $kamar;
        });
      
        return view('pages.user.room',[
            'kamar'=>$kamar,
            'fasilitas'=>$fasilitas
        ]);


    }

}
