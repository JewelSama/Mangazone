<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        return view('admin.dashboard');
    }
    public function showUsers(){
        return view('admin.usersTable');
    }
    public function showManga(){
        return view('admin.mangaTable');
    }
    public function payments(){
        return view('admin.billing');
    }
}
