<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Admin\EmailVertifyController;
use App\Http\Controllers\Api\Admin\PasswordResetController;
use App\Http\Controllers\Api\User\UserEmailVertifyController;
use App\Http\Controllers\Api\User\UserPasswordResetController;
use App\Http\Controllers\Api\User\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// if route not exist 
Route::fallback(function(){
    return response(['error'=>'404 not found'],404);
});
//for test if api work or not
Route::get('/test', function () {
    return response(['message' => 'work'], 200);
});



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    dd($request);
    return $request->user();
});
// prefix for guest admin
Route::prefix('admin')->middleware('guest:sanctum')->group(function () {
    // Route::post('register-admin', [AdminController::class, 'register'])->name('register-admin');
    Route::post('login-admin', [AdminController::class, 'login'])->name('login-admin');
    
    Route::post('password/email',[PasswordResetController::class,'sendRestLinkEmail']);
    Route::post('password/reset',[PasswordResetController::class,'reset'])->middleware('signed')->name('passwordadmin.reset');
});


// prefix for guest user  
Route::prefix('user')->middleware('guest:sanctum')->group(function () {
    Route::post('register-user', [UserController::class, 'register'])->name('register-user');
    Route::post('login-user', [UserController::class, 'login'])->name('login-user');
    Route::post('password/email',[UserPasswordResetController::class,'sendRestLinkEmail']);
    Route::post('password/reset',[UserPasswordResetController::class,'reset'])->middleware('signed')->name('passworduser.reset');
});


/**
 * 
 * 
 * 
 * 
 * 
 * 
 */


// prefix for auth admin  and verified
Route::prefix('admin')->middleware(['auth:sanctum','admin','verified'])->group(function(){
    Route::get('/testadmin', function () {
        return response(['message' => 'admin is in'], 200);
    });
    Route::get('/profile',function(){
        $admin=auth()->user();
        return response(['message'=>$admin]);
    });
    Route::get('/logout',[AdminController::class,'logout']);
    

});
Route::prefix('admin')->middleware(['auth:sanctum','admin'])->group(function(){
    Route::post('email/verify/send',[EmailVertifyController::class,'sendEmail'])->name('sendverify');
    Route::post('email/verify',[EmailVertifyController::class,'verifyEmail'])->name('verify-email');

});
/**
 * 
 * 
 * 
 * 
 * 
 */
// prefix for auth user  
Route::prefix('user')->middleware(['auth:sanctum','user','verified'])->group(function(){
    Route::get('/testuser', function () {
        return response(['message' => 'user is in'], 200);
    });
    Route::get('/profile',function(){
        $user=auth()->user();
        return response(['message'=>$user]);
    });
    Route::get('/logout',[AdminController::class,'logout']);
});
 Route::prefix('user')->middleware(['auth:sanctum','user'])->group(function(){
     Route::post('email/verify/send',[UserEmailVertifyController::class,'sendEmail'])->name('sendverify');
     Route::post('email/verify',[UserEmailVertifyController::class,'verifyEmail'])->name('verify-email');
 
 });