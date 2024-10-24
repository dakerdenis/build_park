<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\LanguageMiddleware;

Route::get('/', function () {
    return redirect('/en');  // Redirect root to the default language
});
    
// Apply the LanguageMiddleware to all routes with a language prefix
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az');  // Define supported languages
