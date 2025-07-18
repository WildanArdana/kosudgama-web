{{-- Menambahkan sedikit style agar iframe peta responsif --}}
<style>
    .map-container iframe {
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>

<section id="kontak" class="page-section py-20 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">Hubungi Kami</h2>
            <p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Kami siap melayani pertanyaan, saran, dan kebutuhan Anda.</p>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mb-6" role="alert">
                <strong class="font-bold">Sukses!</strong> <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mb-6" role="alert">
                <strong class="font-bold">Gagal!</strong> <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        <div class="flex flex-col lg:flex-row gap-10 bg-white p-8 rounded-2xl shadow-2xl">
            <div class="lg:w-1/2">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <input type="text" name="nama" placeholder="Nama Lengkap" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500 transition">
                        <input type="email" name="email" placeholder="Alamat Email" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500 transition">
                    </div>
                    <div class="mb-6">
                        <input type="text" name="subjek" placeholder="Subjek Pesan" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500 transition">
                    </div>
                    <div class="mb-6">
                        <textarea name="pesan" placeholder="Pesan Anda" rows="5" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500 transition"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold px-8 py-4 rounded-lg hover:bg-blue-700 transition-colors">KIRIM PESAN</button>
                </form>
            </div>

            <div class="lg:w-1/2">
                <div class="space-y-6">
                    {{-- Alamat --}}
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></div>
                        <div>
                            <h4 class="font-bold text-lg">Alamat Kantor</h4>
                            <p class="text-gray-600">{{ $settings['contact_address'] ?? 'Alamat belum diatur' }}</p>
                        </div>
                    </div>
                    {{-- Telepon --}}
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></div>
                        <div>
                            <h4 class="font-bold text-lg">Telepon</h4>
                            <p class="text-gray-600">{{ $settings['contact_phone'] ?? 'Nomor belum diatur' }}</p>
                        </div>
                    </div>
                    {{-- Email --}}
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></div>
                        <div>
                            <h4 class="font-bold text-lg">E-mail</h4>
                            <p class="text-gray-600">{{ $settings['contact_email'] ?? 'Email belum diatur' }}</p>
                        </div>
                    </div>
                     {{-- Jam Kerja --}}
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-600"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg></div>
                        <div>
                            <h4 class="font-bold text-lg">Jam Operasional</h4>
                            {{-- ✅ PERBAIKAN: Logika untuk memisahkan jam operasional --}}
                            @php
                                $jamKerja = $settings['jam_kerja'] ?? '';
                                $parts = explode('Sabtu:', $jamKerja);
                            @endphp
                            <p class="text-gray-600">{{ isset($parts[0]) ? trim($parts[0]) : '' }}</p>
                            @if(isset($parts[1]))
                                <p class="text-gray-600">Sabtu: {{ trim($parts[1]) }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Peta Google Maps --}}
        <div class="mt-10 h-96 w-full rounded-2xl overflow-hidden shadow-xl map-container">
             {!! $settings['contact_maps_embed'] ?? '<div class="bg-gray-200 w-full h-full flex items-center justify-center"><p>Link Google Maps Embed belum diatur.</p></div>' !!}
        </div>
     </div>
</section>
