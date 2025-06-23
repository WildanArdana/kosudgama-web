<section id="kontak" class="page-section">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12"><h2 class="text-3xl md:text-4xl font-bold text-gray-900">Hubungi Kami</h2><p class="text-lg text-gray-600 mt-2 max-w-2xl mx-auto">Kami siap melayani pertanyaan, saran, dan kebutuhan Anda.</p></div>
        @if(session('success'))<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-center mb-6" role="alert"><strong class="font-bold">Sukses!</strong> <span class="block sm:inline">{{ session('success') }}</span></div>@endif
        @if(session('error'))<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative text-center mb-6" role="alert"><strong class="font-bold">Gagal!</strong> <span class="block sm:inline">{{ session('error') }}</span></div>@endif
        <div class="flex flex-col lg:flex-row gap-10 bg-white p-8 rounded-2xl shadow-2xl">
            <div class="lg:w-1/2">
                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6"><input type="text" name="nama" placeholder="Nama Lengkap" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500"><input type="email" name="email" placeholder="Alamat Email" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500"></div>
                    <div class="mb-6"><input type="text" name="subjek" placeholder="Subjek Pesan" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500"></div>
                    <div class="mb-6"><textarea name="pesan" placeholder="Pesan Anda" rows="5" required class="w-full p-4 rounded-lg bg-gray-100 border-transparent focus:bg-white focus:border-blue-500"></textarea></div>
                    <button type="submit" class="w-full bg-blue-600 text-white font-bold px-8 py-4 rounded-lg hover:bg-blue-700">KIRIM PESAN</button>
                </form>
            </div>
            <div class="lg:w-1/2">
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><i data-feather="map-pin" class="text-blue-600"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">Alamat Kantor</h4>
                            <p class="text-gray-600">{{ $settings['kontak_alamat'] ?? 'Alamat belum diatur' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><i data-feather="phone" class="text-blue-600"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">Telepon</h4>
                            <p class="text-gray-600">{{ $settings['kontak_telepon'] ?? 'Nomor belum diatur' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><i data-feather="mail" class="text-blue-600"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">E-mail</h4>
                            <p class="text-gray-600">{{ $settings['kontak_email'] ?? 'Email belum diatur' }}</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-full mr-4 flex-shrink-0"><i data-feather="clock" class="text-blue-600"></i></div>
                        <div>
                            <h4 class="font-bold text-lg">Jam Operasional</h4>
                            <p class="text-gray-600">{!! nl2br(e($settings['kontak_jam_operasional'] ?? 'Jam operasional belum diatur')) !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- **(BARU)** Menambahkan class 'map-container' --}}
        <div class="mt-10 h-96 w-full rounded-2xl overflow-hidden shadow-xl map-container">
             {!! $settings['kontak_maps_embed'] ?? '<div class="bg-gray-200 w-full h-full flex items-center justify-center"><p>Link Google Maps Embed belum diatur.</p></div>' !!}
        </div>
     </div>
</section>