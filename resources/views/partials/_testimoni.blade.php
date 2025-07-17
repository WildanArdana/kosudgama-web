<section id="testimoni" class="page-section bg-gray-50 py-20">
    <div class="container mx-auto px-6">
        {{-- Mengubah grid utama menjadi 1 kolom di mobile dan 2 di desktop --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div>
                <div class="mb-8 text-center lg:text-left">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Apa Kata Anggota Kami</h2>
                    <p class="text-lg text-gray-600 mt-2">Kepuasan dan kepercayaan anggota adalah prioritas utama dan bukti keberhasilan kami.</p>
                </div>
                
                <div class="relative">
                    <div class="swiper-container testimoni-slider overflow-hidden py-2">
                        <div class="swiper-wrapper">
                            @forelse($testimonis as $testimoni)
                            <div class="swiper-slide px-2 pb-2">
                                <div class="bg-white p-8 rounded-lg shadow-lg h-full flex flex-col justify-between">
                                    <p class="text-gray-600 italic mb-6">"{{ $testimoni->kutipan }}"</p>
                                    <div class="flex items-center mt-auto">
                                        <img src="{{ Illuminate\Support\Facades\Storage::url($testimoni->foto) }}" alt="Foto {{ $testimoni->nama_anggota }}" class="w-14 h-14 rounded-full mr-4 object-cover">
                                        <div>
                                            <h4 class="font-bold text-lg">{{ $testimoni->nama_anggota }}</h4>
                                            <p class="text-gray-500">{{ $testimoni->keterangan_anggota }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="swiper-slide">
                                <div class="bg-white p-8 rounded-lg shadow-md text-center text-gray-500">
                                    Belum ada testimoni.
                                </div>
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination testimoni-pagination text-center mt-4 relative"></div>
            </div>

            <div class="grid grid-cols-2 gap-8 mt-12 lg:mt-0">
                @forelse($statistiks as $statistik)
                <div class="bg-white p-8 rounded-xl shadow-lg text-center">
                    <div class="bg-blue-100 text-blue-600 rounded-full w-16 h-16 flex items-center justify-center mb-4 mx-auto p-3">
                        <img src="{{ Illuminate\Support\Facades\Storage::url($statistik->icon) }}" alt="{{ $statistik->label }}" class="w-full h-full object-contain">
                    </div>
                    <h3 class="text-3xl lg:text-4xl font-extrabold">{{ $statistik->angka }}</h3>
                    <p class="text-gray-500 mt-1">{{ $statistik->label }}</p>
                </div>
                @empty
                 <p class="col-span-2 text-center text-gray-500">Data statistik belum tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</section>