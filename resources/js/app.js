/**
 * File JavaScript Utama Aplikasi
 * * Mengimpor semua library yang dibutuhkan dan menginisialisasi semua 
 * fungsionalitas interaktif setelah DOM selesai dimuat.
 * * Struktur:
 * 1. Impor Library (Swiper, Feather Icons)
 * 2. Fungsi Inisialisasi Slider (initSliders)
 * 3. Fungsi Inisialisasi Navigasi & Scroll (initNavigation)
 * 4. Fungsi Inisialisasi Ikon (initFeatherIcons)
 * 5. Event Listener utama (DOMContentLoaded) untuk menjalankan semua fungsi.
 */

// --- 1. Impor Library ---
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle'; // Impor semua gaya Swiper (termasuk navigasi, pagination, dll)
import feather from 'feather-icons';

/**
 * Menginisialisasi semua slider Swiper yang ada di halaman.
 * Menggunakan pengecekan dinamis untuk mengaktifkan 'loop' hanya jika ada lebih dari satu slide.
 */
const initSliders = () => {
    // Slider untuk Hero Section
    const heroSliderEl = document.querySelector('.hero-slider');
    if (heroSliderEl) {
        const heroSlides = heroSliderEl.querySelectorAll('.swiper-slide');
        new Swiper(heroSliderEl, {
            loop: heroSlides.length > 1, // ✅ PERBAIKAN INTI: Loop hanya jika slide > 1
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-pagination',
                clickable: true,
            },
            keyboard: {
                enabled: true
            },
        });
    }

    // Slider untuk bagian "Tentang Kami"
    const tentangSliderEl = document.querySelector('.tentang-slider');
    if (tentangSliderEl) {
        const tentangSlides = tentangSliderEl.querySelectorAll('.swiper-slide');
        new Swiper(tentangSliderEl, {
            loop: tentangSlides.length > 1, // ✅ PERBAIKAN INTI: Loop hanya jika slide > 1
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.tentang-pagination',
                clickable: true,
            },
        });
    }

    // Slider untuk Pengurus
    const pengurusSliderEl = document.querySelector('.pengurus-slider');
    if (pengurusSliderEl) {
        const pengurusSlides = pengurusSliderEl.querySelectorAll('.swiper-slide');
        new Swiper(pengurusSliderEl, {
            loop: pengurusSlides.length > 5, // Loop jika slide lebih banyak dari yang bisa ditampilkan
            slidesPerView: 2,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                640: { slidesPerView: 3, spaceBetween: 20 },
                768: { slidesPerView: 4, spaceBetween: 30 },
                1024: { slidesPerView: 5, spaceBetween: 40 },
            }
        });
    }

    // Slider untuk Testimoni
    const testimoniSliderEl = document.querySelector('.testimoni-slider');
    if (testimoniSliderEl) {
        const testimoniSlides = testimoniSliderEl.querySelectorAll('.swiper-slide');
        new Swiper(testimoniSliderEl, {
            loop: testimoniSlides.length > 1, // ✅ PERBAIKAN INTI: Loop hanya jika slide > 1
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 5500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimoni-pagination',
                clickable: true,
            },
            breakpoints: {
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    }
};

/**
 * Menginisialisasi semua fungsionalitas terkait navigasi,
 * seperti header transparan, active link, dan smooth scroll.
 */
const initNavigation = () => {
    const header = document.getElementById('header');
    const sections = document.querySelectorAll('.page-section');
    const navLinks = document.querySelectorAll('.nav-link.page-link');
    const scrollOffset = 96; // Tinggi header

    // Fungsi untuk mengubah tampilan header saat scroll
    if (header) {
        const handleHeaderScroll = () => {
            if (window.scrollY > 50) {
                header.classList.add('scrolled', 'bg-white', 'shadow-md');
            } else {
                header.classList.remove('scrolled', 'bg-white', 'shadow-md');
            }
        };
        window.addEventListener('scroll', handleHeaderScroll);
        handleHeaderScroll(); // Jalankan saat pertama kali load
    }

    // Fungsi untuk menandai link navigasi yang aktif
    const activateNavLink = () => {
        let currentSectionId = '';
        sections.forEach(section => {
            if (window.scrollY >= section.offsetTop - (scrollOffset + 50)) {
                currentSectionId = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(currentSectionId)) {
                link.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', activateNavLink);
    activateNavLink(); // Jalankan saat pertama kali load

    // Fungsi untuk smooth scroll saat link di-klik
    document.querySelectorAll('a.page-link').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - scrollOffset,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    // Fungsi untuk scroll ke hash URL saat halaman pertama kali dimuat
    if (window.location.hash) {
        const targetElement = document.querySelector(window.location.hash);
        if (targetElement) {
            setTimeout(() => {
                window.scrollTo({
                    top: targetElement.offsetTop - scrollOffset,
                    behavior: 'smooth'
                });
            }, 100);
        }
    }
};

/**
 * Menginisialisasi Feather Icons.
 */
const initFeatherIcons = () => {
    if (feather) {
        feather.replace();
    }
};

// --- Event Listener Utama ---
// Menjalankan semua fungsi inisialisasi setelah seluruh konten HTML dimuat.
document.addEventListener('DOMContentLoaded', () => {
    initSliders();
    initNavigation();
    initFeatherIcons();
});
