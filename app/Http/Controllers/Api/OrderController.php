<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\OrderRepository;
use App\Components\Services\OrderService;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends BaseController
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

    public function index()
    {
        $orders = $this->repository->getList();
        return $this->sendResponse(OrderResource::collection($orders), 'Posts fetched.');
    }

    public function store(OrderRequest $request, Order $order)
    {

        DB::beginTransaction();

        if (!$this->repository->dataStorage($request, $order)) {
            DB::rollBack();
            return $this->sendError('Failed to save.', [], 500);
        }

        if (!$this->service->makingAnOrder($order)) {
            DB::rollBack();
            return $this->sendError('The basket is empty.');
        }

        DB::commit();
        return $this->sendResponse(new OrderResource($order), 'Order placed.');
    }

}
