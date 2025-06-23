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
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        $layanans = Layanan::orderBy('order', 'asc')->get();
        $pengurus = Pengurus::orderBy('id', 'asc')->get();
        $berita = Berita::orderBy('date', 'desc')->get();
        $heroSliders = Slider::where('location', 'hero')->orderBy('order', 'asc')->get();
        $tentangSliders = Slider::where('location', 'tentang')->orderBy('order', 'asc')->get();
        $galeris = Galeri::orderBy('order', 'asc')->take(8)->get(); // Hanya 8 di halaman depan
        $testimonis = Testimoni::orderBy('order', 'asc')->get();
        $statistiks = Statistik::orderBy('order', 'asc')->get();

        return view('welcome', compact(
            'settings', 'layanans', 'pengurus', 'berita', 'heroSliders', 
            'tentangSliders', 'galeris', 'testimonis', 'statistiks'
        ));
    }

    // **(BARU)** Metode untuk halaman galeri lengkap
    public function galeri()
    {
        // Ambil semua data galeri
        $all_galeris = Galeri::orderBy('order', 'asc')->get();
        
        // Kirimkan juga data yang dibutuhkan oleh layout utama agar tidak error
        $settings = Setting::all()->pluck('value', 'key');
        $berita = Berita::orderBy('date', 'desc')->get();

        return view('galeri', [
            'all_galeris' => $all_galeris,
            'settings' => $settings,
            'berita' => $berita,
        ]);
    }
}
