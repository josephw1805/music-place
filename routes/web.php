<?php

use App\Http\Controllers\Frontend\ArtistDashboardController;
use App\Http\Controllers\Frontend\FrontendController;
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
});

/**
 * Artist Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:artist'], 'prefix' => 'artist', 'as' => 'artist.'], function () {
    Route::get('/dashboard', [ArtistDashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
