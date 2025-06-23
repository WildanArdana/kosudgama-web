<section id="tentang" class="page-section">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
             <div class="lg:w-1/2">
                <div class="h-[450px] rounded-lg shadow-xl overflow-hidden">
                   <div class="swiper-container tentang-slider h-full">
                       <div class="swiper-wrapper">
                            @forelse($tentangSliders as $slide)
                                <div class="swiper-slide"><img src="{{ Illuminate\Support\Facades\Storage::url($slide->image) }}" alt="Tentang Kami Image" class="w-full h-full object-cover"></div>
                            @empty
                                <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?q=80&w=2070&auto=format&fit=crop" alt="Diskusi Visi Misi Koperasi" class="w-full h-full object-cover"></div>
                            @endforelse
                        </div>
                       <div class="swiper-pagination tentang-pagination"></div> {{-- Kelas Unik Ditambahkan --}}
                   </div>
                </div>
            </div>
            <div class="lg:w-1/2">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $settings['tentang_title'] ?? 'Dari, Oleh, dan Untuk Anggota' }}</h2>
                <p class="text-gray-600 mb-6 text-lg">{{ $settings['tentang_description'] ?? 'Didirikan atas asas kekeluargaan...' }}</p>
                <div class="space-y-4">
                    <div><h3 class="font-bold text-xl text-blue-600">Visi Kami</h3><p class="text-gray-600">{{ $settings['tentang_visi'] ?? 'Menjadi koperasi konsumen yang mandiri...' }}</p></div>
                    <div><h3 class="font-bold text-xl text-blue-600">Misi Kami</h3><p class="text-gray-600">{{ $settings['tentang_misi'] ?? 'Menyediakan produk dan layanan berkualitas...' }}</p></div>
                </div>
            </div>
        </div>
    </div>
</section>