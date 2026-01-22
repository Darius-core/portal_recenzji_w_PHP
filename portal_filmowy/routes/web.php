<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\DirectorController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MovieController as AdminMovieController;
use App\Http\Controllers\Admin\ActorController as AdminActorController;
use App\Http\Controllers\Admin\DirectorController as AdminDirectorController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use Illuminate\Support\Facades\Session;

/* WCAG 
Route::post('/accessibility/font', function () {
    Session::put('font_size', request('size', 'normal'));
    return back();
})->name('accessibility.font');

Route::post('/accessibility/contrast', function () {
    Session::put('high_contrast', !Session::get('high_contrast', false));
    return back();
})->name('accessibility.contrast');
*/

/* STRONA GŁÓWNA */
Route::get('/', [MovieController::class, 'index'])->name('home');
Route::get('/o-stronie', [PageController::class, 'oAutorze'])->name('o_stronie');

/* FILMY */
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movies.show');

/* AKTORZY */
Route::resource('actors', ActorController::class)->only(['show']);

/* REŻYSERZY */
Route::resource('directors', DirectorController::class)->only(['show']);

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

    Route::resource('movies', AdminMovieController::class);
    Route::resource('actors', AdminActorController::class);
    Route::resource('directors', AdminDirectorController::class);

    Route::get('reviews', [AdminReviewController::class, 'index'])->name('reviews.index');
    Route::get('reviews/{review}', [AdminReviewController::class, 'show'])->name('reviews.show');
    Route::delete('reviews/{review}', [AdminReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::resource('users', UserController::class)->except(['create','store','destroy']);
    Route::patch('users/{user}/toggle', [UserController::class, 'toggle'])->name('users.toggle');
});