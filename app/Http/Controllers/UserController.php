<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function register() {
        return view('auth.register');
    }

    function store(UserRequest $request) {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        return redirect()->route('loginForm')->with('success', 'User has been registered successfully!');
    }

    function loginForm() {
        return view('auth.login');
    }

    function login(LoginRequest $request) {
        if(Auth::attempt($request->validated())){
            return redirect('home');
        }else{
            return redirect()->back()->withErrors('Please enter correct credentials!'); //it throws in session error.
        }
    }

    function home() {
        // $auth = auth()->user();
        // return "Welcome! You are logged in ". $auth->name;
        return view('auth.home');
    }

    function logout() {
        Auth::logout();
        return redirect()->route('loginForm')->with('success', 'Logged out successfully!');
    }
}
