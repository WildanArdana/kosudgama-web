<?php

namespace Database\Seeders;

use App\Models\Tentang;
use Illuminate\Database\Seeder;

class TentangSeeder extends Seeder
{
    /**
     * Menjalankan proses seeding database.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate untuk memperbarui data yang ada atau membuat baru jika belum ada.
        Tentang::updateOrCreate(
            ['id' => 1], // Kunci untuk mencari data yang ada
            [
                'title' => 'Tentang Kami',
                'subtitle' => 'Dari, Oleh, dan Untuk Anggota',
                'description' => 'Didirikan atas asas kekeluargaan, Koperasi Kosudgama Daya Gemilang berkomitmen untuk menyejahterakan anggota melalui layanan yang prima dan produk yang berdaya saing. Kami adalah mitra terpercaya Anda untuk bertumbuh bersama.',
                'vision' => 'Menjadi koperasi konsumen yang mandiri, modern, dan terpercaya pilihan anggota serta masyarakat.',
                
                // ✅ PERBAIKAN: Format misi dengan baris baru (\n)
                'mission' => "1. Menyediakan pelayanan prima kepada para anggota dan mitra usaha.\n2. Meningkatkan partisipasi anggota.\n3. Mengembangkan wawasan berkoperasi anggota.",
                
                // ✅ PERBAIKAN: Menambahkan data untuk 'tujuan'
                'tujuan' => "1. Meningkatkan kesejahteraan anggota.\n2. Mendorong pertumbuhan ekonomi anggota.\n3. Menjadi soko guru perekonomian.",
            ]
        );
    }
}