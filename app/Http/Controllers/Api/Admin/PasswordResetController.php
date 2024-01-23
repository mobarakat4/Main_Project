<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ResetEmailRequest;
use App\Http\Requests\Admin\ResetPasswordRequest;
use App\Mail\ResetPasswordLink;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;


class PasswordResetController extends Controller
{
    public function sendRestLinkEmail(ResetEmailRequest $request){
        $url=URL::temporarySignedRoute('password.reset',now()->addMinutes(30),['email'=>$request->email]);
        // $url=str_replace(env('APP_URL'),env('FRONTEND_URL'),$url);
        
        Mail::to($request->email)->send(new ResetPasswordLink($url));

        return response(['message'=>'reset link sent to your email']); 
        
    }
    public function reset(ResetPasswordRequest $request){
        $user=Admin::where('email',$request->email)->first();
        if(!$user){
        return  response(['message'=>'error no such Admin'],401);
        }
        $user->password=bcrypt($request->password);
        $user->save();

        return response(['message'=>'password reset successfully'],200);
         
    }
}
