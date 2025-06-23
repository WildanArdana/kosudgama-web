<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            // ... (data setting yang sudah ada) ...
            ['key' => 'kontak_alamat', 'value' => 'Jl. Kenjeran, Surabaya, Indonesia'],
            ['key' => 'kontak_telepon', 'value' => '(+62) 8578 0956 487'],
            ['key' => 'kontak_email', 'value' => 'sekretariat.kosudgame@gmail.com'],
            ['key' => 'kontak_jam_operasional', 'value' => "Senin - Jumat: 08.00 - 16.00 WIB\nSabtu: 08.00 - 13.30 WIB"],
            ['key' => 'kontak_maps_embed', 'value' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15831.913348169936!2d112.78013783955077!3d-7.242721099999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7f9d5a3509939%3A0x8403a743c33364f!2sKenjeran%2C%20Kec.%20Bulak%2C%20Surabaya%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1687158301543!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'],
            ['key' => 'social_facebook', 'value' => '#'],
            ['key' => 'social_twitter', 'value' => '#'],
            ['key' => 'social_instagram', 'value' => '#'],
            ['key' => 'social_youtube', 'value' => '#'],
        ];
        foreach ($settings as $setting) { Setting::updateOrCreate(['key' => $setting['key']], $setting); }
    }
}