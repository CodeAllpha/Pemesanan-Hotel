<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use App\Models\Pemesanan;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;

class BookingController extends Controller
{
    public function index(Kamar $kamar)
    {
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->kapasitas = ucwords($kamar->kapasitas);
        $kamar->kamar_kosong = number_format($kamar->kamar_kosong);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,',','.');

        return view('pages.user.booking',[
            'kamar'=>$kamar,
        ]);
    }

    public function create(Request $request,Kamar $kamar)
    {
            $request->validate([
            'nama_tamu'=> 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'tanggal_checkin'=>'required|date|after:today',
            'tanggal_checkout'=>'required|date|after:tanggal_checkin',
            'jum_kamar_dipesan'=>'required|integer|min:1|max:50',
            'spesial_request'=>'nullable|string|max:200',

            ],
        [
            'nama_tamu.required' => 'The guest name field is required',
            'nama_tamu.max' => 'The guest name must not be greater than 40 characters.',
            'nama_tamu.regex' => 'The guest name format is invalid.',
            'tanggal_checkin.required' => 'The checkin date field is required',
            'tanggal_checkin.date' => 'The checkin date must be a date after today.',
            'tanggal_checkin.after'=> 'The checkin date must be a date after today.',
            'tanggal_checkout.date' => 'The checkout date must be a date after checkin.',
            'tanggal_checkout.after' => 'The checkout date must be a date after checkin.',
            
        ]);

      

        //  Jumlah Kamar Berkurang
         $kamar = DB::table('kamars')->where('id',$kamar->id)->first();
         $kamar_kosong = $kamar->kamar_kosong - $request->jum_kamar_dipesan;
         
 
         if ($kamar_kosong < 0){
            return abort('404');
         }

         DB::table('kamars')
         ->where('id',$kamar->id)
         ->update(['kamar_kosong' => $kamar_kosong]);




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
