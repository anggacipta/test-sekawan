<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Atasan',
            'username' => 'atasan',
            'email' => 'atasan@example.com',
            'password' => bcrypt('password'), // 'password
            'role' => 'atasan',
        ]);

        User::factory()->create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // 'password
            'role' => 'admin',
        ]);
    }
}
