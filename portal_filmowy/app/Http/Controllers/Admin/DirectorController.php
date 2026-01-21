<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller{
    public function index(){
        return view('admin.directors.index', [
            'directors' => Director::paginate(10)
        ]);
    }

    public function store(Request $request){
        Director::create($request->validate(['first_name' => 'required']));
        return back();
    }

    public function destroy(Director $director){
        $director->delete();
        return back();
    }
}