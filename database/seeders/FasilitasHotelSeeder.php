<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasHotel;

class FasilitasHotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Ombak Buatan',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur fugiat, doloribus laboriosam doloremque magni sint. Unde obcaecati, voluptas dolore temporibus iste voluptate sunt vel repudiandae esse eveniet aut odio explicabo omnis tempore quisquam, iusto suscipit, impedit accusantium? Accusantium, eligendi porro?',
        ]);

        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Kolam Renang',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur fugiat, doloribus laboriosam doloremque magni sint. Unde obcaecati, voluptas dolore temporibus iste voluptate sunt vel repudiandae esse eveniet aut odio explicabo omnis tempore quisquam, iusto suscipit, impedit accusantium? Accusantium, eligendi porro?',
        ]);

        FasilitasHotel::create([
            'nama_fasilitas_hotel'=>'Restaurant',
            'foto_fasilitas_hotel'=>null,
            'deskripsi_fasilitas_hotel' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequatur fugiat, doloribus laboriosam doloremque magni sint. Unde obcaecati, voluptas dolore temporibus iste voluptate sunt vel repudiandae esse eveniet aut odio explicabo omnis tempore quisquam, iusto suscipit, impedit accusantium? Accusantium, eligendi porro?',
        ]);
    }
}
