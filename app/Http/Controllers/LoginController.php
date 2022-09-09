<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->role_type == 'administrator')
        {
            // return 'admin'; 
        return redirect()->route('dashboard')->with('status', 'Welcome Admin!');
            
        } else {
    
        return redirect()->route('home')->with('status', 'SIGNED IN SUCCESSFULLY');
        
        }
    }
}
