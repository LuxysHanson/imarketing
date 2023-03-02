<?php

namespace App\Http\Controllers;

use App\Models\Basket;

class BasketController extends Controller
{

    public function index()
    {

        $basket = Basket::query()
            ->selectRaw('product_id, SUM(price) as price, SUM(total_count) as total_count')
            ->groupBy(['product_id'])
            ->with('product')
            ->byUser()
            ->get();

        return view('basket.index')->with('basket', $basket);
    }

    public function clear()
    {
        Basket::query()->byUser()->delete();
        return redirect()->route('basket.index')->with('message', 'Корзина успешно очистилась!');
    }

}
