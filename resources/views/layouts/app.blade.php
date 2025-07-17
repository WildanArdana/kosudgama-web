<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Koperasi Kosudgama Daya Gemilang</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Stylesheets -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    {{-- PERBAIKAN: Style untuk mencegah scroll horizontal --}}
    <style>
        html, body {
            overflow-x: hidden;
            width: 100%;
        }
    </style>

</head>
<body class="text-gray-800 bg-white">
    <x-header />

    <main class="pt-24">
        @yield('content')
    </main>
    
    <x-footer />
    
    <x-whatsapp-widget />

    {{-- SCRIPTS --}}
    {{-- PERBAIKAN: Hanya muat satu script Alpine.js yang sudah termasuk plugin collapse --}}
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    
    @if(isset($berita) && $berita instanceof \Illuminate\Support\Collection && $berita->isNotEmpty())
        <script id="news-data" type="application/json">
            @json($berita->map(function($item) { 
                $item->image_url = Illuminate\Support\Facades\Storage::url($item->image); 
                return $item; 
            }))
        </script>
    @endif
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
