<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function register(){

        return view('auth.register');
    }

    public function store(){
        //validation
        $validated=request()->validate(
            [
                'name'=> 'required|min:3|max:40',
                'email'=>'required|email|unique:users,email',
                'password'=>'required|confirmed|min:6'
            ]
            );

        //create user

        $user= User::create(
            [
                'name'=>$validated['name'],
                'email'=>$validated['email'],
                'password'=>Hash::make($validated['password'])
            ]
        );

        //redirect

        return redirect()->route('dashbord')->with('success','user created successfully');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        // validation
        $validated=request()->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:6'
            ]
            );

        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect()->route('dashbord')->with('success','welcome');
        }

        return redirect()->route('login')->withErrors([
            'email'=>'no matching user and password found'
        ]);
    }

    public function logout(){
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success','log out successfully');
    }
}
