<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('keanggotaans', function (Blueprint $table) {
            $table->id(); // Membuat kolom ID otomatis
            // ▼▼ TAMBAHKAN KOLOM LAIN YANG ANDA BUTUHKAN DI SINI ▼▼
            $table->string('nama_lengkap');
            $table->string('nomor_anggota')->unique();
            $table->text('alamat')->nullable();
            $table->date('tanggal_bergabung');
            // ▲▲ ---------------------------------------------- ▲▲
            $table->timestamps(); // Membuat kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keanggotaans');
    }
};