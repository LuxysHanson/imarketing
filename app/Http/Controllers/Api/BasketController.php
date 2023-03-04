<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\BasketRepository;
use App\Http\Requests\BasketCreateRequest;
use App\Http\Requests\BasketUpdateRequest;
use App\Http\Resources\BasketResource;
use App\Models\Basket;

class BasketController extends BaseController
{
    /**
     * @var BasketRepository
     */
    private $repository;

    public function __construct(BasketRepository $basketRepository)
    {
        $this->repository = $basketRepository;
    }

    public function store(BasketCreateRequest $request, Basket $basket)
    {
        $this->repository->dataStorage($request, $basket);
        return $this->sendResponse(new BasketResource($basket), 'Product added.');
    }

    public function update(BasketUpdateRequest $request, Basket $basket)
    {
        $this->repository->dataStorage($request, $basket);
        return $this->sendResponse(new BasketResource($basket), 'Product updated.');
    }

    public function destroy(Basket $basket)
    {
        $this->repository->delete($basket);
        return $this->sendResponse([], 'Product deleted.');
    }

}
