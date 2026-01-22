<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Director;
use Illuminate\Http\Request;

class DirectorController extends Controller{
    public function index(){
        return view('admin.directors.index', [
            'directors' => Director::paginate(10)
        ]);
    }

    public function create(){
        return view('admin.directors.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'bio'        => 'nullable|string',
            'birthday'   => 'nullable|date',
        ]);

        Director::create($data);

        return redirect()->route('admin.directors.index')->with('success', 'Reżyser dodany');
    }

    public function edit(Director $director){
        return view('admin.directors.edit', compact('director'));
    }

    public function update(Request $request, Director $director){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'bio'        => 'nullable|string',
            'birthday'   => 'nullable|date',
        ]);

        $director->update($data);

        return redirect()->route('admin.directors.index')->with('success', 'Reżyser zaktualizowany');
    }

    public function destroy(Director $director){
        $director->delete();
        return redirect()->route('admin.directors.index')->with('success', 'Reżyser usunięty');
    }
}