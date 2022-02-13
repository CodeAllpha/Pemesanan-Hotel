<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kamar $kamar)
    {
        
        $data = FasilitasKamar::where('kamar_id',$kamar->id)->get();
        return view('pages.fasilitas_kamar.index',['data'=>$data,'kamar'=>$kamar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Kamar $kamar)
    {
       
        return view('pages.fasilitas_kamar.create',['kamar'=>$kamar]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,Kamar $kamar)
    {
        $request->validate([
            'nama_fasilitas_kamar' => 'required'
        ]);

        FasilitasKamar::create([
            'kamar_id'=>$kamar->id,
            'nama_fasilitas_kamar'=>$request->nama_fasilitas_kamar
        ]);

        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('toast_success', 'Data Berhasil Di Tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar, FasilitasKamar $fasilita)
    {
        return view('pages.fasilitas_kamar.edit',['kamar'=>$kamar,'data'=>$fasilita]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kamar $kamar,FasilitasKamar $fasilita)
    {
        $request->validate([
            'nama_fasilitas_kamar' => 'required'
        ]);

        $fasilita->update([
            'nama_fasilitas_kamar'=>$request->nama_fasilitas_kamar,
        ]);

        $fasilita->update();
        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('toast_success', 'Data Berhasil Di Update!');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kamar $kamar,FasilitasKamar $fasilita)
    {
        $fasilita->delete();
        return redirect()->route('kamar.fasilitas.index',['kamar'=>$kamar->id])->with('toast_success', 'Data Berhasil Di Hapus!');
    }
}
