<?php

use App\Http\Controllers\Web\User\CartController;
use App\Http\Controllers\Web\User\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\User\CategoryController;
use App\Http\Controllers\Web\User\ProductController;
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
Route::get('/category',[CategoryController::class,'index']);
Route::get('/products',[ProductController::class,'index']);
Route::get('/cart',[CartController::class,'index']);
Route::get('/info',function(){
    dd(auth()->user()->username);
});
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('add-to-cart');
Route::delete('/cart/{productId}', [CartController::class,'removeFromCart'])->name('cart.remove');
Route::get('/logout', [LoginController::class, 'logout']);
});

Route::middleware('guest:user')->group(function () {
    Route::post('/login',[LoginController::class,'login'])->name('user.login');
    Route::get('/login',[LoginController::class,'show_login_page'])->name('show_login_page');
    // Route::get('/login', [LoginController::class, 'show_login_page'])->name('admin.show_login_page');
    // Route::post('/login', [LoginController::class, 'login'])->name('admin.login');
});