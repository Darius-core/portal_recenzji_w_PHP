<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\Director;
use Illuminate\Http\Request;

class ActorController extends Controller{
    public function index(){
        return view('admin.actors.index', [
            'actors' => Actor::paginate(10)
        ]);
    }

    public function store(Request $request){
        Actor::create($request->validate(['first_name' => 'required']));
        return back();
    }

    public function destroy(Actor $actor){
        $actor->delete();
        return back();
    }
}