<?php

use App\Http\Controllers\ContactController; // Menggunakan nama yang benar: ContactController
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda bisa mendaftarkan route untuk aplikasi web Anda. Route ini
| dimuat oleh RouteServiceProvider dan semuanya akan ditetapkan ke
| grup middleware "web".
|
*/

// Route untuk Halaman Utama
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk Halaman Berita
Route::get('/berita', [HomeController::class, 'beritaIndex'])->name('berita.index');
Route::get('/berita/{berita}', [HomeController::class, 'beritaShow'])->name('berita.show');

// Route untuk Halaman Galeri
Route::get('/galeri', [HomeController::class, 'galeriIndex'])->name('galeri.index');

// Route untuk Halaman Detail Layanan
Route::get('/layanan/{layanan}', [HomeController::class, 'layananShow'])->name('layanan.show');

// Route untuk Form Kontak
// PERBAIKAN: Mengganti 'KontakController' menjadi 'ContactController'
Route::post('/kontak', [ContactController::class, 'send'])->name('contact.send');
