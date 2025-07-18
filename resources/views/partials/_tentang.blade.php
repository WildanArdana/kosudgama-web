<section id="tentang" class="page-section py-20 bg-gray-50 overflow-hidden">
    <div class="container mx-auto px-6">

        @if($tentang && $tentangSliders->isNotEmpty())
            <div class="flex flex-col lg:flex-row items-center gap-x-16 gap-y-12">
                
                {{-- Bagian Kiri: Teks --}}
                <div class="lg:w-7/12 w-full">
                    <div id="sejarah" class="scroll-mt-24">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">{{ $tentang->title }}</h2>
                        
                        {{-- **PERBAIKAN DI SINI**: Baris ini ditambahkan kembali untuk menampilkan subtitle --}}
                        <h3 class="text-xl text-gray-600 mb-6">{{ $tentang->subtitle }}</h3>
                        
                        <p class="text-gray-600 mb-8 text-lg leading-relaxed text-justify">{{ $tentang->description }}</p>
                    </div>
                    
                    <div class="space-y-8">
                        <div id="visimisi" class="scroll-mt-24">
                            <h3 class="font-bold text-2xl text-gray-800 mb-3">Visi Kami</h3>
                            <p class="text-gray-600 pl-4 border-l-4 border-blue-600 text-justify">{{ $tentang->vision }}</p>
                        </div>
                        
                        <div>
                            <h3 class="font-bold text-2xl text-gray-800 mb-3">Misi Kami</h3>
                            <div class="prose prose-lg max-w-none text-gray-600 pl-4 border-l-4 border-blue-600 text-justify">
                                @php
                                    $missionText = $tentang->mission ?? '';
                                    $cleanedText = preg_replace('/^1\.\s+/', '', $missionText);
                                    $missionItems = preg_split('/\s+\d+\.\s+/', $cleanedText);
                                @endphp
                                <ol>
                                    @foreach ($missionItems as $item)
                                        @if(trim($item) !== '')
                                            <li>{!! $item !!}</li>
                                        @endif
                                    @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Bagian Kanan: Gambar Slider --}}
                <div class="lg:w-5/12 w-full lg:order-last">
                    <div class="swiper-container tentang-slider h-[450px] rounded-lg shadow-xl overflow-hidden">
                        <div class="swiper-wrapper">
                            @foreach($tentangSliders as $slide)
                                <div class="swiper-slide">
                                    <img 
                                        src="{{ Illuminate\Support\Facades\Storage::disk('public')->exists($slide->image) ? Illuminate\Support\Facades\Storage::url($slide->image) : asset('images/placeholder-about.jpg') }}" 
                                        alt="{{ $slide->title ?? 'Gambar Tentang Koperasi' }}" 
                                        class="w-full h-full object-cover"
                                    >
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-pagination tentang-pagination"></div>
                    </div>
                </div>

            </div>
        @else
            <div class="text-center bg-yellow-100 border border-yellow-300 text-yellow-800 px-4 py-3 rounded-lg">
                <p class="font-semibold">Konten "Tentang Kami" belum tersedia.</p>
                <p class="text-sm">Pastikan data "Tentang" dan "Slider" dengan lokasi 'tentang' sudah diisi di panel admin.</p>
            </div>
        @endif

    </div>
</section>