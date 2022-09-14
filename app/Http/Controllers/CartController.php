<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

    public function addCart($id){
        // Session::remove('cart');
        // return 1;


        if(Session::has('cart')){
            $cart = Session::get('cart');
            
            $cart[] = $id;
            $new_cart = $cart;
            // return $new_cart;
            
            Session::put('cart', $new_cart);

            return redirect('/cart')->with('status', 'Sugoi!! Manga Added to cart');
        } else {
            $cart = [$id];
            Session::put('cart', $cart);
            return redirect('/cart')->with('status', 'Sugoi!! Manga Added to cart');
        }

        

    }

    public function show(){
        $cart = Session::get('cart');
        $total = 0;
        $manga = [];
        foreach($cart as $item){
            $x = Manga::find($item);
            $manga[] = $x;
            $total +=$x->price;
        }
        // return $manga;
        return view('cart', compact('manga', 'total'));
    }
    
}
