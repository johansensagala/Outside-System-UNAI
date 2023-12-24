<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Semester;
use Carbon\Carbon;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::create(2023, 8, 21);

        Semester::create([
            'aksi' => 'mulai absensi',
            'id_biro_kemahasiswaan' => 1,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
    }
}
