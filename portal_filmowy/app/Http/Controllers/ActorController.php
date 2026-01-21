<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller{
    
    //szczegóły filmów
    public function show(Actor $actor)
    {
        return view('actors.show', compact('actor'));
    }
}