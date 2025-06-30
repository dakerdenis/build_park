<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AllProjectsController;
use App\Http\Middleware\LanguageMiddleware;
use App\Http\Controllers\AdminClientController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\AdminCategoryController;

// Сначала админка, чтобы Laravel знал эти маршруты вне языковой группы
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::get('/admin', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'home'])->name('dashboard.home');

    // Clients
    Route::get('/clients', [AdminDashboardController::class, 'clients'])->name('clients');
    Route::get('/clients/add', [AdminDashboardController::class, 'addClient'])->name('clients.add');
    Route::post('/clients/upload', [AdminClientController::class, 'store'])->name('clients.upload');
    Route::delete('/clients/{id}', [AdminClientController::class, 'destroy'])->name('clients.delete');

    // Projects (views)
    Route::get('/projects', [AdminDashboardController::class, 'projects'])->name('projects');
    Route::get('/projects/add', [AdminDashboardController::class, 'addProject'])->name('projects.add');

    // Projects (actions)
    Route::post('/projects', [AdminProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{id}/edit', [AdminProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{id}', [AdminProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{id}', [AdminProjectController::class, 'destroy'])->name('projects.delete');

    // Categories (views + actions)
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories/reorder', [AdminCategoryController::class, 'reorder'])->name('categories.reorder');

    Route::post('/categories', [AdminCategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{id}/edit', [AdminCategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{id}', [AdminCategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('categories.delete');
});

// Потом API
Route::prefix('api')->group(function () {
    Route::get('/projects-by-category', [AllProjectsController::class, 'getProjectsByCategory']);
});

// Потом перенаправление с корня
Route::get('/', function () {
    return redirect('/en');
});

// Потом языковая группа
Route::group(['prefix' => '{lang}', 'middleware' => LanguageMiddleware::class], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/our-projects', [AllProjectsController::class, 'index'])->name('projects');
    Route::get('/our-projects/{id}', [AllProjectsController::class, 'show'])->name('projects.show');
})->where('lang', 'en|ru|az');
