<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Keanggotaan;

class KeanggotaanSeeder extends Seeder
{
    public function run(): void
    {
        Keanggotaan::create([
            'title' => 'Bergabung Menjadi Anggota',
            'subtitle' => 'Nikmati berbagai fasilitas dan keuntungan eksklusif dengan menjadi bagian dari keluarga besar Koperasi Kosudgama.',
            'benefits' => [
                ['title' => 'Sisa Hasil Usaha (SHU) Tahunan', 'description' => 'Dapatkan pembagian keuntungan koperasi setiap akhir tahun buku.'],
                ['title' => 'Harga Khusus Anggota', 'description' => 'Nikmati harga dan tarif spesial di semua unit usaha kami.'],
                ['title' => 'Hak Suara dalam Rapat', 'description' => 'Berperan aktif dalam pengambilan keputusan pada Rapat Anggota Tahunan.'],
                ['title' => 'Program Edukasi & Pemberdayaan', 'description' => 'Ikut serta dalam program pelatihan untuk meningkatkan wawasan ekonomi.'],
            ],
            'requirements' => [
                ['requirement' => 'Mengisi Formulir Pendaftaran Anggota.'],
                ['requirement' => 'Menyerahkan fotokopi KTP yang masih berlaku.'],
                ['requirement' => 'Membayar Simpanan Pokok (sekali saat mendaftar).'],
                ['requirement' => 'Membayar Simpanan Wajib secara rutin setiap bulan.'],
                ['requirement' => 'Menyerahkan Pas Foto ukuran 3x4 (2 lembar).'],
            ],
        ]);
    }
}