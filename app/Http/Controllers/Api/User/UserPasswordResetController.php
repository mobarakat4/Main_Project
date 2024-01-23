<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ResetEmailRequest;
use App\Http\Requests\User\ResetPasswordRequest;
use App\Mail\ResetPasswordLink;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;


class UserPasswordResetController extends Controller
{
    public function sendRestLinkEmail(ResetEmailRequest $request){
        // $request->validated();
        
        $url=URL::temporarySignedRoute('password.reset',now()->addMinutes(30),['email'=>$request->email]);
        // $url=str_replace(env('APP_URL'),env('FRONTEND_URL'),$url);
        
        Mail::to($request->email)->send(new ResetPasswordLink($url));

        return response(['message'=>'reset link sent to your email']); 
        
    }
    public function reset(ResetPasswordRequest $request){
        $user=User::where('email',$request->email)->first();
        if(!$user){
        return  response(['message'=>'error no such user'],401);
        }
        $user->password=bcrypt($request->password);
        $user->save();

        return response(['message'=>'password reset successfully'],200);
         
    }
}
