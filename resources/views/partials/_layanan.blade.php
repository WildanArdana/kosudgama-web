{{-- ✅ PERBAIKAN: Latar belakang diubah menjadi gradasi biru dan warna teks disesuaikan --}}
<section id="layanan" class="page-section py-20 bg-gradient-to-br from-blue-600 to-cyan-500">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-white">Layanan Unggulan Kami</h2>
            <p class="text-lg text-blue-100 mt-2 max-w-2xl mx-auto">Kami berkomitmen memenuhi berbagai kebutuhan anggota melalui unit usaha yang dikelola secara profesional.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($layanans as $layanan)
                @php
                    $colorClasses = [
                        'blue'   => 'bg-blue-100',
                        'yellow' => 'bg-yellow-100',
                        'purple' => 'bg-purple-100',
                        'green'  => 'bg-green-100',
                    ];
                    $selectedColor = $colorClasses[$layanan->color] ?? 'bg-blue-100';
                @endphp

                <a href="{{ route('layanan.show', $layanan) }}" class="group block h-full">
                    <div class="bg-white p-8 rounded-xl shadow-lg group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300 ease-in-out h-full flex flex-col">
                        
                        <div class="{{ $selectedColor }} rounded-full w-16 h-16 flex items-center justify-center mb-6 flex-shrink-0">
                            @if($layanan->icon)
                                <img src="{{ Storage::url($layanan->icon) }}" alt="Ikon untuk {{ $layanan->title }}" class="w-8 h-8">
                            @endif
                        </div>

                        <div class="flex-grow">
                            <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $layanan->title }}</h3>
                            <p class="text-gray-600">{{ $layanan->snippet }}</p>
                        </div>
                    </div>
                </a>
            @empty
                {{-- Warna teks diubah menjadi putih agar terlihat di latar biru --}}
                <p class="col-span-full text-center text-blue-100 py-10">Layanan belum tersedia saat ini.</p>
            @endforelse
        </div>

        <div class="text-center mt-16">
            {{-- ✅ PERBAIKAN: Warna tombol disesuaikan dengan latar baru --}}
            <a href="http://shukosudgama.my.id/" 
               target="_blank" 
               rel="noopener noreferrer"
               class="inline-block bg-white text-blue-600 font-bold text-lg py-4 px-8 rounded-lg shadow-lg hover:bg-gray-200 transition-all duration-300 transform hover:-translate-y-1">
                Cek SHU Online
            </a>
        </div>
        
    </div>
</section>