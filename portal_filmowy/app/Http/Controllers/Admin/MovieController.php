<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;

class MovieController extends Controller{
    public function index(){
        $movies = Movie::paginate(10);
        return view('admin.movies.index', compact('movies'));
    }

    public function create(){
        return view('admin.movies.create', [
            'actors' => Actor::all(),
            'directors' => Director::all(),
        ]);
    }

    public function store(Request $request){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required|integer',
            'poster' => 'nullable|image',
            'actors' => 'array',
            'directors' => 'array'
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->poster->store('posters', 'public');
        }

        $movie = Movie::create($data);
        $movie->actors()->sync($data['actors'] ?? []);
        $movie->directors()->sync($data['directors'] ?? []);

        return redirect()->route('admin.movies.index');
    }

    public function edit(Movie $movie){
        return view('admin.movies.edit', [
            'movie' => $movie,
            'actors' => Actor::all(),
            'directors' => Director::all(),
        ]);
    }

    public function update(Request $request, Movie $movie){
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'release_year' => 'required|integer'
        ]);

        $movie->update($data);
        $movie->actors()->sync($request->actors ?? []);
        $movie->directors()->sync($request->directors ?? []);

        return redirect()->route('admin.movies.index');
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return back();
    }
}