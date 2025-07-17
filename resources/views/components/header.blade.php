<header 
    x-data="{ mobileMenuOpen: false, aboutDropdownOpen: false }" 
    id="header" 
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 ease-in-out bg-white/80 backdrop-blur-sm shadow-md"
>
    <div class="container mx-auto px-6 py-2 flex justify-between items-center">
        
        {{-- Logo --}}
        <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="KOSUDGAMA Logo" class="h-16 w-auto">
        </a>
        
        {{-- Navigasi Desktop --}}
        <nav class="hidden lg:flex items-center space-x-4 xl:space-x-5 text-sm font-medium text-gray-700">
            {{-- PERBAIKAN: Logika href disederhanakan untuk semua link anchor --}}
            <a href="{{ url('/#beranda') }}" class="nav-link page-link">Beranda</a>
            <a href="{{ url('/#layanan') }}" class="nav-link page-link">Layanan</a>
            
            {{-- Dropdown "Tentang" --}}
            <div @mouseenter="aboutDropdownOpen = true" @mouseleave="aboutDropdownOpen = false" class="relative">
                <a href="{{ url('/#tentang') }}" class="nav-link page-link flex items-center">
                    Tentang
                    <svg class="w-4 h-4 ml-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </a>
                <div x-show="aboutDropdownOpen" x-transition class="absolute z-10 mt-2 w-48 bg-white rounded-md shadow-xl py-1">
                    <a href="{{ url('/#sejarah') }}" class="page-link block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Sejarah</a>
                    <a href="{{ url('/#visimisi') }}" class="page-link block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Visi & Misi</a>
                    <a href="{{ url('/#pengurus') }}" class="page-link block px-4 py-2 text-sm text-gray-700 hover:bg-blue-500 hover:text-white">Pengurus</a>
                </div>
            </div>

            <a href="{{ url('/#testimoni') }}" class="nav-link page-link">Testimoni</a>
            <a href="{{ url('/#keanggotaan') }}" class="nav-link page-link">Keanggotaan</a>
            <a href="{{ route('berita.index') }}" class="nav-link {{ request()->routeIs('berita.index') ? 'text-blue-600' : '' }}">Berita</a>
            <a href="{{ route('galeri.index') }}" class="nav-link {{ request()->routeIs('galeri.index') ? 'text-blue-600' : '' }}">Galeri</a>
            <a href="{{ url('/#kontak') }}" class="page-link bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700">Hubungi Kami</a>
        </nav>
        
        {{-- Tombol Menu Mobile --}}
        <div class="lg:hidden">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-gray-800 focus:outline-none">
                <i data-feather="menu" class="w-7 h-7"></i>
            </button>
        </div>
    </div>

    {{-- Navigasi Mobile (LENGKAP) --}}
    <div x-show="mobileMenuOpen"
         x-transition
         class="lg:hidden bg-white shadow-lg"
         @click.away="mobileMenuOpen = false"
    >
        <div class="pt-2 pb-4 space-y-1">
            <a @click="mobileMenuOpen = false" href="{{ url('/#beranda') }}" class="page-link block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Beranda</a>
            <a @click="mobileMenuOpen = false" href="{{ url('/#layanan') }}" class="page-link block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Layanan</a>
            
            {{-- Dropdown "Tentang" untuk Mobile --}}
            <div>
                <button @click="aboutDropdownOpen = !aboutDropdownOpen" class="w-full flex justify-center items-center py-3 px-4 text-center text-gray-700 hover:bg-gray-100">
                    Tentang
                    <svg :class="{'rotate-180': aboutDropdownOpen}" class="w-5 h-5 ml-1.5 transition-transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                </button>
                <div x-show="aboutDropdownOpen" x-collapse class="bg-gray-50 border-t border-b border-gray-200">
                    <a @click="mobileMenuOpen = false" href="{{ url('/#sejarah') }}" class="page-link block py-2 text-center text-sm text-gray-600 hover:bg-gray-200">Sejarah</a>
                    <a @click="mobileMenuOpen = false" href="{{ url('/#visimisi') }}" class="page-link block py-2 text-center text-sm text-gray-600 hover:bg-gray-200">Visi & Misi</a>
                    <a @click="mobileMenuOpen = false" href="{{ url('/#pengurus') }}" class="page-link block py-2 text-center text-sm text-gray-600 hover:bg-gray-200">Pengurus</a>
                </div>
            </div>

            <a @click="mobileMenuOpen = false" href="{{ url('/#testimoni') }}" class="page-link block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Testimoni</a>
            <a @click="mobileMenuOpen = false" href="{{ url('/#keanggotaan') }}" class="page-link block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Keanggotaan</a>
            <a href="{{ route('berita.index') }}" class="block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Berita</a>
            <a href="{{ route('galeri.index') }}" class="block py-3 px-4 text-center text-gray-700 hover:bg-gray-100">Galeri</a>
            
            <div class="px-4 pt-2">
                 <a @click="mobileMenuOpen = false" href="{{ url('/#kontak') }}" class="page-link block w-full text-center py-3 text-white bg-blue-600 rounded-lg hover:bg-blue-700">Hubungi Kami</a>
            </div>
        </div>
    </div>
</header>
