<?php

namespace App\Http\Controllers;

use App\Components\Repositories\BasketRepository;

class BasketController extends Controller
{
    /**
     * @var BasketRepository
     */
    private $repository;

    public function __construct(BasketRepository $basketRepository)
    {
        $this->repository = $basketRepository;
    }

    public function index()
    {
        $basket = $this->repository->getList();
        return view('basket.index')->with('basket', $basket);
    }

    public function clear()
    {
        $this->repository->clearCart();
        return redirect()
            ->route('basket.index')
            ->with('message', 'Корзина успешно очистилась!');
    }

}
