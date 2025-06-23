<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('testimonis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_anggota');
            $table->string('keterangan_anggota');
            $table->text('kutipan');
            $table->string('foto')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('testimonis'); }
};
