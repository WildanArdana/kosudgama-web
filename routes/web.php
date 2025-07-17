<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KontakController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sinilah Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "web".
|
*/

// Rute untuk halaman utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Rute untuk mengirim pesan dari form kontak
Route::post('/kontak', [KontakController::class, 'send'])->name('contact.send');

// Rute untuk halaman galeri lengkap
Route::get('/galeri', [HomeController::class, 'galeriIndex'])->name('galeri.index');

// Rute untuk halaman arsip berita lengkap
Route::get('/berita', [HomeController::class, 'beritaIndex'])->name('berita.index');

// Rute untuk halaman detail berita
// Menggunakan ID berita, bukan slug, agar lebih andal.
Route::get('/berita/{berita}', [HomeController::class, 'beritaShow'])->name('berita.show');

// (BARU) Rute untuk halaman detail layanan
// Menggunakan ID layanan untuk keandalan. Ganti ke {layanan:slug} jika Anda menggunakan slug.
Route::get('/layanan/{layanan}', [HomeController::class, 'layananShow'])->name('layanan.show');
