<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(5)->create();
        Category::factory()->count(5)->state(new Sequence(
            function () {
                return [
                    'parent_id' => Category::all()->random()
                ];
            }
        ))->create();
        Category::factory()->count(5)->state(new Sequence(
            function () {
                return [
                    'parent_id' => Category::query()->whereNotNull('parent_id')->get()->random()
                ];
            }
        ))->create();
    }
}
