<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keanggotaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'subtitle',
        'benefits',
        'requirements',
    ];

    protected $casts = [
        'benefits' => 'array',
        'requirements' => 'array',
    ];
}