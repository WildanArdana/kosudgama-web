<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    // Pastikan semua kolom baru ada di sini
    protected $fillable = [
        'title',
        'snippet',
        'full_description',
        'color',
        'icon',
        'order'
    ];
}