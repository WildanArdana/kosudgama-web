<?php
// database/migrations/xxxx...create_beritas_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image')->nullable();
            $table->text('snippet');
            $table->longText('full_text');
            $table->date('date');
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('beritas'); }
};
