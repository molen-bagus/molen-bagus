<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProfileController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
// Product routes
Route::post('/review', [ReviewController::class, 'store'])->middleware('auth')->name('review.store');

// ini untuk tampilan edit profil

Route::middleware(['auth'])->group(function () {
    // Rute edit profil (GET)
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    // Rute update profil (POST)
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin routes - protected by admin middleware
    Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
        Route::resource('products', AdminProductController::class);
    });
});
