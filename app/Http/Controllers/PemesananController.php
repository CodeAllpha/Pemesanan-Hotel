<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Kamar;
use App\Helper\Waktu;
use Barryvdh\DomPDF\Facade\Pdf;

class PemesananController extends Controller
{

    function __construct()
    {
        $this->middleware('can:level,"admin"',[
            'except'=>['index','show','create']
        ]);
    }


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
                    'spesial_request',
                    'nama_tamu',
                    'status'
                        
                    )
        ->when($search,function($query,$search){
            return $query->where('nama_tamu','like',"%{$search}%")
                        ->orWhere('nama_pemesan','like',"%{$search}%")
                        ->orWhere('tanggal_checkin','like',"%{$search}%");
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
        $kamar = Kamar::select('id as value','nama_kamar as option')->get();

        $kamar->map(function($data){
            $data->option = ucwords($data->option);
            return $data;
        });

        return view('pages.pemesanan.create',['kamar'=>$kamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
        
        'nama_pemesan'=> 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
        'nama_tamu'=> 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/',
        'email_pemesan'=>'required|email',
        'kamar'=>'required|numeric|integer|min:1|max:5',
        'no_hp'=>'required|numeric',
        'tanggal_checkin'=>'required|date|after:today',
        'tanggal_checkout'=>'required|date|after:tanggal_checkin',
        'jum_kamar_dipesan'=>'required|integer|min:1|max:5',
        'spesial_request'=>'required|string|max:200',

        ]);

        $pemesanan = Pemesanan::create([
            'kamar_id'=>$request->kamar,
            'tanggal_checkin'=>$request->tanggal_checkin,
            'tanggal_checkout'=>$request->tanggal_checkout,
            'jum_kamar_dipesan'=>$request->jum_kamar_dipesan,
            'nama_pemesan'=>$request->nama_pemesan,
            'email_pemesan'=>$request->email_pemesan,
            'no_hp'=>$request->no_hp,
            'spesial_request'=>$request->spesial_request,
            'nama_tamu'=>$request->nama_tamu,
            'status'=>'pending'
        ]);

        return redirect()->route('pemesanan.success',['pemesanan'=>$pemesanan->id])
        ->with('toast_success','Reservasi Baru Telah Di Tambahkan');
    }

    public function success(Pemesanan $pemesanan)
    {
        return view('pages.pemesanan.success',['data'=>$pemesanan]);
    }

    public function invoice(Pemesanan $pemesanan)
    {
        $kamar = Kamar::find($pemesanan->kamar_id);
        $pemesanan->nama_pemesan = ucwords($pemesanan->nama_pemesan);
        $pemesanan->nama_tamu = ucwords($pemesanan->nama_tamu);
        $pemesanan->tanggal_checkin = date('1,d/m/Y',strtotime($pemesanan->tanggal_checkin));
        $pemesanan->tanggal_checkout = date('1,d/m/Y',strtotime($pemesanan->tanggal_checkout));
        $pemesanan->tanggal_dibuat = date('d/m/Y',strtotime($pemesanan->created_at));
        $total = $kamar->harga_kamar * $pemesanan->jum_kamar_dipesan;
        $pemesanan->total = number_format($total,0,'.',',');
        $kamar->nama_kamar = ucwords($kamar->nama_kamar);
        $kamar->harga_kamar = number_format($kamar->harga_kamar,0,'.',',');
        
        if($kamar->foto_kamar){
            $file = 'assets/kamar/'.$kamar->foto_kamar;

            if (file_exists($file)){
                $kamar->foto_kamar = url($file);

            }else {
                $kamar->foto_kamar = url('assets/kamar/image.png');
            }  

            }else {
                $kamar->foto_kamar = url('assets/kamar/image.png');
            }

        // $pdf = PDF::loadView('invoice',['data'=>$pemesanan,'kamar'=>$kamar]);
        // return $pdf->stream();

        return view('invoice',['data'=>$pemesanan,'kamar'=>$kamar]);
      
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
        $pemesanan->tanggal_dibuat = date('d/m/Y',strtotime($pemesanan->created_at));
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

        return back()->with('toast_success','Status Pemesanan Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        $pemesanan->delete();
        return redirect()->route('pemesanan.index')->with('toast_success', 'Data Berhasil Di Hapus!');
    }
}
