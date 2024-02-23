<?php

namespace App\Http\Controllers\Api\Admin;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\LoginRequest;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Token;
class AdminController extends Controller
{
    //the amdin doesnot need to register

    // public function register(RegisterRequest $request){
    //     $request->validated();
    //     $userdata=[
    //         'name' => $request->name,
    //         // 'username'=> $request->username,
    //         'email'=> $request->email,
    //         'password'=> Hash::make($request->password),
    //     ];
    //     $user  = Admin::create($userdata);
    //     $token = $user->createToken('forumapp')->plainTextToken;
    //     return response([
    //         'message'=> 'register success',
    //         'admin'=> $user,
    //         'token'=> $token,
    //     ],200);
    // }
    
    //make login for admin with role admin 
    public function login(LoginRequest $request){
        $request->validated();
        $admin = Admin::where('username', $request->username)->first();
        if(!$admin||!Hash::check($request->password, $admin->password )){
            return response([
                'message'=> 'invalid username or password',
            ],422);
        }
        //create token for admin with role admin
        $token = $admin->createToken('devicename', ['role:admin'])->plainTextToken;
        //response after login return admin details and token for auth
        return response([
            'message'=> 'login success',
            'admin'=> $admin,
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
