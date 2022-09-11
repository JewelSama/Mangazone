<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manga extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'price',
        'mangaka',
        'description',
        'manga_file',
        'manga_cover',
    ];
}
