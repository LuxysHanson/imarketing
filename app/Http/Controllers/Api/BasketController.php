<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasketRequest;
use App\Models\Basket;

class BasketController extends Controller
{

    public function store(BasketRequest $request, Basket $basket)
    {

        $basket->loadData();
        $basket->fill($request->validated());
        $basket->save();

        return response()->json($basket);
    }

    public function remove(int $product_id)
    {
        Basket::query()->where('product_id', $product_id)->delete();
        return response(null, 204);
    }

}
