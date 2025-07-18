<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tentangs', function (Blueprint $table) {
            // Menambahkan kolom 'image' yang bisa kosong (nullable)
            $table->string('image')->nullable()->after('mission');
        });
    }

    public function down(): void
    {
        Schema::table('tentangs', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};