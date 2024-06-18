<?php

use App\Http\Controllers\Web\User\CartController;
use App\Http\Controllers\Web\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\User\CategoryController;
use App\Http\Controllers\Web\User\OrderController;
use App\Http\Controllers\Web\User\ProductController;
use App\Http\Controllers\Web\User\RatingController;
use App\Http\Controllers\Web\User\SearchController;
use App\Http\Controllers\Web\User\UserController;
use App\Http\Controllers\Web\User\ChatController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['auth:user','verified'])->group(function () {
    Route::get('/', function () {
        return view('user.welcome');
    })->name('user.home');
    Route::get('/category',[CategoryController::class,'index'])->name('category.index');
    //all products
    Route::get('/products',[ProductController::class,'index'])->name('product.index');
    //product details
    Route::get('/products/{id}',[ProductController::class,'show'])->name('products.show');
    //all product in one cart
    Route::get('/cart',[CartController::class,'index'])->name('cart.index');
    //profile details
    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::put('/profile',[UserController::class,'update'])->name('profile.update');
    Route::put('/profile/image',[UserController::class,'updateImage'])->name('profile.update.image');
    //chat
    Route::post('/chat', [ChatController::class, 'sendMessage']);
    //serech
    Route::get('search',[SearchController::class,'index'])->name('user.search');

    //test
    Route::get('/info',function(){
        dd(auth()->user()->username);
    });
    //cart
    Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
    Route::delete('/cart/{productId}', [CartController::class,'removeFromCart'])->name('cart.remove');
    //order
    Route::get('order/create',[OrderController::class,'create'])->name('order.create');
    Route::post('order/checkout',[OrderController::class,'checkout'])->name('order.checkout');
    Route::get('/success', [OrderController::class, 'success'])->name('checkout.success');
    Route::get('/cancel', [OrderController::class, 'cancel'])->name('checkout.cancel');
    //rating
    Route::post('rate/{id}',[RatingController::class,'store'])->name('rate.store');



    //logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('user.logout');
});


// for guest requests
Route::middleware('guest:user')->group(function () {
    //login
    Route::get('/login',[LoginController::class,'show_login_page'])->name('show_login_page');
    Route::post('/login',[LoginController::class,'login'])->name('user.login');
    //end login

    //register
    Route::get('/register',[LoginController::class,'show_register_page'])->name('show_register_page');
    Route::post('/register',[LoginController::class,'register'])->name('user.register');
    //end register

    //start reset password
    Route::get('/forgot-password',[LoginController::class,'show_forgotPassowrd_page'])->name('show_forgotPassword_page');

    Route::post('/send-forgot-password',[LoginController::class,'send_forgotPassowrd_email'])->name('send.forgotPasswordEmail');

    Route::get('/reset-password',[LoginController::class,'show_resetPassowrd_page'])->middleware('signed')->name('show_resetPassword_page');

    Route::post('/reset-password',[LoginController::class,'resetPassowrd'])->name('user.resetPassword');
    //end reset password

    //start verify email
    Route::get('/verify/email',[LoginController::class,'verifyEmail'])->name('verify.email')->middleware('signed');
    //end verify email


});
Route::get('tester',function(){
    return view('user.test');
});
