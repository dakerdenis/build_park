<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AllProjectsController;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectsController;
// Redirect root to the default language (English)
Route::get('/', function () {
    return redirect('/en');
});

// Route for the Projects page
Route::get('/projects', [AllProjectsController::class, 'index'])->name('projects');

Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

// Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Dashboard sections
    Route::get('/dashboard', [AdminDashboardController::class, 'home'])->name('dashboard.home');
    Route::get('/clients', [AdminDashboardController::class, 'clients'])->name('clients');
    Route::get('/clients/add', [AdminDashboardController::class, 'addClient'])->name('clients.add');

    Route::get('/projects', [AdminDashboardController::class, 'projects'])->name('projects');
    Route::get('/projects/add', [AdminDashboardController::class, 'addProject'])->name('projects.add');

    // Actions
    Route::post('/clients/upload', [ClientController::class, 'store'])->name('clients.upload');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.delete');
    Route::post('/projects/upload', [ProjectsController::class, 'uploadProjects'])->name('projects.upload');
});

// Group for language-prefixed routes
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
})->where('lang', 'en|ru|az'); // Allow only 'en', 'ru', and 'az' as valid language prefixes
