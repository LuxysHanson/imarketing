<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $productTitle = implode(' ', $this->faker->words(2));

        return [
            'title' => $productTitle,
            'slug' => $this->generateSlug($productTitle),
            'description' => $this->faker->realText(),
            'category_id' => Category::query()->whereNotNull('parent_id')->get()->random()->id,
            'price' => random_int(100, 999999)
        ];
    }

    private function generateSlug(string $title): string
    {
        $slug = Str::slug($title);
        if (Product::query()->where('slug', $slug)->exists()) {
            $max = Product::query()
                ->where('title', '=', $title)
                ->latest('id')
                ->skip(1)
                ->value('slug');
            if (isset($max[-1]) && is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }
            return "{$slug}-2";
        }
        return $slug;
    }

}
