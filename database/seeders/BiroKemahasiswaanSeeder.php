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
    }
}
