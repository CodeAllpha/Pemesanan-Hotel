<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'nama_kamar',
        'type_kamar',
        'type_kasur',
        'panjang_kasur',
        'lebar_kasur',
        'luas_kamar',
        'foto_kamar',
        'jumlah_kamar',
        'harga_kamar',
        'deskripsi_kamar',
    ];

    public function Pemesanan(){
        return $this->hasMany(Pemesanan::class);
    }

}
