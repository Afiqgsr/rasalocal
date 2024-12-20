<?php


use App\Http\Controllers\MenusController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\MenuController as ApiController;
use App\Http\Controllers\Api\MenuController;
use App\Models\User; //tidak di pakai yah
use App\Http\Controllers\ProductController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('menus', ApiController::class);

Route::post('login', [AuthController::class, 'login']); // Endpoint login
Route::apiResource('products', ProductController::class); // Endpoint CRUD Produk
Route::put('products/{id}', [ProductController::class,'update']);