<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AllProjectsController;
use App\Http\Middleware\LanguageMiddleware;

// Redirect root to the default language (English)
Route::get('/', function () {
    return redirect('/en');
});

// Route for the Projects page (make sure it's defined outside of the language group and before any catch-all)
Route::get('/projects', [AllProjectsController::class, 'index'])->name('projects');

// Group for language-prefixed routes
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az'); // Allow only 'en', 'ru', and 'az' as valid language prefixes

// Admin login and dashboard routes
Route::get('/admin', function () {
    if (auth()->check() && auth()->user()->is_admin) {
        return redirect()->route('admin.dashboard');
    }
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

// Remove the catch-all route temporarily to test
// Route::fallback(function () {
//     abort(404);
// });

