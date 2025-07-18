<section id="keanggotaan" class="page-section py-20 bg-white">
    <div class="container mx-auto px-6">

        {{-- Pastikan variabel $keanggotaan tidak kosong --}}
        @if($keanggotaan)
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $keanggotaan->title }}</h2>
                <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">{{ $keanggotaan->subtitle }}</p>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>

            <div class="flex flex-col lg:flex-row gap-10 items-start">
                {{-- Keuntungan --}}
                <div class="lg:w-1/2">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Keuntungan Eksklusif untuk Anda</h3>
                    <div class="space-y-6">
                        {{-- Loop melalui data benefits --}}
                        @foreach($keanggotaan->benefits as $benefit)
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0">
                                    <i data-feather="check-circle" class="text-blue-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg">{{ $benefit['title'] }}</h4>
                                    <p class="text-gray-600">{{ $benefit['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Syarat Pendaftaran --}}
                <div class="lg:w-1/2 bg-gray-50 p-8 rounded-lg shadow-lg">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Syarat Pendaftaran</h3>
                    <ul class="space-y-3 list-decimal list-inside text-gray-700">
                         {{-- Loop melalui data requirements --}}
                        @foreach($keanggotaan->requirements as $requirement)
                            <li>{{ $requirement['requirement'] }}</li>
                        @endforeach
                    </ul>
                    <a href="#kontak" class="page-link mt-8 w-full block text-center bg-blue-600 text-white font-bold px-8 py-4 rounded-lg hover:bg-blue-700 transition-colors">
                        Daftar Sekarang!
                    </a>
                </div>
            </div>
        @else
            {{-- Pesan jika data tidak ditemukan --}}
            <p class="text-center text-gray-500">Konten Keanggotaan belum diatur.</p>
        @endif
    </div>
</section>