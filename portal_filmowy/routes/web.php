<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin;

/* STRONA GŁÓWNA */
Route::get('/', [MovieController::class, 'index'])->name('home');

/* FILMY */
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

/* RECENZJE */
Route::middleware('auth')->group(function () {
    Route::post('/movies/{movie}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

/*AUTH*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*ADMIN*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('movies', Admin\MovieController::class);
    Route::resource('actors', Admin\ActorController::class);
    Route::resource('directors', Admin\DirectorController::class);

    Route::get('reviews', [Admin\ReviewController::class, 'index'])->name('reviews.index');
    Route::delete('reviews/{review}', [Admin\ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::resource('users', UserController::class)->except(['create','store','destroy']);
    Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');
});