<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'nama_kamar'=>$this->faker->word(),
            'kapasitas'=>rand(2,8),
            'tipe_kasur'=>$this->faker->word(),
            'panjang_kasur'=>rand(10,20),
            'lebar_kasur'=>rand(10,20),
            'luas_kamar'=>rand(25,45),
            'jumlah_kamar'=>10,
            'kamar_kosong' =>10,
            'harga_kamar'=>$this->faker->numberBetween(500000,700000),
            'deskripsi_kamar'=>$this->faker->paragraph(),
        ];
    }
}
