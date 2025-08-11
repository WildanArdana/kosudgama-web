<section id="keanggotaan" class="page-section py-20 bg-white">
    <div class="container mx-auto px-6">
        @if($keanggotaan)
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900">{{ $keanggotaan->title }}</h2>
                <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">{{ $keanggotaan->subtitle }}</p>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>

            {{-- Kolom Keuntungan dan Syarat --}}
            <div class="flex flex-col lg:flex-row gap-10 items-stretch">

                {{-- Kolom Keuntungan --}}
                <div class="lg:w-1/2 bg-gray-50 p-8 rounded-lg shadow-lg flex flex-col">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Keuntungan Eksklusif</h3>
                    <div class="space-y-6 flex-grow">
                        @foreach($keanggotaan->benefits as $benefit)
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4 flex-shrink-0">
                                    <i data-feather="check-circle" class="text-blue-600 w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-lg">{{ $benefit['title'] }}</h4>
                                    <p class="text-gray-600 text-justify">{{ $benefit['description'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Kolom Syarat Pendaftaran --}}
                <div class="lg:w-1/2 bg-gray-50 p-8 rounded-lg shadow-lg flex flex-col">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Syarat Pendaftaran</h3>
                    <div class="space-y-4 flex-grow">
                        @foreach($keanggotaan->requirements as $requirement)
                            <div class="flex items-start">
                                <div class="bg-blue-100 p-2 rounded-full mr-4 flex-shrink-0">
                                    <i data-feather="file-text" class="text-blue-600 w-5 h-5"></i>
                                </div>
                                <p class="text-gray-600 text-justify">{{ $requirement['requirement'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>

            {{-- ✅ PERBAIKAN: Tombol dipindahkan ke luar dan diletakkan di tengah --}}
            <div class="text-center mt-12">
                <a href="#kontak" class="page-link inline-block bg-blue-600 text-white font-bold px-8 py-4 rounded-lg hover:bg-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-1">
                    Daftar Sekarang!
                </a>
            </div>

        @endif
    </div>
</section>