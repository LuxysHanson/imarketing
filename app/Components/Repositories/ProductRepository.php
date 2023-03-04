<?php

namespace App\Components\Repositories;

use App\Http\Requests\ProductRequest;
use App\Models\filters\ProductFilter;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class ProductRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new Product();
    }

    public function getListByPagination()
    {
        return $this->find()->with(['category', 'hasCart'])->paginate(6);
    }

    public function getListByFilter(ProductRequest $request)
    {
        $filter = new ProductFilter($request);
        return $this->find()
            ->join('product_fields as fields', 'products.id', '=', 'fields.product_id')
            ->filter($filter)
//            ->with('fields')
            ->get();
    }

    public function getProductBySlug(string $slug)
    {
        return $this->find()->where('slug', $slug)->first();
    }

}
