@extends('layouts.app')

@section('content')
<div class="bg-white py-16 pt-32 min-h-screen">
    <div class="container mx-auto px-6 lg:px-20">
        <article>
            {{-- Header Artikel --}}
            <header class="mb-8 text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight">{{ $layanan->title }}</h1>
            </header>

            {{-- PERBAIKAN: Gambar tidak lagi dibungkus link dan diletakkan dalam tag <figure> --}}
            @if($layanan->image)
            <figure class="mb-12">
                <img src="{{ Storage::url($layanan->image) }}" alt="Gambar untuk {{ $layanan->title }}" class="w-full max-w-4xl mx-auto h-auto rounded-lg shadow-lg">
            </figure>
            @endif

            {{-- Konten Lengkap --}}
            <div class="prose lg:prose-xl max-w-4xl mx-auto text-gray-700">
                {!! $layanan->full_description !!}
            </div>
        </article>
    </div>
</div>
@endsection
