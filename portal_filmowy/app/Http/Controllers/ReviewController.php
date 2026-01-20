<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    public function store(Request $request, Movie $movie){
        $data = $request->validate([
            'rating' => 'required|integer|min:1|max:10',
            'content' => 'required|string|max:1000'
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'movie_id' => $movie->id,
            'rating' => $data['rating'],
            'content' => $data['content'],
        ]);

        return back()->with('success', 'Recenzja dodana');

    }
}

