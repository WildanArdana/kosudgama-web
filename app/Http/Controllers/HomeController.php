<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Layanan;
use App\Models\Berita;
use App\Models\Pengurus;
use App\Models\Slider;
use App\Models\Galeri;
use App\Models\Testimoni;
use App\Models\Statistik;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama.
     */
    public function index()
    {
        return view('welcome', [
            'settings' => Setting::pluck('value', 'key'),
            'layanans' => Layanan::orderBy('order', 'asc')->get(),
            'pengurus' => Pengurus::orderBy('id', 'asc')->get(),
            'heroSliders' => Slider::where('location', 'hero')->orderBy('order', 'asc')->get(),
            'tentangSliders' => Slider::where('location', 'tentang')->orderBy('order', 'asc')->get(),
            'testimonis' => Testimoni::orderBy('order', 'asc')->get(),
            'statistiks' => Statistik::orderBy('order', 'asc')->get(),
            'galeris' => Galeri::orderBy('order', 'asc')->take(8)->get(),
            'berita' => Berita::latest('date')->take(3)->get(),
            'berita_count' => Berita::count(),
        ]);
    }

    /**
     * Menampilkan halaman arsip berita.
     */
    public function beritaIndex()
    {
        return view('berita', [
            'all_berita' => Berita::latest('date')->paginate(9),
            'settings' => Setting::pluck('value', 'key'),
            'berita' => collect(), // Mengirim koleksi kosong agar layout tidak error
        ]);
    }

    /**
     * Menampilkan halaman galeri lengkap.
     */
    public function galeriIndex()
    {
        return view('galeri', [
            'all_galeris' => Galeri::orderBy('order', 'asc')->paginate(12),
            'settings' => Setting::pluck('value', 'key'),
            'berita' => collect(), // Mengirim koleksi kosong agar layout tidak error
        ]);
    }

    /**
     * Menampilkan halaman detail untuk satu berita.
     */
    public function beritaShow(Berita $berita)
    {
        return view('berita-detail', [
            'berita' => $berita,
            'settings' => Setting::pluck('value', 'key'),
            'berita_layout' => collect() 
        ]);
    }

    /**
     * (BARU) Menampilkan halaman detail untuk satu layanan.
     */
    public function layananShow(Layanan $layanan)
    {
        return view('layanan-detail', [
            'layanan' => $layanan,
            'settings' => Setting::pluck('value', 'key'),
            'berita' => collect(), // Kirim koleksi kosong agar layout tidak error
        ]);
    }
}
