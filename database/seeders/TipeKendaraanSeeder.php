<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\TipeKendaraan;

class TipeKendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $data = ['Motor', 'Mobil', 'Bus'];

    foreach ($data as $item) {
        TipeKendaraan::firstOrCreate([
            'tipe_kendaraan' => $item
        ]);
    }
}
}
