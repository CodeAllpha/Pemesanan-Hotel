<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kamar;

class ReservasiController extends Controller
{
    public function index()
    {
        $kamar = Kamar::select('id as value','nama_kamar as option')->get();

        $kamar->map(function($data){
            $data->option = ucwords($data->option);
            return $data;
        });

        return view('pages.user.reservasi',['kamar'=>$kamar]);
    }

  
}
