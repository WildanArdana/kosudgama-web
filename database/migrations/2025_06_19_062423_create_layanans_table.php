<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('icon'); // Nama ikon dari Feather Icons
            $table->string('color'); // Warna tema (blue, yellow, purple, green)
            $table->text('snippet');
            $table->text('full_description');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('layanans'); }
};