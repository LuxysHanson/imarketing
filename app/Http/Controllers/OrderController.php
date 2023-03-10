<?php

namespace App\Http\Controllers;

use App\Components\Repositories\OrderRepository;
use App\Components\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * @var OrderService
     */
    private $service;

    /**
     * @var OrderRepository
     */
    private $repository;

    public function __construct(
        OrderService $orderService,
        OrderRepository $orderRepository
    )
    {
        $this->service = $orderService;
        $this->repository = $orderRepository;
    }

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

        $orderCreate = $this->repository->dataStorage($request, $order);
        if (!$orderCreate || !$this->service->makingAnOrder($order)) {
            DB::rollBack();
            return back()->with('error', 'Произошла ошибка при оформлении!');
        }

        DB::commit();
        return redirect()->route('home')->with('message', 'Ваш заказ успешно оформлен!');
    }

}
