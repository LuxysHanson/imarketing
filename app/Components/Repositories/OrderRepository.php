<?php

namespace App\Components\Repositories;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class OrderRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new Order();
    }

    public function getList(): Collection
    {
        return $this->find()->byUser()->get();
    }

    public function dataStorage(OrderRequest $request, Order $order): bool
    {
        if (is_null($order->id)) {
            $order->loadData();
        }

        return $this->storage($request, $order);
    }

}
