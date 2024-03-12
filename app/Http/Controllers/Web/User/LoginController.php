<?php

namespace App\Http\Controllers\Web\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\ResetEmailRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login_page(){
        return view('user.auth.login');
    }
    public function show_register_page(){
        return view('user.auth.register');
    }
    public function show_forgotPassowrd_page(){
        return view('user.auth.forgotPassword');
    }
    public function send_forgotPassowrd_email(ResetEmailRequest $request){
       dd($request->all());
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
