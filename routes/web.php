<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardBeritaController;

Route::get('/', [LandingController::class, 'index']);
Route::get('/berita/{slug}', [LandingController::class, 'show']);

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/', DashboardController::class);

    Route::resource('berita', DashboardBeritaController::class);
    Route::get('berita/{id}/publish', [DashboardBeritaController::class, 'publishPage']);
    Route::post('berita/{id}/publish', [DashboardBeritaController::class,'publish']);

    Route::resource('users', DashboardUserController::class);
});
