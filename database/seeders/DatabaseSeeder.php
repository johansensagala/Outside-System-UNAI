<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Penjamin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Penjamin::create([
            'username' => 'susi-susanti',
            'password' => bcrypt('susi1234'),
            'nama' => 'Susi Susanti',
            'nomor_telp' => '085371655509',
        ]);

        Penjamin::create([
            'username' => 'riama-aritonang',
            'password' => bcrypt('riama123'),
            'nama' => 'Susi Susanti',
            'nomor_telp' => '085398255509',
        ]);

        Penjamin::create([
            'username' => 'fernando-sinaga',
            'password' => bcrypt('fernando123'),
            'nama' => 'Fernando Sinaga',
            'nomor_telp' => '085371659776',
        ]);
    }
}
