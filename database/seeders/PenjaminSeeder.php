<?php

namespace Database\Seeders;

use App\Models\Penjamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjamin::create([
            'username' => 'susi-susanti',
            'password' => bcrypt('susi1234'),
            'nama' => 'Susi Susanti',
            'role' => 'dosen',
            'nomor_telp' => '085371655509',
        ]);

        Penjamin::create([
            'username' => 'riama-aritonang',
            'password' => bcrypt('riama123'),
            'nama' => 'Riama Aritonang',
            'role' => 'dosen',
            'nomor_telp' => '085398255509',
        ]);

        Penjamin::create([
            'username' => 'fernando-sinaga',
            'password' => bcrypt('fernando123'),
            'nama' => 'Fernando Sinaga',
            'role' => 'dosen',
            'nomor_telp' => '085371659776',
        ]);
    }
}
