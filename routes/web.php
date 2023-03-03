<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Главная страница
Route::get('/', [HomeController::class, 'index'])->name('home');

// Просмотр продукта
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');

// Просмотр профиля
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

// Корзина
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Заказы
Route::get('/order/create', [OrderController::class, 'create'])->name('order.create');
Route::post('/order/store', [OrderController::class, 'store'])->name('order.store');

// Авторизация пользователей
Auth::routes();
