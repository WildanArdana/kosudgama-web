<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Kosudgama Daya Gemilang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /><script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="text-gray-800">
    <x-header />
    <main class="pt-24">@yield('content')</main>
    <div id="gallery-lightbox" class="modal-overlay"><span class="modal-close">&times;</span><div class="swiper-container"><div class="swiper-wrapper"></div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div></div>
    <div id="berita-modal" class="modal-overlay"><div id="berita-modal-content"></div></div>
    <div id="layanan-modal" class="modal-overlay"><div id="layanan-modal-content" class="bg-white p-8 rounded-lg max-w-2xl w-full relative"></div></div>
    <x-footer />
    <script id="news-data" type="application/json">@json($berita->map(function($item) { $item->image_url = Illuminate\Support\Facades\Storage::url($item->image); return $item; }) ?? [])</script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
