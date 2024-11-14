<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Middleware\LanguageMiddleware;

// Redirect root to the default language (English)
Route::get('/', function () {
    return redirect('/en');
});

// Admin login route
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Group for language-prefixed routes
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az'); // Allow only 'en', 'ru', and 'az' as valid language prefixes

// Catch-all route for any undefined route, to show a 404 error page
Route::fallback(function () {
    abort(404);
});
