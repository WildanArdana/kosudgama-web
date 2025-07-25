<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('statistiks', function (Blueprint $table) {
            $table->id();
            $table->string('angka');
            $table->string('label');
            $table->string('icon');
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('statistiks'); }
};