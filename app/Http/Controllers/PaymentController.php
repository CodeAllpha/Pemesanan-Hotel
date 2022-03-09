<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Helper\Waktu;
use App\Models\User;
use App\Models\Kamar;

use Mail;
use App\Mail\PaymentSuccess;

use Midtrans\Config;
USE mIDTRANS\Snap;


class PaymentController extends Controller
{
    public function index(Pemesanan $pemesanan)
    {

        $kamar = Kamar::find($pemesanan->kamar_id);
        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->waktu = Waktu::get($pemesanan->tanggal_checkin,$pemesanan->tanggal_checkout);
        $pemesanan->tanggal_checkin = date('d/m/Y',strtotime($pemesanan->tanggal_checkin));
        $pemesanan->tanggal_checkout = date('d/m/Y',strtotime($pemesanan->tanggal_checkout));
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $bayar = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan * $pemesanan->waktu;
        $pemesanan->bayar = number_format($bayar,0,',','.');
        $pemesanan->tanggal_dibuat = date('d/m/Y',strtotime($pemesanan->created_at));
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,'.',',');
      

     
        return view('pages.user.payment',['pemesanan'=>$pemesanan,'kamar'=>$kamar]);
    }


    public function mail(Request $request ,$id)
    { 
        
        $pemesanan = Pemesanan::with(['kamar','user'])->findorFail($id);
       

      
        // Config::$serverKey = config('midtrans.serverKey');
        // Config::$isProduction = config('midtrans.isProduction');
        // Config::$isSanitized = config('midtrans.isSanitized');
        // Config::$is3ds = config('midtrans.is3ds');

        
        // $midtrans_params = [
        //     'pemesanan' => [
        //         'order_id' => 'MIDTRANS' . $pemesanan->id,
        //         'gross_amount' => (int) $pemesanan->total
        //     ],
        //     'cotumer_details' => [
        //         'firts_name' => $pemesanan->user->name,
        //         'email' => $pemesanan->user->email,
        //     ],

        //     'enabled_payments' => ['gopay'],
        //     'vtweb' => []  
        // ];

        // try {
           
        //     $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

        //     header('loctaion:'.$paymentUrl);


        // } catch (Exception $e) {
            
        //     echo $e->getMessage();
        // }


        Mail::to($pemesanan->email_pemesan)->send(
            new PaymentSuccess($pemesanan)
        );

        return view('pages.user.success',['pemesanan'=>$pemesanan]);
        
    }
}
