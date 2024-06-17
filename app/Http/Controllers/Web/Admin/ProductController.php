<?php

namespace App\Http\Controllers\Web\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        return view('admin.products.index',compact('products'));
    }
    public function create(){
        $cats = Category::select('id','name')->get();
        // dd($cats);
        return view('admin.products.create',compact('cats'));
    }
}
