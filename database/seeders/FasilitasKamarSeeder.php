<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FasilitasKamar;

class FasilitasKamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FasilitasKamar::create([
            'kamar_id'=>1,
            'nama_fasilitas_kamar'=> 'TV',
        ]);

        FasilitasKamar::create([
            'kamar_id'=>1,
            'nama_fasilitas_kamar'=> 'AC',
        ]);
    }
}
