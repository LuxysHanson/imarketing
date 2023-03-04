<?php

namespace App\Models\filters;

class ProductFilter extends QueryFilter
{

    public function title(string $title)
    {
        $this->builder->whereRaw('lower(title) LIKE ?', [
            '%'. mb_strtolower($title) .'%'
        ]);
    }

    public function slug(string $slug)
    {
        $this->builder->where('slug', $slug);
    }

    public function description(string $text)
    {
        $this->builder->where('description', 'LIKE', '%'. $text .'%');
    }

    public function categoryId(int $categoryId)
    {
        $this->builder->where('category_id', $categoryId);
    }

    public function price(int $price)
    {
        $this->builder->where('price', $price);
    }

    public function color(string $color)
    {
        $this->builder->whereRaw('lower(fields.color) LIKE ?', [
            '%'. mb_strtolower($color) .'%'
        ]);
    }

}
