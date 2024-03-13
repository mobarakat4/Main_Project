<?php

namespace App\Http\Controllers\Web\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\ResetEmailRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Mail\User\ResetPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        
        Mail::to($request->email)->send(new ResetPassword($request->email));
        return redirect()->route('show_login_page')->with('success', 'we sent you reset password link');;
    }
    public function show_resetPassowrd_page(){
    
        return view('user.auth.reset-password');
    }
    public function resetPassowrd(ResetPasswordRequest $request){

        $user=User::where('email',$request->email)->first();
        if(!$user){
        return  redirect()->route('show_login_page')->with(['error'=>'error no such user']);
        }
        $user->password=bcrypt($request->password);
        $user->save();

        return redirect()->route('show_login_page')->with(['success'=>'password reset successfully']);
    }
    public function login(LoginRequest $request){
       
        if(auth()->guard('user')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {
           return redirect()->route('user.home'); 
        
        }else{
        
        return redirect()->route('show_login_page')->with(['error' => 'عفوا بيانات تسجيل الدخول غير صحيحة !!']);
        
        }
    }
    public function logout(){
        auth()->guard('user')->logout();
        return redirect()->route('user.login');
    }
   
}
