<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // **KODE INI DITAMBAHKAN UNTUK MEMBAGIKAN PENGATURAN KE SEMUA VIEW**
        if (Schema::hasTable('settings')) {
            // Ambil semua pengaturan dari database sebagai array ['key' => 'value']
            $settings = Setting::pluck('value', 'key')->all();

            // Bagikan pengaturan ke semua view agar bisa diakses dengan variabel $settings
            View::share('settings', $settings);
        }
    }
}
