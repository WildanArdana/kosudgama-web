<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statistik extends Model {
    use HasFactory;
    protected $table = 'statistiks';
    protected $fillable = ['angka', 'label', 'icon', 'order'];
}