<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'Administrator',
            'username' => 'admin',
            'level' => 'admin',
            'password' => bcrypt('admin'),
        ]);

        Admin::create([
            'name' => 'Resepsionis',
            'username' => 'resepsionis',
            'level' => 'resepsionis',
            'password' => bcrypt('resepsionis'),
        ]);

        Admin::create([
           
            'name' => 'Allpha',
            'username' => 'allpha',
            'level' => 'resepsionis',
            'password' => bcrypt('allpha')
        ]);
    }
}
