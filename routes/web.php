<?php

use App\Http\Controllers\Frontend\ArtistDashboardController;
use App\Http\Controllers\Frontend\UserCDashboardontroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/**
 * Student Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
    Route::get('/dashboard', [UserCDashboardontroller::class, 'index'])->name('dashboard');
});

/**
 * Artist Routes
 */
Route::group(['middleware' => ['auth:web', 'verified', 'check_role:artist'], 'prefix' => 'artist', 'as' => 'artist.'], function () {
    Route::get('/dashboard', [ArtistDashboardController::class, 'index'])->name('dashboard');
});

/**
 * Admin Routes
 */
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
