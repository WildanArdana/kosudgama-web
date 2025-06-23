<header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all-smooth">
    <div class="container mx-auto px-6 py-2 flex justify-between items-center">
        <a href="#beranda" class="page-link">
            {{-- **(DIUBAH)** Mengganti gambar dengan teks --}}
            <span class="text-3xl font-extrabold bg-gradient-to-r from-blue-600 to-cyan-500 bg-clip-text text-transparent">
                KOSUDGAMA
            </span>
        </a>
        
        {{-- Navigasi Desktop --}}
        <nav class="hidden lg:flex items-center space-x-4 xl:space-x-5 text-sm">
            <a href="#beranda" class="nav-link page-link active">Beranda</a>
            <a href="#layanan" class="nav-link page-link">Layanan</a>
            <a href="#testimoni" class="nav-link page-link">Testimoni</a>
            <a href="#keanggotaan" class="nav-link page-link">Keanggotaan</a>
            <a href="#tentang" class="nav-link page-link">Tentang</a>
            <a href="#video-profil" class="nav-link page-link">Video</a>
            <a href="#pengurus" class="nav-link page-link">Pengurus</a>
            <a href="#berita" class="nav-link page-link">Berita</a>
            <a href="{{ route('galeri.index') }}" class="nav-link">Galeri</a>
            <a href="#kontak" class="page-link bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700">Hubungi Kami</a>
        </nav>
        
        {{-- Tombol Menu Mobile --}}
        <button id="mobile-menu-button" class="lg:hidden text-gray-700 focus:outline-none"><i data-feather="menu" class="w-7 h-7"></i></button>
    </div>

    {{-- Navigasi Mobile --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg">
        <a href="#beranda" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Beranda</a>
        <a href="#layanan" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Layanan</a>
        <a href="#testimoni" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Testimoni</a>
        <a href="#keanggotaan" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Keanggotaan</a>
        <a href="#tentang" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Tentang</a>
        <a href="#video-profil" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Video</a>
        <a href="#pengurus" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Pengurus</a>
        <a href="#berita" class="page-link block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Berita</a>
        <a href="{{ route('galeri.index') }}" class="block text-center py-3 px-4 text-gray-700 hover:bg-gray-100">Galeri</a>
        <a href="#kontak" class="page-link block text-center py-4 px-4 text-white bg-blue-600 hover:bg-blue-700">Hubungi Kami</a>
    </div>
</header>
