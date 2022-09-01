<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('categories', CategoryController::class);
Route::apiResource('products', ProductController::class);
Route::post('carts/products/{product}', [CartController::class, 'addTocart']);
Route::get('carts', [CartController::class, 'index']);
Route::post('order', [OrderController::class, 'store']);
Route::get('order/{order}', [OrderController::class, 'show']);


