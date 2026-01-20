<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use App\Models\User;

class DashboardController extends Controller{
    public function index(){
        return view('admin.dashboard', [
            'movies' => Movie::count(),
            'reviews' => Review::count(),
            'users' => User::count(),
        ]);
    }
}