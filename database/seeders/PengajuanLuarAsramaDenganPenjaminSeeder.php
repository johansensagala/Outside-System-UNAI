<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PengajuanLuarAsrama;

class PengajuanLuarAsramaDenganPenjaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses_tinggal = ['Orang Tua', 'Saudara', 'Dosen'];
        $status_penjamin = ['pending', 'disetujui', 'ditolak'];
        $statuses = ['pending', 'ditolak', 'disetujui'];
        $foto = ['foto1.avif', 'foto2.avif', 'foto3.avif', 'foto4.avif'];

        for ($i = 1; $i <= 1000; $i++) {
            $status_tinggal = $statuses_tinggal[array_rand($statuses_tinggal)];
            $surat_outside = 'surat_outside/surat_permohonan_tinggal_di_asrama.pdf';
            $tahun_ajaran = '2023/2024';
            $status_penjamin_random = $status_penjamin[array_rand($status_penjamin)];
            $foto_tempat_tinggal = 'pengajuan_data_tempat_tinggal/' . $foto[array_rand($foto)];
            $surat_kebenaran = 'surat_kebenaran/surat_kebenaran.pdf';
            $id_penjamin = null;
            $status = 'pending';
            $id_biro_kemahasiswaan = rand(1, 5);

            if ($status_penjamin_random == 'disetujui') {
                $id_penjamin = rand(1, 400);
                $status = $statuses[array_rand($statuses)];
            }

            PengajuanLuarAsrama::create([
                'status_tinggal' => $status_tinggal,
                'surat_outside' => $surat_outside,
                'tahun_ajaran' => $tahun_ajaran,
                'status_penjamin' => $status_penjamin_random,
                'foto_tempat_tinggal' => $foto_tempat_tinggal,
                'surat_kebenaran' => $surat_kebenaran,
                'id_penjamin' => $id_penjamin,
                'id_mahasiswa' => $i,
                'status' => $status,
                'id_biro_kemahasiswaan' => $status_penjamin_random == 'pending' ? null : $id_biro_kemahasiswaan,
            ]);

            // SETELAH SEED, JALANKAN QUERY INI DI SQL
            
            // DELETE FROM pengajuan_luar_asramas
            // WHERE id_penjamin IS NOT NULL
            // AND status = 'disetujui'
            // AND id_penjamin NOT IN (SELECT id_penjamin FROM pengajuan_data_penjamins WHERE status = 'disetujui');
        }
    }
}
