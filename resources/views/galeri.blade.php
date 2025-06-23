@extends('layouts.app')

@section('content')
<div class="page-section bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Galeri Kegiatan Lengkap</h2>
            <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Semua dokumentasi momen kebersamaan dan kegiatan kami.</p>
        </div>
        <div id="gallery-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse($all_galeris as $item)
                <a href="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="gallery-item group">
                    <div class="gallery-item-container">
                        <img src="{{ Illuminate\Support\Facades\Storage::url($item->image) }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform" alt="{{ $item->caption ?? 'Galeri Kegiatan' }}">
                    </div>
                </a>
            @empty
                <p class="col-span-full text-center text-gray-500">Galeri masih kosong.</p>
            @endforelse
        </div>
         <div class="text-center mt-12">
            <a href="{{ route('home') }}" class="bg-gray-200 text-gray-800 font-bold px-8 py-4 rounded-full hover:bg-gray-300 transition-all-smooth text-lg">Kembali ke Beranda</a>
        </div>
    </div>
</div>
@endsection