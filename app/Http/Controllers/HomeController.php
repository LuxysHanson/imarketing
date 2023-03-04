<?php

namespace App\Http\Controllers;

use App\Components\Repositories\ProductRepository;

class HomeController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    public function index()
    {
        $products = $this->repository->getListByPagination();
        return view('home')->with('products', $products);
    }

}
