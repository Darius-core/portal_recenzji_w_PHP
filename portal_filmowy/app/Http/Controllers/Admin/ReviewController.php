<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;

class ReviewController extends Controller{
    public function index(){
        $reviews = Review::with('user', 'movie')->paginate(15);
        return view('admin.reviews.index', compact('reviews'));
    }

    public function destroy(Review $review){
        $review->delete();
        return back();
    }
}