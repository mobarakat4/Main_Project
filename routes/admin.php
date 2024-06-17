<?php

use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\ProductController;
use Illuminate\Support\Facades\Route;



Route::get('/',[DashboardController::class,'index'])->name('dashboard');
Route::get('/products',[ProductController::class,'index'])->name('admin.product.index');
Route::get('/products/create',[ProductController::class,'create'])->name('admin.product.create');