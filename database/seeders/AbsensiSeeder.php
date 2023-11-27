<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use App\Models\Absensi;
use App\Models\PengajuanLuarAsrama;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $result = DB::select('SELECT DATEDIFF(NOW(), "2023-08-21") AS jumlah_hari')[0];
        $total_records = $result->jumlah_hari;

        $mahasiswa = PengajuanLuarAsrama::where('status', 'disetujui')->get();

        for ($i = 1; $i <= $total_records; $i++) {
            foreach ($mahasiswa as $mhs) {
                $latitude = -6.80 + rand(0, 9999) / 10000;
                $longitude = 107.57 + rand(0, 9999) / 10000;

                $attendance_status = $this->generateAttendanceStatus();

                $date = Carbon::createFromDate(2023, 8, 21)->addDays($i - 1);
                $time = Carbon::createFromTime(21, 0, 0);

                $created_at = $date->copy()->setTimeFrom($time);
                $updated_at = $created_at;

                Absensi::create([
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'kehadiran' => $attendance_status,
                    'id_mahasiswa' => $mhs->id_mahasiswa,
                    'created_at' => $created_at,
                    'updated_at' => $updated_at,
                ]);
            }
        }
    }

    private function generateAttendanceStatus(): string
    {
        $random_number = rand(1, 100);

        if ($random_number <= 80) {
            return 'hadir';
        } elseif ($random_number <= 90) {
            return 'izin';
        } else {
            return 'absen';
        }
    }
}
