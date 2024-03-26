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
            'username' => 'atasan2',
            'email' => 'atasan2@example.com',
            'password' => bcrypt('password'), // 'password
            'role' => 'atasan',
        ]);

        User::factory()->create([
            'nama' => 'Admin',
            'username' => 'admin2',
            'email' => 'admin2@example.com',
            'password' => bcrypt('password'), // 'password
            'role' => 'admin',
        ]);
    }
}
