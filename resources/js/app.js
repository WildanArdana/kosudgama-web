import './bootstrap';

/**
 * Fungsi ini menangani semua interaksi JavaScript utama untuk template.
 */
document.addEventListener('DOMContentLoaded', () => {

    // --- Bagian 1: Penanganan scroll & navigasi ---
    // (Kode ini sudah benar dan tidak perlu diubah)
    if (window.location.hash) {
        const targetId = window.location.hash.substring(1);
        const targetElement = document.getElementById(targetId);
        if (targetElement) {
            setTimeout(() => {
                window.scrollTo({
                    top: targetElement.offsetTop - 96,
                    behavior: 'smooth'
                });
            }, 100);
        }
    }

    feather.replace();

    const header = document.getElementById('header');
    const handleScroll = () => {
        if (window.scrollY > 50) {
            header.classList.add('scrolled', 'bg-white', 'shadow-md');
        } else {
            header.classList.remove('scrolled', 'bg-white', 'shadow-md');
        }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll();

    const sections = document.querySelectorAll('.page-section');
    const navLinks = document.querySelectorAll('.nav-link.page-link');
    const activateNavLink = () => {
        let currentSection = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            if (window.scrollY >= sectionTop - 150) {
                currentSection = section.getAttribute('id');
            }
        });
        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(currentSection)) {
                link.classList.add('active');
            }
        });
    };
    window.addEventListener('scroll', activateNavLink);
    activateNavLink();

    document.querySelectorAll('a.page-link').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            if (this.getAttribute('href').startsWith('#')) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 96,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });


    // --- Bagian 2: Inisialisasi Swiper Sliders (PERBAIKAN) ---
    
    // Slider untuk Hero Section
    if (document.querySelector('.hero-slider')) {
        new Swiper('.hero-slider', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.hero-pagination',
                clickable: true,
            },
        });
    }

    // Slider untuk bagian "Tentang Kami"
    if (document.querySelector('.tentang-slider')) {
        new Swiper('.tentang-slider', {
            loop: true,
            effect: 'fade',
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
    if (document.querySelector('.pengurus-slider')) {
        new Swiper('.pengurus-slider', {
            loop: false,
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
    if (document.querySelector('.testimoni-slider')) {
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
                768: { slidesPerView: 2 },
                1024: { slidesPerView: 3 }
            }
        });
    }
});
