<?php

namespace Database\Seeders;

use App\Models\Tentang; // WAJIB ADA: untuk mengimpor class Tentang
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tentang::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Tentang Kami',
                'subtitle' => 'Dari, Oleh, dan Untuk Anggota',
                'description' => 'Didirikan atas asas kekeluargaan, Koperasi Kosudgama Daya Gemilang berkomitmen untuk menyejahterakan anggota melalui layanan yang prima dan produk yang berdaya saing. Kami adalah mitra terpercaya Anda untuk bertumbuh bersama.',
                'vision' => 'Menjadi koperasi konsumen yang mandiri, modern, dan terpercaya pilihan anggota serta masyarakat.',
                'mission' => 'Menyediakan produk dan layanan berkualitas dengan harga bersaing. Meningkatkan kesejahteraan anggota melalui pembagian Sisa Hasil Usaha (SHU) yang adil.',
            ]
        );
    }
}