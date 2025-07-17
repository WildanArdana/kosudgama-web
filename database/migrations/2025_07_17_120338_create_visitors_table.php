<?php

// database/migrations/xxxx_xx_xx_xxxxxx_create_visitors_table.php

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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique(); // Tanggal kunjungan, unik
            $table->unsignedInteger('visits')->default(0); // Jumlah kunjungan harian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};