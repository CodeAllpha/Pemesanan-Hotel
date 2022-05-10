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
        $this->middleware('can:level,"admin"',[
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

        $data = Kamar::select('id','nama_kamar','jumlah_kamar','harga_kamar','foto_kamar','kapasitas','kamar_kosong')
                    ->when($search,function($query,$search){
                        return $query->where('nama_kamar','like',"%{$search}%")
                                    ->orWhere('harga_kamar','like',"%{$search}%")
                                    ->orWhere('kapasitas','like',"%{$search}%");
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

            'nama_kamar' => 'required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/|unique:kamars',
            'kapasitas'=> 'required|integer|min:1|max:4',
            'tipe_kasur'=>'required|max:20|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'luas_kamar'=> 'required|integer|min:10|max:300',
            'panjang_kasur'=> 'required|integer|min:30|max:300',
            'lebar_kasur'=>'required|integer|min:30|max:100',
            'foto_kamar' => 'required|image|mimes:png,jpg,jpeg|between:10,20042',
            'jumlah_kamar' => 'required|integer|min:1|max:50',
            'harga_kamar' => 'required|integer|min:500000',
            'deskripsi_kamar' =>'required|string|max:1000',
        ]);


        $data = new Kamar;
        $data->nama_kamar = $request->input('nama_kamar');
        $data->kapasitas = $request->input('kapasitas');
        $data->kamar_kosong = $request->input('jumlah_kamar');
        $data->luas_kamar = $request->input('luas_kamar');
        $data->tipe_kasur = $request->input('tipe_kasur');
        $data->panjang_kasur = $request->input('panjang_kasur');
        $data->lebar_kasur = $request->input('lebar_kasur');
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
        return redirect()->route('kamar.index')->with('toast_success', 'Data Berhasil Di Tambahkan!');

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
    public function update(Request $request,$id)
    {
        $request->validate([
            'nama_kamar' => "required|max:40|regex:/^[a-zA-ZÑñ\s\.]+$/|unique:kamars,nama_kamar,{$id}",
            'kapasitas'=>'required|max:20|min:1|max:4',
            'tipe_kasur'=>'required|max:20|regex:/^[a-zA-ZÑñ\s\.]+$/',
            'luas_kamar'=> 'required|integer|min:10|max:100',
            'panjang_kasur'=> 'required|integer|min:10|max:100',
            'lebar_kasur'=>'required|integer|min:10|max:100',
            'foto_kamar' => 'nullable|image|mimes:png,jpg,jpeg|between:10,20042',
            'jumlah_kamar' => 'required|integer|min:1|max:50',
            'harga_kamar' => 'required|integer|min:50000',
            'deskripsi_kamar' => 'required|string',
        ]);


        $data = Kamar::find($id);
        $data->nama_kamar = $request->input('nama_kamar');
        $data->kapasitas = $request->input('kapasitas');
        $data->luas_kamar = $request->input('luas_kamar');
        $data->tipe_kasur = $request->input('tipe_kasur');
        $data->panjang_kasur = $request->input('panjang_kasur');
        $data->lebar_kasur = $request->input('lebar_kasur');
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

        // if ($kamar->foto_kamar && $request->foto_kamar)
        // {
        //     $file = 'assets/kamar'.$kamar->foto_kamar;
        //     if(file_exists($file)) {
        //         unlink($file);
        //     }
        // }

        // if($request->foto_kamar)
        // {
        //     $room = strtolower($request->nama_kamar);
        //     $ext = $request->foto_kamar->getClientOriginalExtension();
        //     $filename = $room . '-' . rand(100000,9000000) . '-' . time() .'.'.$ext;
        //     $filename = str_replace(" ","_",$filename);
        //     $request->foto_kamar->move('assets/kamar',$filename);

        //     if($request->jumlah_kamar > $kamar->kamar_kosong){
        //         $result = $request->jumlah_kamar - $kamar->kamar_kosong;
        //         $result = $kamar->jum_dipesan + $result;

        //         $arr = [
        //             'nama_kamar' => $nama_kamar,
        //             'foto_kamar' => $filename,
        //             'jumlah_kamar' => $request->jumlah_kamar,
        //             'kamar_kosong'
        //         ]
        //     }
        // }


        return redirect()->route('kamar.index')->with('toast_success', 'Data Berhasil Di Update!');
        
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
        return redirect()->route('kamar.index')->with('toast_success', 'Data Berhasil Di Hapus!');
    }
}
