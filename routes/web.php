<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');
Route::get('/galeri', [HomeController::class, 'galeri'])->name('galeri.index'); // <-- **(BARU)**
