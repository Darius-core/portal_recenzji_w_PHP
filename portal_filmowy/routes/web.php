<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PAgeController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/o-autorze', [PageController::class, 'oAutorze'])->name('o-autorze');