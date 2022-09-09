<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
// Route::group(['middleware' => 'isAdmin'], function () {
//     
// });

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});


Route::get('/register',[RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class, 'create'])->middleware('guest');

Route::get('/login',[LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'create'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'create'])->name('logout');

Route::get('/cart',[CartController::class, 'show'])->name('cart');
