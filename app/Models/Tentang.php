<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;

    // Tambahkan ini untuk mengizinkan mass assignment
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'vision',
        'mission',
        'tujuan', // <-- Tambahkan ini
    ];
}