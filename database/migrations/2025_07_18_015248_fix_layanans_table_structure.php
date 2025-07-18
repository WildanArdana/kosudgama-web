<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Cek dulu apakah tabel 'layanans' ada sebelum mengubahnya
        if (Schema::hasTable('layanans')) {
            Schema::table('layanans', function (Blueprint $table) {
                // Tambahkan kolom baru HANYA JIKA belum ada
                if (!Schema::hasColumn('layanans', 'title')) {
                    $table->string('title')->after('id');
                }
                if (!Schema::hasColumn('layanans', 'snippet')) {
                    $table->string('snippet')->nullable()->after('title');
                }
                if (!Schema::hasColumn('layanans', 'full_description')) {
                    $table->text('full_description')->nullable()->after('snippet');
                }
                if (!Schema::hasColumn('layanans', 'color')) {
                    $table->string('color')->nullable()->after('full_description');
                }
                if (!Schema::hasColumn('layanans', 'order')) {
                    $table->integer('order')->default(0)->after('icon');
                }

                // Hapus kolom lama HANYA JIKA masih ada
                if (Schema::hasColumn('layanans', 'nama')) {
                    $table->dropColumn('nama');
                }
                if (Schema::hasColumn('layanans', 'deskripsi')) {
                    $table->dropColumn('deskripsi');
                }
            });
        }
    }

    public function down(): void
    {
        // Logika untuk mengembalikan jika diperlukan
        Schema::table('layanans', function (Blueprint $table) {
            if (Schema::hasColumn('layanans', 'title')) {
                $table->dropColumn(['title', 'snippet', 'full_description', 'color', 'order']);
            }
            if (!Schema::hasColumn('layanans', 'nama')) {
                $table->string('nama');
            }
            if (!Schema::hasColumn('layanans', 'deskripsi')) {
                $table->text('deskripsi');
            }
        });
    }
};