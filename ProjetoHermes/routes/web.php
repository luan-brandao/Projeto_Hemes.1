<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MapsController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\RouteListController;
use App\Http\Controllers\RouteEditController;

Route::get('/', [EventController::class, 'index'])->name('home');

// Rotas de Autenticação
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Rota protegida por autenticação: Maps
Route::middleware(['auth'])->group(function () {
    Route::get('maps', [MapsController::class, 'maps'])->name('maps');
});

// Rotas para gerenciamento de rotas
Route::prefix('routes')->middleware(['auth'])->group(function () {
    Route::get('/create', [RouteController::class, 'create'])->name('routes.create');
    Route::post('/', [RouteController::class, 'store'])->name('routes.store');
    Route::get('/show/{id}', [RouteController::class, 'show'])->name('routes.show');
    Route::get('/edit/{id}', [RouteEditController::class, 'edit'])->name('routes.edit');
    Route::post('/edit/{id}', [RouteEditController::class, 'update'])->name('routes.update');
    Route::get('/list', [RouteListController::class, 'index'])->name('routes.index');
    Route::delete('/{id}', [RouteListController::class, 'destroy'])->name('routes.destroy');
});
