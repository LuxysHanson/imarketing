<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BasketCreateRequest;
use App\Http\Requests\BasketUpdateRequest;
use App\Models\Basket;

class BasketController extends Controller
{

    public function store(BasketCreateRequest $request, Basket $basket)
    {

        $basket->loadData();
        $basket->fill($request->validated());
        $basket->save();

        return response()->json($basket);
    }

    public function update(BasketUpdateRequest $request, Basket $basket)
    {
        $basket->update($request->validated());
        return response()->json($basket);
    }

    public function destroy(Basket $basket)
    {
        $basket->delete();
        return response()->json([], 204);
    }

}
