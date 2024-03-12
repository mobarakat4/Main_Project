<?php

use App\Http\Controllers\Web\User\CartController;
use App\Http\Controllers\Web\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\User\CategoryController;
use App\Http\Controllers\Web\User\ProductController;
use App\Http\Controllers\Web\User\UserController;

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
Route::middleware('auth:user')->group(function () {
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

//test
Route::get('/info',function(){
    dd(auth()->user()->username);
});
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::delete('/cart/{productId}', [CartController::class,'removeFromCart'])->name('cart.remove');
Route::get('/logout', [LoginController::class, 'logout']);
});
// for guest requests
Route::middleware('guest:user')->group(function () {
    Route::post('/login',[LoginController::class,'login'])->name('user.login');
    Route::get('/login',[LoginController::class,'show_login_page'])->name('show_login_page');
    Route::get('/forgot-password',[LoginController::class,'show_forgotPassowrd_page'])->name('show_forgotPassword_page');
    Route::post('/send-forgot-password',[LoginController::class,'send_forgotPassowrd_email'])->name('send.forgotPasswordEmail');
    Route::get('/register',[LoginController::class,'show_register_page'])->name('show_register_page');
    // Route::get('/login', [LoginController::class, 'show_login_page'])->name('admin.show_login_page');
    // Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});