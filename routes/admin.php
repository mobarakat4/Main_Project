<?php

use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\LoginController;
use App\Http\Controllers\Web\Admin\ProductController;
use Illuminate\Support\Facades\Route;
Route::middleware('guest:admin')->group(function () {
    //login
    Route::get('/login',[LoginController::class,'show_login'])->name('admin.show_login');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
});
Route::middleware(['redirect'])->group(function(){

    Route::get('/',[DashboardController::class,'index'])->name('dashboard');
    Route::get('/products',[ProductController::class,'index'])->name('admin.product.index');
    Route::get('/products/create',[ProductController::class,'create'])->name('admin.product.create');
    Route::post('/products/store',[ProductController::class,'store'])->name('admin.product.store');

    //logout
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});

