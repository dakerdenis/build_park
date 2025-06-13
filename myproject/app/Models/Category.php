<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name_en', 'name_ru', 'name_az', 'order'];

    // Define the one-to-many relationship with Project
    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
