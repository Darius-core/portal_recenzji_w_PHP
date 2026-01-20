<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller{
    public function index(){
        $users = User::with('roles')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function show(User $user){
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user){
        $roles = Role::all();
        return view('admin.users.edit', compact('user','roles'));
    }

    public function update(Request $request, User $user){
        
        // zabezpieczenie przed samodegradacją
        if ($user->id === Auth::id()){
            return back()->withErrors('Nie możesz zmienić własnych ról');
        }

        $request->validate([
            'roles' => 'required|array'
        ]);

        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index')->with('success','Role użytkownika zaktualizowane');

    }

    public function toggle(User $user){
        if ($user->id === Auth::id()){
            return back()->withErrors('Nie możesz zablokować samego siebie');
        }

        $user->update([
            'is_active'=> ! $user->is_active
        ]);

        return back()->with('success','Status użytkownika zmieniony');

    }

}