<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model {
    use HasFactory;
    protected $fillable = ['title', 'icon', 'color', 'snippet', 'full_description', 'order'];
}