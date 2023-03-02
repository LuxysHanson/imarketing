<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{

    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        var_dump(Category::all()->random());die();
        return [
            'title' => $this->faker->sentence(2),
            'parent_id' => null
        ];
    }
}
