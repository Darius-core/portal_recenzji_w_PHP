<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller{
    //lista filmów
    public function index(){
        $movies = Movie::withAvg('reviews', 'rating')->paginate(15);

        return view('movies.index', compact('movies'));
    }

    //szczegóły filmów
    public function show(Movie $movie){
        $movie->load([
            'actors',
            'directors',
            'reviews.user'
        ]);

        $averageRating = round($movie->reviews()->avg('rating'),1);

        return view('movies.show', compact('movie', 'averageRating'));

    }
}