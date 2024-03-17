<?php

namespace App\Http\Controllers\Web\User;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //

    public function store(Request $request ,$id){
        
        $data=[
            'rating'=>$request->rating,
            'comment'=>$request->comment,
            'user_id'=>auth()->user()->id,
            'product_id'=> $id

        ];
        Rating::create($data);
        return back();

    }
}
