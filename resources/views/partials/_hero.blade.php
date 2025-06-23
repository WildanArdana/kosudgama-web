<section id="beranda" class="page-section bg-white">
    <div class="container mx-auto px-6 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-extrabold text-gray-900 leading-tight mb-4">{!! $settings['hero_title'] ?? 'Membangun Kesejahteraan Bersama <span class="text-blue-600">Anggota</span>' !!}</h1>
            <p class="text-lg md:text-xl text-gray-600 mb-8">{{ $settings['hero_subtitle'] ?? 'Koperasi Kosudgama Daya Gemilang hadir untuk memenuhi berbagai kebutuhan Anda...' }}</p>
            <a href="#layanan" class="page-link bg-blue-600 text-white font-bold px-8 py-4 rounded-full hover:bg-blue-700 transition-all-smooth shadow-lg text-lg">{{ $settings['hero_button_text'] ?? 'Jelajahi Layanan Kami' }}</a>
        </div>
        <div class="mt-12 w-full max-w-6xl mx-auto h-[500px] rounded-lg shadow-2xl overflow-hidden">
            <div class="swiper-container hero-slider h-full">
                <div class="swiper-wrapper">
                    @forelse($heroSliders as $slide)
                        <div class="swiper-slide"><img src="{{ Illuminate\Support\Facades\Storage::url($slide->image) }}" alt="Hero Slider Image" class="w-full h-full object-cover"></div>
                    @empty
                        <div class="swiper-slide"><img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=2070&auto=format&fit=crop" alt="Rapat tim koperasi" class="w-full h-full object-cover"></div>
                    @endforelse
                </div>
                <div class="swiper-pagination hero-pagination"></div> {{-- Kelas Unik Ditambahkan --}}
            </div>
        </div>
    </div>
</section>