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
            $table->string('name_en'); // Project name in English
            $table->string('name_ru'); // Project name in Russian
            $table->text('description_en'); // Project description in English
            $table->text('description_ru'); // Project description in Russian
            $table->json('images'); // Store image filenames as JSON array
            $table->string('youtube_link')->nullable(); // Optional YouTube link
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
