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
use App\Models\Tentang;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman utama (homepage).
     */
    public function index(): View
    {
        // Mengambil semua data yang dibutuhkan untuk halaman utama
        $settings       = Setting::pluck('value', 'key');
        $heroSliders    = Slider::where('location', 'hero')->orderBy('order')->get();
        $tentangSliders = Slider::where('location', 'tentang')->orderBy('order')->get();
        $layanans       = Layanan::orderBy('order')->get();
        $pengurus       = Pengurus::orderBy('id')->get();
        $testimonis     = Testimoni::orderBy('order')->get();
        $statistiks     = Statistik::orderBy('order')->get();
        $galeris        = Galeri::orderBy('order')->take(8)->get();
        $berita         = Berita::latest('date')->take(3)->get();
        $tentang        = Tentang::first();
        $berita_count   = Berita::count();

        // Mengirim semua data ke view dengan nama variabel yang sudah disesuaikan
        return view('welcome', compact(
            'settings',
            'heroSliders',
            'tentangSliders',
            'layanans',
            'pengurus',
            'testimonis',
            'statistiks',
            'galeris',
            'berita',
            'tentang',
            'berita_count'
        ));
    }

    /**
     * Menampilkan halaman arsip berita.
     */
    public function beritaIndex(): View
    {
        $settings = Setting::pluck('value', 'key');
        $all_berita = Berita::latest('date')->paginate(9);
        return view('berita', compact('all_berita', 'settings'));
    }

    /**
     * Menampilkan detail berita.
     */
    public function beritaShow(Berita $berita): View
    {
        $settings = Setting::pluck('value', 'key');
        $recentPosts = Berita::where('id', '!=', $berita->id)->latest('date')->take(5)->get();
        return view('berita-detail', compact('berita', 'recentPosts', 'settings'));
    }

    /**
     * Menampilkan halaman arsip galeri.
     */
    public function galeriIndex(): View
    {
        $settings = Setting::pluck('value', 'key');
        $all_galeris = Galeri::orderBy('order', 'asc')->paginate(12);
        return view('galeri', compact('all_galeris', 'settings'));
    }

    /**
     * Menampilkan detail layanan.
     */
    public function layananShow(Layanan $layanan): View
    {
        $settings = Setting::pluck('value', 'key');
        return view('layanan-detail', compact('layanan', 'settings'));
    }
}
