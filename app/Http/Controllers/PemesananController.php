<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Helper\Waktu;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $data = Pemesanan::leftJoin('kamars','kamars.id','pemesanans.kamar_id')
                    ->select(

                    'pemesanans.id as id',
                    'jum_kamar_dipesan as jum',
                    'tanggal_checkin',
                    'tanggal_checkout',
                    'nama_pemesan',
                    'nama_kamar',
                    'email_pemesan',
                    'no_hp',
                    'nama_tamu',
                    'status'
                        
                    )
        ->when($search,function($query,$search){
            return $query->where('nama_tamu','like',"%{$search}%")
                        ->orWhere('nama_pemesan','like',"%{$search}%");
        })
        ->orderBy('id','desc')
        ->paginate(10);

            $data->map(function($item){
            $item->nama_tamu = ucwords($item->nama_tamu);
            $item->nama_kamar = ucwords($item->nama_kamar);
            $item->waktu = Waktu::get($item->tanggal_checkin,$item->tanggal_checkout);
            $item->tanggal_checkin = date('d/m/Y',strtotime($item->tanggal_checkin));
            $item->tanggal_checkout = date('d/m/Y',strtotime($item->tanggal_checkout));
            $item->status = $this->status($item->status);
          
        });

        return view('pages.pemesanan.index',['data'=>$data]);
    }


    public function status($status)
    {
        $data = [
            'pending' => 'Permintaan',
            'checkin' => 'Check IN',
            'checkout' => 'Check OUT',
            'batal' => 'Cancel',
        ];

        return $data[$status];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        $kamar = Kamar::find($pemesanan->kamar_id);
        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->waktu = Waktu::get($pemesanan->tanggal_checkin,$pemesanan->tanggal_checkout);
        $pemesanan->tanggal_checkin = date('d/m/Y',strtotime($pemesanan->tanggal_checkin));
        $pemesanan->tanggal_checkout = date('d/m/Y',strtotime($pemesanan->tanggal_checkout));
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $bayar = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan;
        $pemesanan->bayar = number_format($bayar,0,',','.');
        $pemesanan->tanggal_dibuat = date('d/m/Y H:i:s',strtotime($pemesanan->created_at));
        $pemesanan->value_status = $pemesanan->status;
        $pemesanan->status = $this->status($pemesanan->status);
       

        $option = [
            ['value'=>'pending','option'=>'Permintaan'],
            ['value'=>'checkin','option'=>'Check IN'],
            ['value'=>'checkout','option'=>'Check OUT'],
            ['value'=>'batal','option'=>'Cancel'],
        ];
        return view('pages.pemesanan.show',['pemesanan'=>$pemesanan,'kamar'=>$kamar,'option'=>$option]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        $request->validate([
            'status'=>'required|in:pending,checkin,checkout,batal',
        ]);

        $pemesanan->update([
            'status'=>$request->status,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
