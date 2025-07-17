<section id="layanan" class="page-section py-20">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Layanan Unggulan Kami</h2>
            <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Kami berkomitmen memenuhi berbagai kebutuhan anggota melalui unit usaha yang dikelola secara profesional.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($layanans as $layanan)
                {{-- PERBAIKAN: Bungkus dengan tag <a> dan gunakan 'group' untuk hover effect --}}
                <a href="{{ route('layanan.show', $layanan) }}" class="group block">
                    <div class="bg-white p-8 rounded-xl shadow-lg group-hover:shadow-2xl group-hover:-translate-y-2 transition-all duration-300 ease-in-out h-full">
                        {{-- 
                            CATATAN: Penggunaan class dinamis seperti 'bg-{{ $layanan->color }}-100' mungkin tidak terdeteksi oleh Tailwind JIT. 
                            Jika warna tidak muncul, Anda mungkin perlu mendefinisikan class lengkapnya di file tailwind.config.js.
                        --}}
                        <div class="bg-{{ $layanan->color ?? 'blue' }}-100 text-{{ $layanan->color ?? 'blue' }}-600 rounded-full w-16 h-16 flex items-center justify-center mb-6">
                            <i data-feather="{{ $layanan->icon ?? 'box' }}" class="w-8 h-8"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2 text-gray-800">{{ $layanan->title }}</h3>
                        <p class="text-gray-600">{{ $layanan->snippet }}</p>
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Layanan belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
