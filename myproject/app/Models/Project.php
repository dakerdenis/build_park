<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en', 'name_ru', 'name_az',
        'description_en', 'description_ru', 'description_az',
        'main_image', // ← этого не хватало
        'images', 'youtube_url', 'category_id', 'address'
    ];
    

    protected $casts = [
        'images' => 'array', // Cast images JSON to an array
    ];

    // Define the inverse of the relationship
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
