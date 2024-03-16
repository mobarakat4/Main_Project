<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    //
    public function index(){
        //get all products from the user cart
        // $cart=Cart::where('user_id',auth()->user()->id)->first();
        $cart = Cart::firstOrCreate(['user_id' => auth()->user()->id]);
        
        $products=$cart->products;
        $total=$products->sum('price');
        // dd($products);
        return view('user.cart' ,['products'=>$products,'total'=>$total]);
    }
    public function addToCart(Request $request)
    {
    $cart=Cart::where('user_id',auth()->user()->id)->first();
    // Retrieve productId from the request
    // dd($request->all());
    $productId = $request->input('productId');
    if(!ProductCart::where('product_id',$productId)->first()){

        DB::table('product_cart')->insert([
            'product_id' => $productId,
            'cart_id' => $cart->id,
        ]);
    }
    return response()->json(['message' => 'Product added to cart successfully'], 200);
    
    }
    public function removeFromCart($productId)
{
    // Delete the item from the cart
    ProductCart::where('product_id', $productId)->delete();

    return response()->json(['message' => 'Item removed from cart successfully'], 200);
}
}
