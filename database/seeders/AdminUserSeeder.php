<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Donny Hidayat',
            'email' => 'donnyhidayat@gmail.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang lebih kuat
            'role' => 'admin',
        ]);
        
        User::create([
            'name' => 'Raihan',
            'email' => 'raihan@gmail.com',
            'password' => Hash::make('password123'), // Ganti dengan password yang lebih kuat
            'role' => 'admin',
        ]);
    }
}