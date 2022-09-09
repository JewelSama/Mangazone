<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function create(){
        auth()->logout();
        return redirect('/')->with('status', 'YOU ARE LOGGED OUT!');
    }
}
