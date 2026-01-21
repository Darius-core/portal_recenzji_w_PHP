<?php

namespace App\Http\Controllers;

use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller{
    
    //szczegóły filmów
    public function show(Director $director)
    {
        return view('directors.show', compact('director'));
    }
}