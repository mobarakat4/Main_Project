<?php

namespace App\Http\Controllers\Web\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $cat=DB::table('categories')->get();
        // dd($cat);
        return view('User.category',['categories' => $cat]);

    }
}
