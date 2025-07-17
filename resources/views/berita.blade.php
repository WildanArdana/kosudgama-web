@extends('layouts.app')

@section('content')
<div class="bg-gray-50">
    {{-- Kontainer utama dengan padding atas untuk memberi ruang dari header --}}
    <div class="container mx-auto px-6 py-16 pt-32">
        
        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900">Arsip Berita</h1>
            <p class="text-lg text-gray-600 mt-2">Ikuti terus informasi dan kegiatan terbaru dari kami.</p>
            <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
        </div>

        {{-- Cek jika ada berita --}}
        @if($all_berita->count() > 0)
            {{-- Grid untuk daftar berita --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($all_berita as $item)
                    {{-- PERBAIKAN: Bungkus seluruh item dengan tag <a> --}}
                    <a href="{{ route('berita.show', $item) }}" class="berita-item group block bg-white rounded-lg shadow-lg overflow-hidden transform hover:-translate-y-2 transition-transform duration-300 ease-in-out">
                        <div class="flex flex-col h-full">
                            {{-- Gambar --}}
                            <div class="overflow-hidden">
                                <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}" class="h-48 w-full object-cover group-hover:scale-110 transition-transform duration-300">
                            </div>
                            {{-- Konten Teks --}}
                            <div class="p-6 flex flex-col flex-grow">
                                <p class="text-sm text-gray-500 mb-1">{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</p>
                                <h3 class="text-xl font-bold mb-2 text-gray-800 group-hover:text-blue-600 transition-colors">{{ $item->title }}</h3>
                                <p class="text-gray-600 flex-grow">{{ $item->snippet ?? Str::limit(strip_tags($item->content), 120) }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>

            {{-- Link Pagination --}}
            <div class="mt-12">
                {{ $all_berita->links() }}
            </div>
        @else
            {{-- Pesan jika tidak ada berita --}}
            <p class="text-center text-gray-500 col-span-3 py-10">Belum ada berita yang dipublikasikan.</p>
        @endif
    </div>
</div>
@endsection
