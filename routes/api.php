<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//category
Route::get('/category/search', [CategoryApiController::class, 'search'])->middleware('auth:sanctum');
Route::get('/category', [CategoryApiController::class, 'index'])->middleware('auth:sanctum');
Route::post('/category', [CategoryApiController::class, 'store'])->middleware('auth:sanctum');
Route::delete('/category/{id}', [CategoryApiController::class, 'destroy'])->middleware('auth:sanctum');
Route::get('/category/{id}', [CategoryApiController::class, 'show'])->middleware('auth:sanctum');
Route::put('/category/{id}', [CategoryApiController::class, 'update'])->middleware('auth:sanctum');

//product
Route::get('/product/search', [ProductApiController::class, 'search']);
Route::apiResource('/product', ProductApiController::class);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
