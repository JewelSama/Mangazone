<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show(){
        return view('admin.dashboard');
    }
    public function showUsers(){
        $users = User::get();
        return view('admin.usersTable', [
            'users' => $users
        ]);
    }
    public function showManga(){
        return view('admin.mangaTable');
    }
    public function payments(){
        return view('admin.billing');
    }
}
