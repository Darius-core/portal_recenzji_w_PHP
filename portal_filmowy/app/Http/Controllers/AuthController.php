<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller{

    //formularz logowania
    public function showLogin(){
        return view('auth.login');
    }

    // logowanie
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            
            return auth()->user()->isAdmin() ? redirect()->route('admin.dashboard') : redirect()->route('movies.index');
        }

        return back()->withErrors([
            'email' => 'Niepoprawne dane logowania'
        ]);

    }

    //formularz rejestracji
    public function showRegister(){
        return view('auth.register');
    }

    // rejestracja
    public function register(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            
        ]);

        $userRole = Role::where('name', 'user')->firstOrFail();
        $user->roles()->attach($userRole->id);

        return redirect()->route('login')->with('success', 'Konto utworzone');

    }

    // wylogowanie
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');

    }

}