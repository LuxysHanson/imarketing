<?php

use App\Http\Controllers\Api\BasketController;
use Illuminate\Http\Request;
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

Route::post('/basket', [BasketController::class, 'store']);
Route::match(['put', 'patch'],'/basket/{basket}', [BasketController::class, 'update']);
Route::delete('/basket/{basket}', [BasketController::class, 'destroy']);
