<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

use App\Models\PengajuanLuarAsrama;

class PengajuanLuarAsramaTanpaPenjaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $statuses_tinggal = ['Married', 'Profesi Ners', 'Skripsi'];
        $statuses = ['pending', 'ditolak', 'disetujui'];
        $foto = ['foto1.avif', 'foto2.avif', 'foto3.avif', 'foto4.avif'];

        for ($i = 1001; $i <= 1400; $i++) {
            $status_tinggal = $statuses_tinggal[array_rand($statuses_tinggal)];
            $surat_outside = 'surat_outside/surat_permohonan_tinggal_di_asrama.pdf';
            $tahun_ajaran = '2023/2024';
            $foto_tempat_tinggal = 'pengajuan_data_tempat_tinggal/' . $foto[array_rand($foto)];
            $surat_kebenaran = 'surat_kebenaran/surat_kebenaran.pdf';
            $status = $statuses[array_rand($statuses)];
            $latitude = -6.80 + ($i * 0.0001);
            $longitude = 107.57 + ($i * 0.0001);
            $id_biro_kemahasiswaan = rand(1, 5);

            $comment = ($status == 'ditolak') ? $faker->randomElement(['Mahasiswa bermasalah', 'Mahasiswa sudah ditolak', 'Mahasiswa tidak layak tinggal outside']) : null;

            PengajuanLuarAsrama::create([
                'status_tinggal' => $status_tinggal,
                'surat_outside' => $surat_outside,
                'tahun_ajaran' => $tahun_ajaran,
                'foto_tempat_tinggal' => $foto_tempat_tinggal,
                'surat_kebenaran' => $surat_kebenaran,
                'id_mahasiswa' => $i,
                'status' => $status,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'alamat' => $faker->address,
                'id_biro_kemahasiswaan' => $status == 'pending' ? null : $id_biro_kemahasiswaan,
                'comment' => $comment,
            ]);
        }

        // ISI KEKOSONGAN ID (DIJALANKAN SESUDAH SEED)

        // CREATE TEMPORARY TABLE temp_table
        //     SELECT @row := @row + 1 AS new_id, id as old_id
        //     FROM pengajuan_luar_asramas
        //     CROSS JOIN (SELECT @row := 0) AS init
        //     ORDER BY id;

        // UPDATE pengajuan_luar_asramas
        // JOIN temp_table ON pengajuan_luar_asramas.id = temp_table.old_id
        // SET pengajuan_luar_asramas.id = temp_table.new_id;

        // DROP TEMPORARY TABLE IF EXISTS temp_table;
    }
}
