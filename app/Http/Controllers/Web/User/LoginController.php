<?php

namespace App\Http\Controllers\Web\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Requests\User\ResetEmailRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Mail\User\ResetPassword;
use App\Mail\User\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    // --------------------- Login ---------------------
    public function show_login_page(){
        return view('user.auth.login');
    }
    public function login(LoginRequest $request){
        $user=User::where('username',$request->username)->first();
        // check if user exist 
        if(!$user){
            return redirect()->route('show_login_page')->with(['error'=>'invalid username']);
        }
        // check if email is verified
        if(!$user->email_verified_at){
            Mail::to($user->email)->send(new VerifyEmail($user->email));
            return to_route('user.login')->with(['error'=>'we sent you verify email,please verify first']);
            
        }
        // authenticate the user and redirect to home page
        if(auth()->guard('user')->attempt(['username'=>$request->input('username'),'password'=>$request->input('password')]))
        {
            
            return redirect()->route('user.home'); 

        
        }else{
            
            return redirect()->route('show_login_page')->with(['error' => 'عفوا بيانات تسجيل الدخول غير صحيحة !!']);
            
        }
    }

        // ---------------------register------------------
        public function show_register_page(){
            // show register page
            return view('user.auth.register');
        }
        public function register(RegisterRequest $request){
            
            $request->validated();
            $userdata=[
                'name' => $request->name,
                'username'=> $request->username,
                'email'=> $request->email,
                'password'=> bcrypt($request->password),
            ];
            $user  = User::create($userdata);
            Mail::to($request->email)->send(new VerifyEmail($request->email));
            return to_route('show_login_page')->with(['success'=>'we sent you verification link please verify']);
        
        }

    // ------------------ Forgot password ------------------
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

    

    // --------------------- verifyEmail -------------------
    public function verifyEmail(){
        $user=User::where('email',request()->email)->first();
        if(!$user->email_verified_at){
            $user->forceFill([
                'email_verified_at'=>now()
            ])->save();
            return to_route('user.login')->with(['success'=>'email verified sucessfully']);
            
        }
        return to_route('user.login')->with(['success'=>'email verified sucessfully']);
        

    }
    public function logout(){
        auth()->guard('user')->logout();
        return redirect()->route('user.login');
    }
   
}
