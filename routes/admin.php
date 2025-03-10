<?php

use App\Http\Controllers\Admin\AlbumCategoryController;
use App\Http\Controllers\Admin\AlbumGenereController;
use App\Http\Controllers\Admin\AlbumLanguageController;
use App\Http\Controllers\Admin\ArtistRequestController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\NewPasswordController;
use App\Http\Controllers\Admin\Auth\PasswordController;
use App\Http\Controllers\Admin\Auth\PasswordResetLinkController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('login.store');

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /**Artist Request Routes */
    Route::get('artist-doc-download/{artist_request}', [ArtistRequestController::class, 'download'])->name('artist-doc-download');
    Route::resource('artist-request', ArtistRequestController::class);

    /** Album Languages Routes */
    Route::resource('album-languages', AlbumLanguageController::class);

    /** Album Generes Routes */
    Route::resource('album-generes', AlbumGenereController::class);

    /** Album Categories Routes */
    Route::resource('album-categories', AlbumCategoryController::class);
});
