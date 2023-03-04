<?php

namespace App\Components\Services;

use App\Components\Repositories\BasketRepository;
use App\Components\Repositories\OrderProductRepository;
use App\Models\Order;

class OrderService
{

    /**
     * @var BasketRepository
     */
    private $basketRepository;

    /**
     * @var OrderProductRepository
     */
    private $orderProductRepository;

    public function __construct(
        BasketRepository $basketRepository,
        OrderProductRepository $orderProductRepository
    )
    {
        $this->basketRepository = $basketRepository;
        $this->orderProductRepository = $orderProductRepository;
    }

    public function makingAnOrder(Order $order): bool
    {

        $basket = $this->basketRepository->getListProducts();
        if ($basket->isEmpty())
            return false;

        foreach ($basket as $item) {
            $this->orderProductRepository->create($item, $order);
        }

        // очисщаем корзину
        $this->basketRepository->clearCartByIds($basket->pluck('id'));
        return true;
    }

}
