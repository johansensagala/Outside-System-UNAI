<?php

namespace Database\Seeders;
use App\Models\BiroKemahasiswaan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BiroKemahasiswaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BiroKemahasiswaan::create([
            'username' => 'yunus-elon',
            'password' => bcrypt('yunus123'),
            'nama' => 'Yunus Elon',
        ]);
        
        BiroKemahasiswaan::create([
            'username' => 'taka-subrata',
            'password' => bcrypt('taka123'),
            'nama' => 'Taka Subrata',
        ]);

        BiroKemahasiswaan::create([
            'username' => 'hendra-sastrawijaya',
            'password' => bcrypt('hendra123'),
            'nama' => 'Yunus Elon',
        ]);

        BiroKemahasiswaan::create([
            'username' => 'saschya',
            'password' => bcrypt('saschya123'),
            'nama' => 'Yunus Elon',
        ]);

        BiroKemahasiswaan::create([
            'username' => 'gusti',
            'password' => bcrypt('gusti123'),
            'nama' => 'Yunus Elon',
        ]);
    }
}
