<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        // dd($request);
        $searchTerm = $request->search;
        $products = Product::query()
        ->select('id','name')
        ->where('name', 'like', "%$searchTerm%")
        ->orWhere('name_ar', 'like', "%$searchTerm%")
        ->orWhere('description', 'like', "%$searchTerm%")
        ->get();
        // $cats = Category::query()
        // ->select('id','name')
        // ->where('name', 'like', "%$searchTerm%")
        // ->orWhere('description', 'like', "%$searchTerm%")
        // ->get();

        // dd($products);
        return view('user.search',compact(
            // 'cats',
            'products','searchTerm'
        ));
    }
    public function search_image(){
        return redirect()->route('user.search',['search'=> 'dog']);
    }
}
