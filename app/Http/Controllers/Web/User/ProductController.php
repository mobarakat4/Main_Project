<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // $products=DB::table('products')->get();
        $products = Product::with('category')->get();

        $cat=DB::table('categories')->get();
        // dd($products->toArray());
        
        return view('user.products',['products'=>$products,'categories'=>$cat]);

    }
}
