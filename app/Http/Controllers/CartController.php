<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function show(){
        return view('cart');
    }

    public function addCart($id){
        if(Session::has('cart')){
            $cart = Session::get('cart');
            array_push($cart, $id);
            // dd($cart);
            return back()->with('status', 'Oii!! Manga already in cart');
        } else {
            $cart = [$id];
            Session::put('cart', $cart);
            return redirect('/cart')->with('status', 'Sugoi!! Manga Added to cart');
            dd($cart);
        }

    }

    
}
