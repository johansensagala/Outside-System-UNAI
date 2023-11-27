<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $total_records = 100;

        for ($i = 1; $i <= $total_records; $i++) {
            $latitude = -6.80 + rand(0, 9999) / 10000;
            $longitude = 107.57 + rand(0, 9999) / 10000;

            $attendance_status = $this->generateAttendanceStatus();

            DB::table('absensis')->insert([
                'latitude' => $latitude,
                'longitude' => $longitude,
                'kehadiran' => $attendance_status,
            ]);
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
