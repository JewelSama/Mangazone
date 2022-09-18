<?php

namespace App\Http\Controllers;

use App\Models\Manga;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;

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
    public function removeCart($id){
        $cart = Session::get('cart');
        // $n_cart = array_filter($cart,  function($x) use(&$id){
        $n_cart = array_filter($cart,   function($x) use($id){
            return $x !== $id;
        });
        // $n_cart = Arr::where($cart, function($x) use($id){
        //     return $cart['id'] == $id;

        // });
        // $n_cart = collect($cart)->where($cart !== $id)->all();
        // $n_cart = array_filter($cart, function ($item) {
        //     return $item !== $id;
        // });
        
        // print_r($id);
        Session::put('cart', $n_cart);
        return back()->with('status', 'Manga removed from cart');
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
        Session::put('total', $total);
        
            
            // $cart[] = $id;
            // $new_cart = $cart;
            // return $new_cart;
            
            // Session::put('cart', $new_cart);
        // return $manga;
        return view('cart', compact('manga', 'total'));
    }
    
    public function pay(Request $req){
        $total = Session::get('total');
        
        
        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.getenv('Paystack_SECRET'),
            'Content-Type' => 'application/json'
        ])->post('https://api.paystack.co/transaction/initialize', [
            "email" => auth()->user()->email,
            'amount' => intval($total) * 100,
            'callback_url' => getenv('APP_URL').'/verify' 
        ]);

        Session::put('trx_ref', $response['data']['reference']);
        return redirect($response['data']['authorization_url']);
    }
    public function verif(){
        $ref = Session::get('trx_ref');
        Order::create([
            'reference' => $ref,
            'trx_ref' => $ref,
        ]);
        return back()->with('status', 'Payment Confirmed! Arigatou💖');
    }
    
}
