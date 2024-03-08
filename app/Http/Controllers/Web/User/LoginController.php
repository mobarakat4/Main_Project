<?php

namespace App\Http\Controllers\Web\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login_page(){
        return view('user.auth.login');
    }
    public function login(LoginRequest $request){
       
        if(auth()->guard('user')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {
           return redirect()->route('user.home'); 
        
        }else{
        
        return redirect()->route('admin.show_login_page')->with(['error' => 'عفوا بيانات تسجيل الدخول غير صحيحة !!']);
        
        }
    }
    public function logout(){
        auth()->guard('user')->logout();
        return redirect()->route('user.login');
    }
   
}
