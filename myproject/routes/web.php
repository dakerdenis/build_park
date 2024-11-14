<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Controllers\AllProjectsController;

// Redirect root to the default language (English)
Route::get('/', function () {
    return redirect('/en');
});
// Group for language-prefixed routes
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az'); // Allow only 'en', 'ru', and 'az' as valid language prefixes
// Route for the Projects page
Route::get('/projects', [AllProjectsController::class, 'index'])->name('projects');
// Catch-all route for any undefined route, to show a 404 error page
Route::fallback(function () {
    abort(404);
});







// Admin login route
Route::get('/admin', function () {
    // If user is logged in and an admin, redirect to dashboard
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
    // Otherwise, show the login form
    return app(AdminLoginController::class)->showLoginForm();
})->name('admin.login');

Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin dashboard route with authentication and admin-only access
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', function () {
        if (auth()->check() && auth()->user()->is_admin) {
            return app(AdminDashboardController::class)->index();
        }
        return redirect()->route('admin.login');
    })->name('admin.dashboard');

    // Logout route for admin
    Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
});
