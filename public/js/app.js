document.addEventListener('DOMContentLoaded', function() {
    
    // 1. Inisialisasi Feather Icons
    // Mengganti semua tag <i data-feather="..."> dengan ikon SVG.
    feather.replace();

    // =============================================================================
    // 2. Logika Navigasi & Header
    // =============================================================================

    // Logika untuk menu mobile (hamburger menu)
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // Menambahkan kelas 'scrolled' pada header saat halaman di-scroll
    const header = document.getElementById('header');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
    }

    // =============================================================================
    // 3. Logika Smooth Scroll & Active Link
    // =============================================================================

    const pageLinks = document.querySelectorAll('.page-link');
    const pageSections = document.querySelectorAll('.page-section');

    // Fungsi untuk menggulir halaman ke section tertentu dengan offset untuk header
    const scrollToSection = (targetId) => {
        const element = document.getElementById(targetId);
        if (element) {
            // Offset 90px agar konten tidak tertutup oleh header yang fixed
            window.scrollTo({
                top: element.offsetTop - 90,
                behavior: 'smooth'
            });
        }
    };

    // Menambahkan event listener pada setiap link navigasi
    pageLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');
            // Hanya proses link yang mengarah ke dalam halaman (anchor link)
            if (href && href.startsWith('#')) {
                e.preventDefault();
                scrollToSection(href.substring(1));

                // Jika di mobile, tutup menu setelah link diklik
                if (window.innerWidth < 1024 && mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });

    // Menggunakan Intersection Observer untuk menandai link aktif saat scroll
    if (pageSections.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const activeId = entry.target.id;
                    pageLinks.forEach(link => {
                        link.classList.remove('active');
                        if (link.getAttribute('href') === `#${activeId}`) {
                            link.classList.add('active');
                        }
                    });
                }
            });
        }, {
             // rootMargin: Mengatur kapan section dianggap "aktif". 
             // -40% dari atas dan -60% dari bawah menciptakan "garis aktivasi" di tengah layar.
            rootMargin: "-40% 0px -60% 0px"
        });

        pageSections.forEach(section => observer.observe(section));
    }


    // =============================================================================
    // 4. Inisialisasi Swiper Sliders
    // =============================================================================
    // Pastikan hanya ada SATU blok inisialisasi untuk semua slider.

    new Swiper('.hero-slider', {
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        pagination: {
            el: '.hero-pagination',
            clickable: true
        }
    });

    new Swiper('.tentang-slider', {
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false
        },
        pagination: {
            el: '.tentang-pagination',
            clickable: true
        }
    });

    new Swiper('.pengurus-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 10,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            768: { slidesPerView: 3 },
            1024: { slidesPerView: 4 }
        }
    });

    new Swiper('.testimoni-slider', {
        loop: true,
        autoplay: {
            delay: 4500,
            disableOnInteraction: false
        },
        pagination: {
            el: '.testimoni-pagination',
            clickable: true
        }
    });


    // =============================================================================
    // 5. Logika untuk semua Modal (Berita, Layanan, Galeri)
    // =============================================================================

    // -- Modal Berita --
    const newsDataElement = document.getElementById('news-data');
    const newsData = newsDataElement ? JSON.parse(newsDataElement.textContent) : [];
    const beritaGrid = document.getElementById('berita-grid');
    const beritaModal = document.getElementById('berita-modal');
    const beritaModalContent = document.getElementById('berita-modal-content');

    if (beritaGrid && beritaModal && beritaModalContent && newsData.length > 0) {
        // Menggunakan event delegation untuk efisiensi
        beritaGrid.addEventListener('click', e => {
            const item = e.target.closest('.berita-item');
            if (!item) return;

            const news = newsData[item.dataset.index];
            beritaModalContent.innerHTML = `
                <span class="modal-close text-gray-800">&times;</span>
                <img src="${news.image_url}" alt="${news.title}" class="h-64 w-full object-cover rounded-lg mb-4">
                <p class="text-sm text-gray-500 mb-2">${new Date(news.date).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}</p>
                <h2 class="text-3xl font-bold mb-4">${news.title}</h2>
                <div class="prose max-w-none text-gray-700">${news.full_text}</div>
            `;
            beritaModal.classList.add('show');
        });
    }

    // -- Modal Layanan --
    const layananItems = document.querySelectorAll('.layanan-item');
    const layananModal = document.getElementById('layanan-modal');
    const layananModalContent = document.getElementById('layanan-modal-content');

    if (layananItems.length > 0 && layananModal && layananModalContent) {
        layananItems.forEach(item => {
            item.addEventListener('click', () => {
                const title = item.dataset.title;
                const icon = item.dataset.icon;
                const color = item.dataset.color;
                const description = item.dataset.description;

                layananModalContent.innerHTML = `
                    <span class="modal-close text-gray-800">&times;</span>
                    <div class="text-center">
                        <div class="bg-${color}-100 text-${color}-600 rounded-full w-24 h-24 flex items-center justify-center mb-6 mx-auto">
                            <i data-feather="${icon}" class="w-12 h-12"></i>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">${title}</h2>
                    </div>
                    <div class="prose max-w-none text-gray-700">${description}</div>
                `;
                // PENTING: Panggil feather.replace() lagi setelah menambahkan ikon baru ke dalam DOM
                feather.replace();
                layananModal.classList.add('show');
            });
        });
    }
    
    // -- Modal Galeri (Lightbox) --
    const galleryItems = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('gallery-lightbox');
    const swiperWrapper = document.querySelector('#gallery-lightbox .swiper-wrapper');

    if (galleryItems.length > 0 && lightbox && swiperWrapper) {
        // 1. Isi slider lightbox dengan semua gambar dari galeri
        galleryItems.forEach(item => {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.innerHTML = `<div class="flex justify-center items-center h-full"><img src="${item.href}" alt="Foto Galeri" class="max-h-full max-w-full"></div>`;
            swiperWrapper.appendChild(slide);
        });

        // 2. Inisialisasi Swiper untuk lightbox
        const gallerySwiper = new Swiper('#gallery-lightbox .swiper-container', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
        });

        // 3. Tambahkan event listener ke setiap item galeri untuk membuka lightbox
        galleryItems.forEach((item, index) => {
            item.addEventListener('click', e => {
                e.preventDefault();
                // Langsung ke slide yang sesuai dengan gambar yang diklik
                gallerySwiper.slideToLoop(index, 0); // 0ms transition
                lightbox.classList.add('show');
            });
        });
    }

    // -- Logika Umum untuk Menutup Semua Modal --
    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', e => {
            // Tutup modal jika klik dilakukan pada latar belakang (overlay) atau tombol close
            if (e.target.classList.contains('modal-overlay') || e.target.closest('.modal-close')) {
                modal.classList.remove('show');
            }
        });
    });

});