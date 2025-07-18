<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'password' => Hash::make('password'),
            ]
        );

        // Memanggil semua seeder yang dibutuhkan oleh aplikasi
        $this->call([
            SettingSeeder::class,
            TentangSeeder::class,
            KeanggotaanSeeder::class, // <-- BARIS INI DITAMBAHKAN
        ]);
    }
}