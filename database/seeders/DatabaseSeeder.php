<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Penjamin;
use App\Models\Mahasiswa;
use App\Models\BiroKemahasiswaan;
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

        Mahasiswa::create([
            'nim' => '2081031',
            'password' => bcrypt('johansen123'),
            'nama' => 'Johansen Sagala',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081323456789',
            'nomor_ortu_wali' => '081234567886',
        ]);

        Mahasiswa::create([
            'nim' => '2081032',
            'password' => bcrypt('jonatan123'),
            'nama' => 'Jonatan Situmorang',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081334656789',
            'nomor_ortu_wali' => '081234346686',
        ]);

        Mahasiswa::create([
            'nim' => '2081033',
            'password' => bcrypt('irpan123'),
            'nama' => 'Irpan Buri Siburian',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '085267345679',
            'nomor_ortu_wali' => '081234569886',
        ]);

        Mahasiswa::create([
            'nim' => '2081034',
            'password' => bcrypt('eli123'),
            'nama' => 'Eli Feri Josua Simatupang',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081323235789',
            'nomor_ortu_wali' => '081231234886',
        ]);

        Mahasiswa::create([
            'nim' => '2081035',
            'password' => bcrypt('iman123'),
            'nama' => 'Iman Saputra Zendato',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081322343789',
            'nomor_ortu_wali' => '081673545678',
        ]);

        Mahasiswa::create([
            'nim' => '2081036',
            'password' => bcrypt('krismes123'),
            'nama' => 'Krismes Situmeang',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081323456088',
            'nomor_ortu_wali' => '08117567886',
        ]);

        Mahasiswa::create([
            'nim' => '2081037',
            'password' => bcrypt('perianto123'),
            'nama' => 'Perianto Sinaga',
            'semester' => '7',
            'status' => 0,
            'nomor_pribadi' => '081323456689',
            'nomor_ortu_wali' => '081237457886',
        ]);

        BiroKemahasiswaan::create([
            'username' => 'yunus-elon',
            'password' => bcrypt('yunusdiperutikan'),
            'nama' => 'Yunus Elon',
            'role' => 1,
        ]);
    }
}
