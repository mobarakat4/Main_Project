<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function show_login(){
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request){
        $admin=Admin::where('username',$request->username)->first();
        // check if user exist
        if(!$admin){
            return redirect()->route('admin.show_login')->with(['error'=>'invalid username']);
        }
        // check if email is verified

        // authenticate the user and redirect to home page
        if(auth()->guard('admin')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {
            return redirect()->route('dashboard');
        }else{

            return redirect()->route('admin.show_login')->with(['error' => 'invalid credentials']);
        }
    }
    public function logout(){
        auth()->guard('admin')->logout();
        return redirect()->route('admin.show_login');
    }
}
