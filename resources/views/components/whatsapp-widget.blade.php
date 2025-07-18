@php
    // Blok PHP untuk mengambil data nomor WhatsApp dari database
    use App\Models\Setting;
    $settings = Setting::first();
    $whatsappNumber = $settings->no_wa ?? '+62 858-7627-8242'; // Gunakan nomor default jika tidak ada
    
    // Membersihkan nomor dari karakter selain angka
    $cleanedWhatsappNumber = preg_replace('/[^0-9]/', '', $whatsappNumber);
    
    // Memastikan nomor dimulai dengan '62'
    if (substr($cleanedWhatsappNumber, 0, 1) === '0') {
        $cleanedWhatsappNumber = '62' . substr($cleanedWhatsappNumber, 1);
    }

    // Membuat link WhatsApp yang lengkap
    $whatsappLink = "https://wa.me/{$cleanedWhatsappNumber}?text=Halo%2C%20saya%20tertarik%20dengan%20layanan%20KOSUDGAMA.";
@endphp

<div x-data="{ open: false }" class="fixed bottom-5 right-5 z-50">
    <button @click="open = !open" class="bg-green-500 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg transition-transform transform hover:scale-110 focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="w-9 h-9" fill="currentColor" viewBox="0 0 24 24"><path d="M19.11 17.205c-.372 0-1.088 1.39-1.088 1.39s-.213.125-.555.062c-.342-.062-1.688-.622-3.243-2.176-1.226-1.248-2.03-2.824-2.223-3.153-.192-.33-.372-.704.125-1.185.5-.482.913-.863.913-.863s.25-.187.375-.375c.125-.187.062-.437-.062-.687-.125-.252-1.62-3.89-1.873-4.453-.252-.562-.5-.562-.687-.562-.188 0-.375 0-.563 0s-.5.062-.75.375c-.25.312-1.002 1.185-1.002 2.824s1.002 3.25 1.125 3.498c.123.248 1.688 2.686 4.113 3.623.687.25 1.25.437 1.688.562.437.125.812.062 1.125-.063.312-.125.998-1.248.998-1.248s.187-.125.062-.25z"/></svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor" style="display: none;"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
    </button>
    
    <div x-show="open" x-transition class="absolute bottom-20 right-0 w-80 bg-white rounded-lg shadow-xl border border-gray-200" @click.away="open = false" style="display: none;">
         
        <div class="bg-green-500 text-white p-4 rounded-t-lg flex items-center">
            
            {{-- ✅ PERBAIKAN: Cek apakah logo ada, jika tidak, tampilkan ikon default --}}
            @if($settings && $settings->logo_instansi)
                <img src="{{ Storage::url($settings->logo_instansi) }}" alt="Logo Instansi" class="h-10 w-10 mr-3 rounded-full object-cover border-2 border-white">
            @else
                {{-- Ikon default jika logo belum di-upload --}}
                <div class="h-10 w-10 mr-3 rounded-full bg-white text-green-500 flex items-center justify-center border-2 border-white flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                </div>
            @endif

            <div>
                <h3 class="font-semibold">{{ $settings->nama_instansi ?? 'Customer Service' }}</h3>
                <p class="text-xs">Online</p>
            </div>
        </div>
        
        <div class="p-4 h-48 overflow-y-auto bg-gray-50" style="background-image: url('https://i.pinimg.com/736x/8c/98/99/8c98994518b575bfd8c949e91d20548b.jpg'); background-size: contain;">
             <div class="bg-white p-3 rounded-lg shadow-sm max-w-max">
                <p class="text-sm font-semibold text-pink-500">Admin</p>
                <p class="text-gray-800">Halo! Ada yang bisa kami bantu terkait layanan kami?</p>
                <p class="text-xs text-gray-400 text-right mt-1">{{ date('H:i') }}</p>
            </div>
        </div>

        <div class="p-4 border-t border-gray-200 bg-gray-100 rounded-b-lg">
            <a href="{{ $whatsappLink }}" target="_blank" class="w-full bg-green-500 text-white font-bold py-3 px-4 rounded-lg text-center flex items-center justify-center hover:bg-green-600 transition-colors">
                Mulai Chat di WhatsApp
            </a>
        </div>
    </div>
</div>