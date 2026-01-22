<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    public function index(){
        $reviews = Review::with('user', 'movie')->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function show(Review $review){
        $review->load('user', 'movie');

        return view('admin.reviews.show', compact('review'));
    }

    public function destroy(Review $review){
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Opinia usunięta');
    }
}