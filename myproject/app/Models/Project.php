<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ru',
        'description_en',
        'description_ru',
        'images',
        'youtube_link',
    ];

    protected $casts = [
        'images' => 'array', // Automatically cast the images field as an array
    ];
}
