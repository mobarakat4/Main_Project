<?php

namespace App\Http\Controllers\Api\User;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(RegisterRequest $request){
        $request->validated();
        $userdata=[
            'name' => $request->name,
            'username'=> $request->username,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ];
        $user  = User::create($userdata);
        $token = $user->createToken('forumapp',['role:user'])->plainTextToken;
        return response([
            'message'=> 'register success',
            'user'=> $user,
            'token'=> $token,
        ],200);
    }
    public function login(LoginRequest $request){
        $request->validated();
        $user = User::where('username', $request->username)->first();
        if(!$user||!Hash::check($request->password, $user->password )){
            return response([
                'message'=> 'invalid',
            ],422);
        }
        //create token for user that login
        $token = $user->createToken('forumapp', ['role:user'])->plainTextToken;
        return response([
            'message'=> 'login success',
            'user'=> $user,
            'token'=> $token,
        ],200);
    }
    public function logout()
    {
       
    
        $user = Auth::user();
    
        // Revoke all user's tokens
        $user->tokens()->delete();
    
        // Log the user out
        Auth::guard('web')->logout();
    
    
    
        return response(['message'=> 'logout success']);
    
    }
}
