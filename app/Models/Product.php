<?php

namespace App\Models;

use App\Components\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, Filterable;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'price'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fields()
    {
        return $this->hasOne(ProductFields::class);
    }

    public function hasCart()
    {
        return $this->hasOne(Basket::class);
    }

    public function shortDescription(): string
    {
        return mb_substr($this->description, 0, 147). '...';
    }

}
