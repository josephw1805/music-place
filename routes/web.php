<?php

use App\Http\Controllers\Frontend\ArtistDashboardController;
use App\Http\Controllers\Frontend\ArtistProfileController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Routes
 */
Route::get('/', [FrontendController::class, 'index'])->name('home');

/**
 * Student Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/become-artist', [StudentDashboardController::class, 'becomeArtist'])->name('become-artist');
    Route::post('/become-artist/{user}', [StudentDashboardController::class, 'becomeArtistUpdate'])->name('become-artist.update');

    /** Profile Routes */
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

/**
 * Artist Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:artist'], 'prefix' => 'artist', 'as' => 'artist.'], function () {
    Route::get('/dashboard', [ArtistDashboardController::class, 'index'])->name('dashboard');

    /** Profile Routes */
    Route::get('/profile', [ArtistProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit/{user}', [ArtistProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ArtistProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/profile/update-password', [ArtistProfileController::class, 'updatePassword'])->name('profile.update-password');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
