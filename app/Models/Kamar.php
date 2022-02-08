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
        'foto_kamar',
        'jumlah_kamar',
        'harga_kamar',
        'deskripsi_kamar',
    ];

}
