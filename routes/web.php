<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\EpisodeController;
use App\Http\Controllers\Dashboard\HomeController as DashboardHomeController;
use App\Http\Controllers\Dashboard\ShowController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');


Route::prefix('auth')->as('auth.')->group(function() {
    Route::get('login', [AuthController::class, 'showLoginPage'])->name('show-login');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('register', [AuthController::class, 'showRegisterPage'])->name('show-register');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth:web');
});


Route::prefix('dashboard')->as('dashboard.')->middleware(['auth:web'])->group(function() {
    Route::get('/', [DashboardHomeController::class, 'home'])->name('home');

    Route::resource('users', UserController::class);

    Route::resource('shows', ShowController::class);

    Route::resource('episodes', EpisodeController::class);
});