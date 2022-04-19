<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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


    public function search(Request $request)
    {
        $search = $request->input('search');

        $kamar = Kamar::query()
            ->where('nama_kamar','LIKE', "%{$search}%")
            ->orWhere('kapasitas','LIKE',"%{$search}%")
            ->orWhere('tipe_kasur','LIKE',"%{$search}%")
            ->orWhere('harga_kamar','LIKE',"%{$search}%")
            ->get();

            $kamar->map(function($kamar){
                $kamar->foto_kamar = ImageUrl::get('assets/kamar/',$kamar->foto_kamar);
                return $kamar;
            });

            // $kamar = DB::table('kamars')->select('nama_kamar')->distinct()->get()->pluck('nama_kamar');
            // $kamar = $request->has('nama_kamar')
            // ? Kamar::where('nama_kamar', $request->nama_kamar)->get()
            // : [];

           
            
        return view('pages.user.room', compact('kamar'));

    }

    public function room(Request $request, Kamar $kamar)
    {

        $kamar = Kamar::select('id','nama_kamar','foto_kamar','luas_kamar','panjang_kasur','lebar_kasur','harga_kamar','tipe_kasur','kapasitas','kamar_kosong')->get();
        $kamar->map(function($kamar){
            $kamar->nama_kamar = ucwords($kamar->nama_kamar);
            $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');
            $kamar->foto_kamar = ImageUrl::get('assets/kamar/',$kamar->foto_kamar);
            return $kamar;
        });
        
        return view('pages.user.room',[
            'kamar'=>$kamar
                
            
        ]);

    }

}
