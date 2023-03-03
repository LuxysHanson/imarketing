<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function create(Order $order)
    {

        return view('order.create', [
            'order' => $order,
            'user' => Auth::user()
        ]);
    }

    public function store(OrderRequest $request, Order $order)
    {

        DB::beginTransaction();

        $order->loadData();
        $order->fill($request->validated());
        if (!$order->save()) {
            DB::rollBack();
            return back()->with('error', 'Произошла ошибка при оформлении!');
        }

        $basket = Basket::query()->byUser()->get();

        foreach ($basket as $item) {
            OrderProduct::query()->create([
                'product_id' => $item->product_id,
                'order_id' => $order->id,
                'quantity' => $item->quantity
            ]);
        }

        // очисщаем корзину
        Basket::query()
            ->whereIn('id', $basket->pluck('id'))
            ->byUser()
            ->delete();

        DB::commit();
        return redirect()->route('home')->with('message', 'Ваш заказ успешно оформлен!');
    }

}
