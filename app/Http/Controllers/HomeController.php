<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{

    public function index()
    {

        $products = Product::query()->with('category')->paginate(6);

        return view('home', [
            'products' => $products
        ]);
    }

}
