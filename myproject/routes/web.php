<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '{lang}', 'middleware' => 'language'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az');
