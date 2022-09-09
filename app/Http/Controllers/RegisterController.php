<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show(){
        return view('register');
    }
    public function create(Request $request){
        $this->validate($request, [
            'username'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'password'=> 'required|confirmed',
        ]);

        User::create([
            'username'=>$request->username,
            'email'=> $request->email,
            'password'=>Hash::make($request->password)
        ]);

        //Log in user
        auth()->attempt($request->only('email', 'password'));

        return redirect()->route('home');
    }
}
