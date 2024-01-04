<?php

use App\Http\Controllers\V1\CategoryController;
<<<<<<< HEAD
use App\Http\Controllers\V1\ProductController;
=======
use App\Http\Controllers\V1\OrderController;
>>>>>>> create-order
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::apiResources([
    'categories' => CategoryController::class,
    'products'  => ProductController::class,
]);
=======
Route::get('/categories', [CategoryController::class, 'index']);

Route::post('/order', [OrderController::class,'store']);
>>>>>>> create-order

