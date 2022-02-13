<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FasilitasHotel;
use Illuminate\Support\Facades\File;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    $search = $request->search;

    $data = FasilitasHotel::select('id','nama_fasilitas_hotel','foto_fasilitas_hotel','deskripsi_fasilitas_hotel')
            ->when($search,function($query,$search){
            return $query->where('nama_fasilitas_hotel','like',"%{$search}%")
            ->orWhere('deskripsi_fasilitas_hotel','like',"%{$search}%");
            })
            ->paginate(10);

    return view('pages.fasilitas_hotel.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.fasilitas_hotel.create');
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
            'nama_fasilitas_hotel' => 'required',
            'foto_fasilitas_hotel' => 'required|image|mimes:png,jpg,jpeg|between:100,20042',
            'deskripsi_fasilitas_hotel' => 'nullable',
        ]);

        
        $data = new FasilitasHotel;
        $data->nama_fasilitas_hotel = $request->input('nama_fasilitas_hotel');
        $data->deskripsi_fasilitas_hotel = $request->input('deskripsi_fasilitas_hotel');
        if($request->hasfile('foto_fasilitas_hotel'))
        {
            $file = $request->file('foto_fasilitas_hotel');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/hotel/',$filename);
            $data->foto_fasilitas_hotel = $filename;
        }
        $data->save();
        return redirect()->route('fasilitas.index')->with('toast_success', 'Data Berhasil Di Tambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasHotel $fasilita)
    {

        

        if($fasilita->foto_fasilitas_hotel){
            $file = 'assets/hotel/'.$fasilita->foto_fasilitas_hotel;

            if (file_exists($file)){
                $fasilita->foto_fasilitas_hotel = url($file);

            }else {
                $fasilita->foto_fasilitas_hotel = url('assets/hotel/image.png');
            }  

            }else {
                $fasilita->foto_fasilitas_hotel = url('assets/hotel/image.png');
            }

            return view('pages.fasilitas_hotel.show',['item'=>$fasilita]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilita)
    {
        return view('pages.fasilitas_hotel.edit',['item'=>$fasilita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_fasilitas_hotel' => 'required',
            'foto_fasilitas_hotel' => 'nullable|image|mimes:png,jpg,jpeg|between:100,20042',
            'deskripsi_fasilitas_hotel' => 'nullable',
        ]);


        $data = FasilitasHotel::find($id);
        $data->nama_fasilitas_hotel = $request->input('nama_fasilitas_hotel');
        $data->deskripsi_fasilitas_hotel = $request->input('deskripsi_fasilitas_hotel');
        if($request->hasfile('foto_fasilitas_hotel'))
        {
            $destination = 'assets/hotel/'.$data->foto_fasilitas_hotel;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('foto_fasilitas_hotel');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/hotel/',$filename);
            $data->foto_fasilitas_hotel = $filename;
        }
        $data->update();
        return redirect()->route('fasilitas.index')->with('toast_success', 'Data Berhasil Di Update!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = FasilitasHotel::find($id);

        $destination = 'assets/hotel/'.$data->foto_fasilitas_hotel;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect()->route('fasilitas.index')->with('toast_success', 'Data Berhasil Di Hapus!');
    }
}
