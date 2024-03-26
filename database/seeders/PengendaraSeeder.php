<?php

namespace Database\Seeders;

use App\Models\Pengendara;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PengendaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pengendara::create([
            'nama' => 'Budi',
            'ttl' => 'Jakarta, 1 Januari 1990',
            'alamat' => 'Jl. Jalan No. 1',
        ]);

        Pengendara::create([
            'nama' => 'Haris',
            'ttl' => 'Surabaya, 1 Januari 1990',
            'alamat' => 'Jl. Siang No. 1',
        ]);
    }
}
