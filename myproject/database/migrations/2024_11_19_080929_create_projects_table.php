<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('name_az');
            $table->text('description_en');
            $table->text('description_ru');
            $table->text('description_az');
            $table->json('images'); // Store image filenames as JSON
            $table->string('youtube_url')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Link to categories
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
