<section id="tentang" class="page-section py-20 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col lg:flex-row-reverse items-center gap-x-12 gap-y-10">
            
            {{-- Bagian Kanan: Slider Gambar --}}
            <div class="lg:w-1/2 w-full">
                <div class="h-[450px] rounded-lg shadow-xl overflow-hidden">
                   <div class="swiper-container tentang-slider h-full">
                       <div class="swiper-wrapper">
                            @forelse($tentangSliders as $slide)
                                <div class="swiper-slide">
                                    <img src="{{ Storage::url($slide->image) }}" alt="{{ $slide->caption ?? 'Suasana Koperasi Kosudgama' }}" class="w-full h-full object-cover">
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/placeholder-about.jpg') }}" alt="Diskusi tim Koperasi Kosudgama" class="w-full h-full object-cover">
                                </div>
                            @endforelse
                        </div>
                       <div class="swiper-pagination tentang-pagination"></div>
                   </div>
                </div>
            </div>

            {{-- Bagian Kiri: Teks Deskripsi, Visi, Misi --}}
            <div class="lg:w-1/2 w-full">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $settings['tentang_title'] ?? 'Dari, Oleh, dan Untuk Anggota' }}</h2>
                
                {{-- PERBAIKAN 1: Tambahkan ID "sejarah" di sini --}}
                <div id="sejarah" class="scroll-mt-24">
                    <p class="text-gray-600 mb-8 text-lg leading-relaxed">{{ $settings['tentang_description'] ?? 'Didirikan atas asas kekeluargaan, Koperasi Kosudgama Daya Gemilang berkomitmen untuk menyejahterakan anggota melalui layanan yang prima dan produk yang berdaya saing. Kami adalah mitra terpercaya Anda untuk bertumbuh bersama.' }}</p>
                </div>
                
                <div class="space-y-6">
                    {{-- PERBAIKAN 2: Tambahkan ID "visimisi" di sini --}}
                    <div id="visimisi" class="scroll-mt-24">
                        <h3 class="font-bold text-2xl text-gray-800 mb-3">Visi Kami</h3>
                        <p class="text-gray-600 pl-4 border-l-4 border-blue-500">{{ $settings['tentang_visi'] ?? 'Menjadi koperasi konsumen yang mandiri, modern, dan terpercaya pilihan anggota serta masyarakat.' }}</p>
                    </div>
                    
                    <div>
                        <h3 class="font-bold text-2xl text-gray-800 mb-3">Misi Kami</h3>
                        <div class="text-gray-600 pl-4 border-l-4 border-blue-500">
                            {!! $settings['tentang_misi'] ?? '<ul><li class="mb-2">Menyediakan produk dan layanan berkualitas dengan harga bersaing.</li><li>Meningkatkan kesejahteraan anggota melalui pembagian Sisa Hasil Usaha (SHU) yang adil.</li></ul>' !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
