<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\OrderRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(){
        $cart = Cart::where('user_id' , auth()->user()->id)
        ->where('status',0)
        ->first();
        
        $products=$cart->products;
        $total=$products->sum('price');
        return view('user.create-order',compact('products','total'));
    }
    
    public function checkout(OrderRequest $request){

        return 'checkout process here';
    }

}
