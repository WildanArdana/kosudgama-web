<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_lengkap',
        'nomor_anggota',
        'alamat',
        'tanggal_bergabung',
        // Tambahkan kolom lain yang Anda kirim dari form di sini
        // Error Anda menyebut 'keuntungans', jadi kita tambahkan juga
        'keuntungans', 
    ];
}