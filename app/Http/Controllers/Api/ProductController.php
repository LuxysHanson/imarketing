<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\ProductRepository;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;

class ProductController extends BaseController
{
    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function index(ProductRequest $request)
    {
        $products = $this->repository->getListByFilter($request);
        return $this->sendResponse(ProductResource::collection($products), 'Posts fetched.');
    }

    public function show(string $slug)
    {

        if ($product = $this->repository->getProductBySlug($slug)) {
            return $this->sendResponse(new ProductResource($product),'Post fetched.');
        }

        return $this->sendError('Product does not exist.');
    }

}
