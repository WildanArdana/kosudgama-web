<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Penting untuk ditambahkan

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Mencari user berdasarkan email, dan hanya membuatnya jika tidak ada.
        User::firstOrCreate(
            ['email' => 'admin@kosudgama.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('password'), // Menggunakan Hash::make() untuk keamanan
            ]
        );

        $this->call([
            SettingSeeder::class,
            TentangSeeder::class,
        ]);
    }
}