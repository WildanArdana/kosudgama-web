<section id="tentang" class="page-section py-20 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-6">

        @if($tentang)
            {{-- Bagian Deskripsi & Gambar --}}
            <div class="flex flex-col lg:flex-row items-center gap-x-16 gap-y-12">
                <div class="lg:w-7/12 w-full">
                    <div id="sejarah" class="scroll-mt-24">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ $tentang->title }}</h2>
                        <h3 class="text-xl text-gray-600 mb-6">{{ $tentang->subtitle }}</h3>
                        <p class="text-gray-600 text-lg leading-relaxed text-justify">{{ $tentang->description }}</p>
                    </div>
                </div>
                <div class="lg:w-5/12 w-full lg:order-last">
                    <div class="swiper-container tentang-slider h-[450px] rounded-lg shadow-xl overflow-hidden">
                        <div class="swiper-wrapper">
                            @forelse($tentangSliders as $slide)
                                <div class="swiper-slide">
                                    <img src="{{ Illuminate\Support\Facades\Storage::disk('public')->exists($slide->image) ? Illuminate\Support\Facades\Storage::url($slide->image) : asset('images/placeholder-about.jpg') }}" 
                                         alt="{{ $slide->title ?? 'Gambar Tentang Koperasi' }}" class="w-full h-full object-cover">
                                </div>
                            @empty
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/placeholder-about.jpg') }}" alt="Placeholder" class="w-full h-full object-cover">
                                </div>
                            @endforelse
                        </div>
                        <div class="swiper-pagination tentang-pagination"></div>
                    </div>
                </div>
            </div>

            {{-- Bagian Visi, Misi, dan Tujuan --}}
            <div id="visimisi" class="mt-16 scroll-mt-24">
                {{-- ✅ PERBAIKAN: Menggunakan grid-cols-1 untuk mobile, dan grid-cols-3 untuk layar besar --}}
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    {{-- Kolom Visi --}}
                    <div class="flex">
                        <div class="flex flex-col p-6 bg-white rounded-lg shadow h-full w-full">
                            <h3 class="font-bold text-2xl text-gray-800 mb-4 text-center">Visi Kami</h3>
                            <p class="text-gray-700 text-center flex-grow">{{ $tentang->vision }}</p>
                        </div>
                    </div>

                    {{-- Kolom Misi --}}
                    <div class="flex">
                         <div class="flex flex-col p-6 bg-white rounded-lg shadow h-full w-full">
                            <h3 class="font-bold text-2xl text-gray-800 mb-4 text-center">Misi Kami</h3>
                            <ul class="space-y-3 flex-grow">
                                @foreach(explode("\n", $tentang->mission) as $mission_item)
                                    @if(trim($mission_item) !== '')
                                    <li class="flex items-start">
                                        <i data-feather="target" class="text-blue-600 mr-3 mt-1 flex-shrink-0 w-5 h-5"></i>
                                        <span class="text-gray-700">{{ trim(preg_replace('/^\d+\.\s+/', '', $mission_item)) }}</span>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Kolom Tujuan --}}
                    <div class="flex">
                        <div class="flex flex-col p-6 bg-white rounded-lg shadow h-full w-full">
                            <h3 class="font-bold text-2xl text-gray-800 mb-4 text-center">Tujuan Kami</h3>
                            <ul class="space-y-3 flex-grow">
                                 @foreach(explode("\n", $tentang->tujuan) as $tujuan_item)
                                    @if(trim($tujuan_item) !== '')
                                    <li class="flex items-start">
                                        <i data-feather="flag" class="text-blue-600 mr-3 mt-1 flex-shrink-0 w-5 h-5"></i>
                                        <span class="text-gray-700">{{ trim(preg_replace('/^\d+\.\s+/', '', $tujuan_item)) }}</span>
                                    </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        @endif
    </div>
</section>