<?php

namespace Database\Seeders;

use App\Models\Penjamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjaminFactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Penjamin::factory(300)->create();
    }
}
