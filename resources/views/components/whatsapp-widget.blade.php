{{--
    Widget WhatsApp Mengambang
    File ini berisi HTML dan sedikit JavaScript untuk menampilkan
    tombol WhatsApp yang bisa diklik untuk membuka jendela chat.
--}}
<div x-data="{ open: false }" class="fixed bottom-5 right-5 z-50">
    <!-- Tombol utama -->
    <button @click="open = !open" class="bg-green-500 text-white rounded-full w-16 h-16 flex items-center justify-center shadow-lg transition-transform transform hover:scale-110 focus:outline-none">
        <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
            <path d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-7a7 7 0 100 14A7 7 0 0010 3zm-2.022 9.022a.5.5 0 01.707 0L10 13.707l1.315-1.315a.5.5 0 11.707.707L10.707 14.414l1.315 1.315a.5.5 0 11-.707.707L10 15.121l-1.315 1.315a.5.5 0 01-.707-.707l1.315-1.315-1.315-1.315a.5.5 0 010-.707zM10 5a1 1 0 011 1v5a1 1 0 11-2 0V6a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
        <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
             <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" />
        </svg>
    </button>
    
    <!-- Jendela Chat -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-4"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 transform translate-y-0"
         x-transition:leave-end="opacity-0 transform translate-y-4"
         class="absolute bottom-20 right-0 w-80 bg-white rounded-lg shadow-xl border border-gray-200"
         @click.away="open = false">
         
        <!-- Header Chat -->
        <div class="bg-green-500 text-white p-4 rounded-t-lg flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a2 2 0 01-2-2V7a2 2 0 012-2h2.586a1 1 0 01.707.293l2.414 2.414a1 1 0 01.293.707V8z" />
            </svg>
            <h3 class="font-semibold">Yuk Konsultasi Gratis</h3>
        </div>
        
        <!-- Badan Chat -->
        <div class="p-4 bg-gray-50" style="background-image: url('https://i.pinimg.com/736x/8c/98/99/8c98994518b575bfd8c949e91d20548b.jpg'); background-size: contain;">
             <div class="bg-white p-3 rounded-lg shadow-sm max-w-max">
                <p class="text-sm font-semibold text-pink-500">Admin</p>
                <p class="text-gray-800">Halo! Apa yang bisa kami bantu?</p>
                <p class="text-xs text-gray-400 text-right mt-1">{{ date('H:i') }}</p>
            </div>
        </div>

        <!-- Footer Chat / Tombol Aksi -->
        <div class="p-4 border-t border-gray-200 bg-gray-100 rounded-b-lg">
            <a href="https://wa.me/{{ $settings['contact_whatsapp'] ?? '' }}?text=Halo%2C%20saya%20tertarik%20dengan%20layanan%20KOSUDGAMA." 
               target="_blank"
               class="w-full bg-green-500 text-white font-bold py-2 px-4 rounded-lg text-center block hover:bg-green-600 transition-colors">
                Mulai Chat di WhatsApp
            </a>
        </div>
    </div>
</div>
