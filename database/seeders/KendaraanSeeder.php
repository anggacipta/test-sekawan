<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kendaraan::create([
            'nama_kendaraan' => 'Toyota Calya',
            'plat_nomor' => 'B 1234 ABC',
            'konsumsi_bbm' => 'Rp10000/km',
            'jadwal_service' => '28 September 2024',
            'riwayat_pemakaian' => '2 tahun'
        ]);

        Kendaraan::create([
            'nama_kendaraan' => 'Toyota Hilux',
            'plat_nomor' => 'B 1234 ABD',
            'konsumsi_bbm' => 'Rp12000/km',
            'jadwal_service' => '30 September 2024',
            'riwayat_pemakaian' => '2 tahun'
        ]);
    }
}
