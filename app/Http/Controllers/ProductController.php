<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{

    public function show(string $slug)
    {

        $product = Product::query()->where('slug', $slug)->firstOrFail();

        return view('products.show')->with('product', $product);
    }

}
