<?php

namespace App\Http\Controllers\Api\User;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerificaiton;
use Illuminate\Http\Request;

class UserEmailVertifyController extends Controller
{
    public function sendEmail(){
        if(auth()->user()->email_verified_at){
            return response(['message'=>'email is already verified']);
        }
        Mail::to(auth()->user())->send(new EmailVerificaiton(auth()->user()->email));
        return response(['message'=>'email verification sent']);
    }
    public function verifyEmail(Request $request){
        if(!$request->user()->email_verified_at){
            $request->user()->forceFill([
                'email_verified_at'=>now()
            ])->save();
            
        }
        return response([
            'message'=>'email verified successfully'
        ]);
    }
}
