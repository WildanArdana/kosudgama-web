@extends('layouts.app')

@section('content')
<div class="bg-white py-16 pt-32">
    <div class="container mx-auto px-6 lg:px-20">
        <article>
            {{-- Judul dan Informasi Meta --}}
            <header class="mb-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $berita->title }}</h1>
                <p class="text-gray-500 mt-4">
                    Dipublikasikan pada {{ \Carbon\Carbon::parse($berita->date)->translatedFormat('d F Y') }}
                </p>
            </header>

            {{-- Gambar Utama --}}
            <figure class="mb-8">
                <img src="{{ Storage::url($berita->image) }}" alt="{{ $berita->title }}" class="w-full max-w-4xl mx-auto h-auto rounded-lg shadow-lg">
            </figure>

            {{-- Konten Artikel --}}
            <div class="prose lg:prose-xl max-w-4xl mx-auto text-gray-700">
                {{-- PERBAIKAN: Menggunakan kolom 'full_text' untuk menampilkan deskripsi lengkap --}}
                {!! $berita->full_text !!}
            </div>
        </article>
    </div>
</div>
@endsection
