<section id="galeri" class="page-section bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Galeri Kegiatan</h2>
            <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Dokumentasi momen kebersamaan dan kegiatan yang kami selenggarakan.</p>
        </div>
        <div id="gallery-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($galeris as $item)
                <a href="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="gallery-item group">
                    <div class="gallery-item-container">
                        <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform" alt="{{ $item->caption ?? 'Galeri Kegiatan' }}">
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Galeri masih kosong.</p>
            @endforelse
        </div>
        @if(\App\Models\Galeri::count() > 8)
        <div class="text-center mt-12">
            {{-- Tombol diperbarui untuk mengarah ke halaman galeri --}}
            <a href="{{ route('galeri.index') }}" class="bg-blue-600 text-white font-bold px-8 py-4 rounded-full hover:bg-blue-700 transition-all-smooth shadow-lg text-lg">Lihat Galeri Lengkap</a>
        </div>
        @endif
    </div>
</section>