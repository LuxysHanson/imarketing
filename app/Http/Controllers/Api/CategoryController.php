<?php

namespace App\Http\Controllers\Api;

use App\Components\Repositories\CategoryRepository;
use App\Http\Resources\CategoryCollection;

class CategoryController extends BaseController
{
    /**
     * @var CategoryRepository
     */
    private $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function index()
    {

        $categoryTree = $this->repository->getTree();
        $response = new CategoryCollection($categoryTree);

        return $this->sendResponse($response, 'Posts fetched.');
    }

}
