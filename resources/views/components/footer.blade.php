<footer class="bg-gray-900 text-white">
    <div class="container mx-auto px-6 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div>
                {{-- **(DIUBAH)** Mengganti gambar dengan teks --}}
                <h3 class="text-2xl font-bold mb-4">KOSUDGAMA</h3>
                <p class="text-gray-400">Koperasi Kosudgama Daya Gemilang.</p>
            </div>
            <div><h4 class="font-semibold text-lg mb-4">Tautan Cepat</h4><ul class="space-y-2"><li><a href="#layanan" class="page-link text-gray-400 hover:text-white">Layanan</a></li><li><a href="#keanggotaan" class="page-link text-gray-400 hover:text-white">Keanggotaan</a></li><li><a href="#tentang" class="page-link text-gray-400 hover:text-white">Tentang</a></li><li><a href="#kontak" class="page-link text-gray-400 hover:text-white">Kontak</a></li></ul></div>
            <div><h4 class="font-semibold text-lg mb-4">Layanan Kami</h4><ul class="space-y-2"><li class="text-gray-400">Simpan Pinjam</li><li class="text-gray-400">Swalayan</li><li class="text-gray-400">Jasa</li><li class="text-gray-400">Apotek</li></ul></div>
            <div>
                <h4 class="font-semibold text-lg mb-4">Ikuti Kami</h4>
                <div class="flex space-x-4">
                    <a href="{{ $settings['social_facebook'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white"><i data-feather="facebook"></i></a>
                    <a href="{{ $settings['social_twitter'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white"><i data-feather="twitter"></i></a>
                    <a href="{{ $settings['social_instagram'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white"><i data-feather="instagram"></i></a>
                    <a href="{{ $settings['social_youtube'] ?? '#' }}" target="_blank" rel="noopener noreferrer" class="text-gray-400 hover:text-white"><i data-feather="youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="mt-12 border-t border-gray-800 pt-8 text-center text-gray-500"><p>&copy; {{ date('Y') }} Hak Cipta Dilindungi. Koperasi Kosudgama Daya Gemilang.</p></div>
    </div>
</footer>