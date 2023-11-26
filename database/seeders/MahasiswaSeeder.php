<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::create([
            'nim' => '2081031',
            'password' => bcrypt('johansen123'),
            'nama' => 'Johansen Sagala',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081323456789',
            'nomor_ortu_wali' => '081234567886',
        ]);
        
        Mahasiswa::create([
            'nim' => '2081032',
            'password' => bcrypt('jonatan123'),
            'nama' => 'Jonatan Situmorang',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081334656789',
            'nomor_ortu_wali' => '081234346686',
        ]);

        Mahasiswa::create([
            'nim' => '2081033',
            'password' => bcrypt('irpan123'),
            'nama' => 'Irpan Buri Siburian',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '085267345679',
            'nomor_ortu_wali' => '081234569886',
        ]);

        Mahasiswa::create([
            'nim' => '2081034',
            'password' => bcrypt('eli123'),
            'nama' => 'Eli Feri Josua Simatupang',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081323235789',
            'nomor_ortu_wali' => '081231234886',
        ]);

        Mahasiswa::create([
            'nim' => '2081035',
            'password' => bcrypt('iman123'),
            'nama' => 'Iman Saputra Zendato',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081322343789',
            'nomor_ortu_wali' => '081673545678',
        ]);

        Mahasiswa::create([
            'nim' => '2081036',
            'password' => bcrypt('krismes123'),
            'nama' => 'Krismes Situmeang',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081323456088',
            'nomor_ortu_wali' => '08117567886',
        ]);

        Mahasiswa::create([
            'nim' => '2081037',
            'password' => bcrypt('perianto123'),
            'nama' => 'Perianto Sinaga',
            'jurusan' => 'Teknik Informatika',
            'jenis_kelamin' => 'Laki-laki',
            'angkatan' => '2020',
            'nomor_pribadi' => '081323456689',
            'nomor_ortu_wali' => '081237457886',
        ]);
    }
}
