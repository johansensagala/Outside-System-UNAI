<?php

namespace Database\Factories;

use App\Models\Mahasiswa;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Mahasiswa::class;

    public function definition()
    {
        $nama = $this->faker->unique()->name();
        $namaDepan = explode(' ', $nama)[0];
        $namaBelakang = explode(' ', $nama)[1];

        return [
            'nama' => $namaDepan . ' ' . $namaBelakang,
            'password' => bcrypt(Str::lower($namaDepan) . '123'),
            'nim' => substr($this->generateNIM(), 0, 7),
            'jurusan' => $this->faker->randomElement(['Akuntansi', 'Bisnis Digital', 'Farmasi', 'Ilmu Filsafat', 'Ilmu Keperawatan', 'Manajemen', 'Pendidikan Bahasa Inggris', 'Pendidikan Matematika', 'Sistem Informasi', 'Teknik Informatika']),
            'jenis_kelamin' => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'angkatan' => $this->faker->randomElement(['2020', '2021', '2022', '2023']),
            'nomor_pribadi' => $this->generateNomorTelepon(),
            'nomor_ortu_wali' => $this->generateNomorTelepon(),
        ];
    }

    protected function generateNIM()
    {
        $prefixes = ['20810', '21810', '22810', '23810',
                    '20820', '21820', '22820', '23820',
                    '20110', '21110', '22110', '23110',
                    '20210', '21210', '22210', '23210',
                    '20220', '21220', '22220', '23220',
                    '20220', '21220', '22220', '23220',
                    '20310', '21310', '22310', '23310',
                    '20320', '21320', '22320', '23320',
                    '20320', '21320', '22320', '23320',
                    '20410', '21410', '22410', '23410',
                    '20510', '21510', '22510', '23510',
                    '20520', '21520', '22520', '23520',
                ];

        $selectedPrefix = $this->faker->randomElement($prefixes);

        return $selectedPrefix . $this->faker->numberBetween(01, 99);
    }

    protected function generateNomorTelepon()
    {
        $prefixes = ['0859', '0877', '0878', '0817', '0818', '0819', '0811', '0812', '0813', '0821', '0822', '0823', '0852', '0853', '0851', '0898', '0899', '0895', '0896', '0897', '0832', '0833', '0838', '0831'];
        $selectedPrefix = $this->faker->randomElement($prefixes);

        return $selectedPrefix . $this->faker->numerify('########');
    }
}
