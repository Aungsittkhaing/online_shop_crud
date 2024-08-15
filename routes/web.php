<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
});
//category
Route::resource('category', CategoryController::class);
//product
Route::resource('product', ProductController::class);
//search
Route::get('search', [ProductController::class, 'search'])->name('product.search');
//customer
Route::resource('customer', CustomerController::class);
