<?php

namespace Database\Factories;

use App\Models\Penjamin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjamin>
 */
class PenjaminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Penjamin::class;

    public function definition()
    {
        $nama = $this->faker->unique()->name;
        $namaDepan = explode(' ', $nama)[0];
        $namaIndonesia = $this->faker->name;

        return [
            'nama' => $namaIndonesia,
            'username' => Str::lower(str_replace(' ', '-', $nama)),
            'password' => bcrypt(Str::lower($namaDepan) . '123'),
            'nomor_telp' => $this->generateNomorTelepon(),
        ];
    }

    protected function generateNomorTelepon()
    {
        $prefixes = ['0859', '0877', '0878', '0817', '0818', '0819', '0811', '0812', '0813', '0821', '0822', '0823', '0852', '0853', '0851', '0898', '0899', '0895', '0896', '0897', '0832', '0833', '0838', '0831'];
        $selectedPrefix = $this->faker->randomElement($prefixes);

        return $selectedPrefix . $this->faker->numerify('########');
    }
}
