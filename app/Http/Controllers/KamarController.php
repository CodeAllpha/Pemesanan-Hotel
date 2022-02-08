<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use Illuminate\Support\Facades\File;


class KamarController extends Controller
{

    function __construct()
    {
        $this->middleware('can:role,"admin"',[
            'except'=>['index','show']
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

        $data = Kamar::select('id','nama_kamar','jumlah_kamar','harga_kamar','foto_kamar')
                    ->when($search,function($query,$search){
                        return $query->where('nama_kamar','like',"%{$search}%")
                                    ->orWhere('harga_kamar','like',"%{$search}%");
                    })
                    ->paginate(10);

        return view('pages.kamar.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kamar.create');
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

            'nama_kamar' => 'required',
            'foto_kamar' => 'required|image|mimes:png,jpg,jpeg|between:100,20042',
            'jumlah_kamar' => 'required',
            'harga_kamar' => 'required',
            'deskripsi_kamar' => 'required|min:3'
        ]);


        $data = new Kamar;
        $data->nama_kamar = $request->input('nama_kamar');
        $data->harga_kamar = $request->input('harga_kamar');
        $data->jumlah_kamar = $request->input('jumlah_kamar');
        $data->deskripsi_kamar = $request->input('deskripsi_kamar');
        if($request->hasfile('foto_kamar'))
        {
            $file = $request->file('foto_kamar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/kamar/',$filename);
            $data->foto_kamar = $filename;
        }
        $data->save();
        return redirect()->route('kamar.index');

        // $ext = $request->foto_kamar->getClientOriginalExtension();
        // $filename = rand(9,999).'_'.time().'.'.$ext;
        // $request->foto_kamar->move('images/kamar/',$filename);

        // Kamar::create([
        //     'nama_kamar' => $request->nama_kamar,
        //     'foto_kamar' => $request->$filename,
        //     'jumlah_kamar' => $request->jumlah_kamar,
        //     'harga_kamar' => $request->harga_kamar,
        //     'deskripsi_kamar' => $request->deskripsi_kamar
        // ]);

        


       

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Kamar $kamar)
    {
        $fasilitas = FasilitasKamar::where('kamar_id',$kamar->id)->get();

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

            return view('pages.kamar.show',['item'=>$kamar,'fasilitas'=>$fasilitas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Kamar $kamar)
    {
       return view('pages.kamar.edit',['item'=>$kamar]);
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
            'nama_kamar' => 'required',
            'foto_kamar' => 'nullable|image|mimes:png,jpg,jpeg|between:100,20042',
            'jumlah_kamar' => 'required',
            'harga_kamar' => 'required',
            'deskripsi_kamar' => 'required|min:3'
        ]);


        $data = Kamar::find($id);
        $data->nama_kamar = $request->input('nama_kamar');
        $data->harga_kamar = $request->input('harga_kamar');
        $data->jumlah_kamar = $request->input('jumlah_kamar');
        $data->deskripsi_kamar = $request->input('deskripsi_kamar');
        if($request->hasfile('foto_kamar'))
        {
            $destination = 'assets/kamar/'.$data->foto_kamar;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file = $request->file('foto_kamar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('assets/kamar/',$filename);
            $data->foto_kamar = $filename;
        }
        $data->update();
        return redirect()->route('kamar.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kamar::find($id);

        $destination = 'assets/kamar/'.$data->foto_kamar;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $data->delete();
        return redirect()->route('kamar.index');
    }
}
