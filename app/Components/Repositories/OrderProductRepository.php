<?php

namespace App\Components\Repositories;

use App\Models\Basket;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Model;

class OrderProductRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new OrderProduct();
    }

    public function create(Basket $basket, Order $order)
    {
        return $this->find()->create([
            'product_id' => $basket->product_id,
            'order_id' => $order->id,
            'quantity' => $basket->quantity
        ]);
    }

}
