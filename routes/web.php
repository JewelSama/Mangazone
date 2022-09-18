<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Models\Manga;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    $mangas = Manga::take(6)->get();
    $cart = Session::get('cart');
    return view('welcome', [
        "mangas" => $mangas,
        'cart' => $cart
    ]);
    
})->name('home');

Route::get('/manga/{manga}', function(Manga $manga){
    return view('single', [
        'manga' => $manga
    ]);
});

Route::get('/about', function () {
    $cart = Session::get('cart');
    return view('about', [
        'cart' => $cart
    ]);
});
Route::get('/contact', function () {
    $cart = Session::get('cart');
    return view('contact', [
        'cart' => $cart
    ]);
});
// Route::group(['middleware' => 'isAdmin'], function () {
//     
// });

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
    Route::get('/users-table', [DashboardController::class, 'showUsers'])->name('usersTable');
    Route::get('/manga-table', [DashboardController::class, 'showManga'])->name('manga');
    Route::get('/payments', [DashboardController::class, 'payments'])->name('payments');
    Route::post('/manga-create', [MangaController::class, 'store'])->name('add-manga');
    Route::get('/manga-edit/{id}', [MangaController::class, 'editManga'])->name('edit-manga');
    Route::put('/manga-edit/{manga}', [MangaController::class, 'updateManga'])->name('edit-manga');
    Route::delete('/manga-delete/{manga}', [MangaController::class, 'destroy']);
    Route::get('/orders', [MangaController::class, 'orders'])->name('orders');
});


Route::get('/register',[RegisterController::class, 'show'])->name('register')->middleware('guest');
Route::post('/register',[RegisterController::class, 'create'])->middleware('guest');

Route::get('/login',[LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login',[LoginController::class, 'create'])->middleware('guest');

Route::post('/logout', [LogoutController::class, 'create'])->name('logout');

Route::get('/cart',[CartController::class, 'show'])->name('cart');
Route::get('/add-to-cart/{id}',[CartController::class, 'addCart'])->name('add-to-cart');
Route::get('/remove-from-cart/{id}',[CartController::class, 'removeCart'])->name('remove-to-cart');
Route::post('/pay', [CartController::class, 'pay']);
Route::get('/verify', [CartController::class, 'verif']);