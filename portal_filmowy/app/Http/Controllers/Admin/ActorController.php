<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller{
    public function index(){
        return view('admin.actors.index', [
            'actors' => Actor::paginate(10)
        ]);
    }

    public function create(){
        return view('admin.actors.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'bio'        => 'nullable|string',
            'birthday'   => 'nullable|date',
        ]);

        Actor::create($data);

        return redirect()->route('admin.actors.index')->with('success', 'Aktor dodany');
    }

    public function edit(Actor $actor){
        return view('admin.actors.edit', compact('actor'));
    }

    public function update(Request $request, Actor $actor){
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'bio'        => 'nullable|string',
            'birthday'   => 'nullable|date',
        ]);

        $actor->update($data);

        return redirect()->route('admin.actors.index')->with('success', 'Aktor zaktualizowany');
    }

    public function destroy(Actor $actor){
        $actor->delete();
        return redirect()->route('admin.actors.index')->with('success', 'Aktor usunięty');
    }
}