<?php

namespace App\Providers\Filament;

use App\Filament\Widgets\VisitorOverviewWidget;
use App\Filament\Widgets\VisitorStatsWidget;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
// Middleware AuthenticateSession tidak ditemukan di impor, tetapi digunakan di bawah.
// Pastikan middleware ini ada dan diimpor dengan benar jika diperlukan.
// use Filament\Http\Middleware\AuthenticateSession; 

class AdminPanelProvider extends PanelProvider
{
    /**
     * Mengkonfigurasi panel admin Filament.
     *
     * @param Panel $panel
     * @return Panel
     */
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login() // Mengaktifkan halaman login bawaan Filament
            
            // Konfigurasi branding
            ->brandLogo(asset('images/logo.png')) // Menentukan path ke gambar logo Anda
            ->brandLogoHeight('4rem') // Mengatur tinggi logo
            
            // Mengatur skema warna panel
            ->colors([
                'primary' => Color::Amber,
            ])
            
            // Menemukan resource, halaman, dan widget secara otomatis
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            
            // Mendaftarkan halaman secara manual
            ->pages([
                Pages\Dashboard::class,
            ])
            
            // Mendaftarkan widget secara manual
            ->widgets([
                VisitorOverviewWidget::class,
                VisitorStatsWidget::class,
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            
            // Mendaftarkan middleware untuk panel
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                // AuthenticateSession::class, // Pastikan namespace ini benar atau hapus jika tidak digunakan
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            
            // Mendaftarkan middleware otentikasi
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
