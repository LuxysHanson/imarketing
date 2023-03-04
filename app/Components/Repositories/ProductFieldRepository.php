<?php

namespace App\Components\Repositories;

use App\Models\Product;
use App\Models\ProductFields;
use Illuminate\Database\Eloquent\Model;

class ProductFieldRepository extends BaseRepository
{

    public function getModel(): Model
    {
        return new ProductFields();
    }

    public function deleteByProduct(Product $product): void
    {
        $product->fields()->delete();
    }

}
