<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function show(string $slug)
    {

        $product = Product::query()
            ->where('slug', $slug)
            ->with('fields')
            ->firstOrFail();

        return view('product.show')->with('product', $product);
    }

}
