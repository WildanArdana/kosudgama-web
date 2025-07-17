import './bootstrap';

/**
 * Fungsi ini menangani semua interaksi JavaScript utama untuk template.
 * Termasuk:
 * 1. Penanganan scroll ke anchor dari halaman lain.
 * 2. Inisialisasi Feather Icons.
 * 3. Logika untuk header transparan saat di atas.
 * 4. Inisialisasi semua slider Swiper.js.
 * 5. Logika untuk menandai link navigasi aktif saat scroll.
 * 6. Penanganan klik pada link yang mengarah ke section (smooth scroll).
 */
document.addEventListener('DOMContentLoaded', () => {

    // 1. Handle scroll ke anchor jika datang dari halaman lain
    // -----------------------------------------------------------------------------
    // Jika URL mengandung hash (misal: kosudgama.com/#layanan), scroll ke elemen tsb.
    if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        const targetElement = document.getElementById(targetId);

        if (targetElement) {
            // Beri sedikit jeda agar DOM siap sepenuhnya
            setTimeout(() => {
                window.scrollTo({
                    top: targetElement.offsetTop - 96, // 96px adalah offset untuk tinggi header
                    behavior: 'smooth'
                });
            }, 100);
        }
    }

    // 2. Inisialisasi Feather Icons
    // -----------------------------------------------------------------------------
    feather.replace();


    // 3. Logika Header Transparan
    // -----------------------------------------------------------------------------
    const header = document.getElementById('header');
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled', 'bg-white', 'shadow-md');
        } else {
            header.classList.remove('scrolled', 'bg-white', 'shadow-md');
        }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Jalankan saat pertama kali load


    // 4. Inisialisasi Swiper Sliders
    // -----------------------------------------------------------------------------
    // Slider untuk bagian "Tentang Kami"
    new Swiper('.tentang-slider', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.tentang-pagination',
            clickable: true,
        },
    });

    // Slider untuk Testimoni
    new Swiper('.testimoni-slider', {
        loop: true,
        slidesPerView: 1,
        spaceBetween: 30,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.testimoni-pagination',
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
        }
    });


    // 5. Logika Navigasi Aktif saat Scroll
    // -----------------------------------------------------------------------------
    const sections = document.querySelectorAll('.page-section');
    const navLinks = document.querySelectorAll('.nav-link.page-link');

    const activateNavLink = () => {
        let currentSection = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop - 150) { // Offset 150px
                currentSection = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            // Cek jika href mengandung id section saat ini
            if (link.getAttribute('href').includes(currentSection)) {
                link.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', activateNavLink);
    activateNavLink(); // Panggil saat load


    // 6. Smooth scroll untuk semua .page-link
    // -----------------------------------------------------------------------------
    document.querySelectorAll('a.page-link').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            // Hanya jalankan jika link adalah anchor link
            if (href.startsWith('#')) {
                e.preventDefault();
                const targetId = href.substring(1);
                const targetElement = document.getElementById(targetId);

                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 96, // 96px offset header
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

});