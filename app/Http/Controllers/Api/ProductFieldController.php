<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\ProductFieldRepository;
use App\Components\Repositories\ProductRepository;
use App\Http\Requests\ProductFieldRequest;
use App\Http\Resources\ProductFieldsResource;
use App\Models\Product;
use App\Models\ProductFields;

class ProductFieldController extends BaseController
{
    /**
     * @var ProductFieldRepository
     */
    private $repository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(
        ProductFieldRepository $productFieldRepository,
        ProductRepository $productRepository
    )
    {
        $this->repository = $productFieldRepository;
        $this->productRepository = $productRepository;
    }

    public function store(ProductFieldRequest $request, ProductFields $model)
    {
        $this->repository->storage($request, $model);
        return $this->sendResponse(new ProductFieldsResource($model), 'Product fields added.');
    }

    public function destroy(int $productId)
    {

        /** @var Product $product */
        $product = $this->productRepository->oneById($productId);
        if (!$product) {
            return $this->sendError('Product does not exist.');
        }

        $this->repository->deleteByProduct($product);
        return $this->sendResponse([], 'Product field deleted.');
    }

}
