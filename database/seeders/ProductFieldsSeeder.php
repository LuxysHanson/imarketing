<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductFields;
use Illuminate\Database\Seeder;

class ProductFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if ($products = Product::all()) {
            foreach ($products as $product) {
                ProductFields::factory()->createOne([
                    'product_id' => $product->id
                ]);
            }
        }
    }
}
