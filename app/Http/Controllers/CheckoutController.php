<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Validator;

class CheckoutController extends Controller
{
    public function index(Kamar $kamar)
    {
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->type_kamar = ucwords($kamar->type_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');

        return view('pages.user.checkout',[
            'kamar'=>$kamar,
        ]);
    }

    public function create(Request $request,Kamar $kamar)
    {
            $request->validate([
            'nama_tamu'=> 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'tanggal_checkin'=>'required|date|after:today',
            'tanggal_checkout'=>'required|date|after:checkin',
            'jum_kamar_dipesan'=>'required|integer|min:1|max:5',
            'spesial_request'=>'required|string|max:200',

            ]);

            $pemesanan = Pemesanan::create([
            'users_id'=> Auth::user()->id,
            'kamar_id'=>$kamar->id,
            'tanggal_checkin'=>$request->tanggal_checkin,
            'tanggal_checkout'=>$request->tanggal_checkout,
            'spesial_request'=>$request->spesial_request,
            'jum_kamar_dipesan'=>$request->jum_kamar_dipesan,
            'nama_pemesan'=> Auth::user()->username,
            'email_pemesan'=> Auth::user()->email,
            'no_hp'=> Auth::user()->phone_number,
            'nama_tamu'=>$request->nama_tamu,
            'status'=>'pending'
        ]);

      

        return redirect()->route('payment',['pemesanan'=>$pemesanan->id]);
       
    }
}
