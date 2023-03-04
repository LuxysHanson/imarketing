<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BasketController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductFieldController;
use Illuminate\Support\Facades\Route;

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

// Получить текущего пользователя
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['middleware' => ['json.response']], function () {

    // Корзина
    Route::post('/basket', [BasketController::class, 'store']);
    Route::match(['put', 'patch'],'/basket/{basket}', [BasketController::class, 'update']);
    Route::delete('/basket/{basket}', [BasketController::class, 'destroy']);

    // Авторизация/Регистрация
    Route::post('/auth/login', [AuthController::class, 'loginUser']);
    Route::post('/auth/register', [AuthController::class, 'createUser']);

    // Категории
    Route::get('/category', [CategoryController::class, 'index']);

    // Товары
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/{product:slug}', [ProductController::class, 'show']);

    Route::post('/product/fields', [ProductFieldController::class, 'store']);
    Route::delete('/product/fields/{product:id}', [ProductFieldController::class, 'destroy']);

    // Заказы
    Route::middleware('auth:sanctum')->get('/order', [OrderController::class, 'index']);
    Route::post('/order', [OrderController::class, 'store']);

});
