<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show(){
        return view('login');
    }
    public function create(Request $request){
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required'
        ]);
        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'INVALID CREDENTIALS');
        }
        auth()->attempt($request->only('email', 'password'));
        return redirect('/')->with('status', 'SIGNED IN SUCCESSFULLY');
    }
}
