<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFieldsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'width' => $this->faker->randomFloat(2, 10, 30). ' м',
            'height' => $this->faker->randomFloat(2, 1, 5). ' м',
            'weight' => $this->faker->randomFloat(2, 50, 600). ' г',
            'color' => $this->faker->colorName()
        ];
    }
}
