<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapsController;

Route::get('/', [EventController::class, 'index'])->name('home');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protegendo a rota maps com o middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('maps', [MapsController::class, 'maps'])->name('maps');
});
