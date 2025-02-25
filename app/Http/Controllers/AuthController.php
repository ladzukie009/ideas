<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // registration
    public function register() {
        return view('auth.register');
    }

    public function store() {
        $validate = request()->validate([
            'name' =>'required|min:3|max:40',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|confirmed|min:8'
        ]);

        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password'])
        ]);

        return redirect()->route('dashboard')->with('success','Account created successfully!');
    }

    // login
    public function login() {
        return view('auth.login');
    }

    public function authenticate() {

        $validate = request()->validate([
            'email' =>'required|email',
            'password' =>'required|min:8'
        ]);

        if(auth()->attempt($validate)) {
            request()->session()->regenerate(); //clear the previous session
            return redirect()->route('dashboard')->with('success','Logged in successfully!');
        }
        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found with the provided email and password'
        ]);
    }

    // logout
    public  function logout() {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success','Logged out successfully!');
    }


}
