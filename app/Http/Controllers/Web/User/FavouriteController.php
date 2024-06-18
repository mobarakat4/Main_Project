<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class FavouriteController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Get the favourite products for the user
        $favouriteProducts = $user->favourites()->get();
        // dd($favouriteProducts);
        // Return the view with the favourite products
        return view('user.favourite', compact('favouriteProducts'));
    }

    public function toggleFavourite(Request $request, $productId)
    {
        $user = auth()->user();
        $product = Product::findOrFail($productId);

        if ($user->favourites()->where('product_id', $productId)->exists()) {
            $user->favourites()->detach($product);
            return response()->json(['status' => 'removed']);
        } else {
            $user->favourites()->attach($product);
            return response()->json(['status' => 'added']);
        }
    }
}
