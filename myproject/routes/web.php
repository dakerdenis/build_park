<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AllProjectsController;
use App\Http\Middleware\LanguageMiddleware;

// Redirect root to the default language (English)
Route::get('/', function () {
    return redirect('/en');
});

// Route for the Projects page
Route::get('/projects', [AllProjectsController::class, 'index'])->name('projects');

// Define a dummy login route that redirects to /admin if needed
Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');

// Admin login route
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin dashboard route with authentication and admin-only access
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Logout route for admin
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});

// Group for language-prefixed routes
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az'); // Allow only 'en', 'ru', and 'az' as valid language prefixes
