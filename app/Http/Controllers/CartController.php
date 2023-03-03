<?php

namespace App\Http\Controllers;

use App\Models\Basket;

class CartController extends Controller
{

    public function index()
    {

        $basket = Basket::query()
            ->with([
                'product' => function ($q) {
                    $q->with('fields');
                }
            ])
            ->byUser()
            ->get();

        return view('cart.index')->with('basket', $basket);
    }

    public function clear()
    {
        Basket::query()->byUser()->delete();
        return redirect()->route('cart.index')->with('message', 'Корзина успешно очистилась!');
    }

}
