<section id="berita" class="page-section py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Berita & Informasi Terbaru</h2>
            <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Ikuti perkembangan dan kegiatan terbaru dari Koperasi Kosudgama.</p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        {{-- Grid untuk menampilkan 3 berita teratas --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($berita as $item)
                {{-- PERBAIKAN: Membungkus kembali kartu dengan tag <a> --}}
                <a href="{{ route('berita.show', $item) }}" class="berita-item group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transform hover:-translate-y-2 transition-transform duration-300 ease-in-out">
                    <div class="overflow-hidden">
                        <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="h-48 w-full object-cover group-hover:scale-110 transition-transform duration-300">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <p class="text-sm text-gray-500 mb-1">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                        <h3 class="text-xl font-bold mb-2 text-gray-800 group-hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
                        <p class="text-gray-600 flex-grow">{{ $item->snippet ?? Str::limit(strip_tags($item->content), 120) }}</p>
                    </div>
                </a>
            @empty
                <p class="col-span-3 text-center text-gray-500 py-8">Belum ada berita yang dipublikasikan saat ini.</p>
            @endforelse
        </div>

        {{-- Logika tombol ini akan berfungsi setelah controller diperbaiki --}}
        @if(isset($berita_count) && $berita_count > 3)
            <div class="text-center mt-12">
                <a href="{{ route('berita.index') }}" 
                   class="inline-block bg-blue-600 text-white font-bold px-8 py-3 rounded-full hover:bg-blue-700 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-in-out">
                    Lihat Semua Berita
                </a>
            </div>
        @endif
    </div>
</section>
