<?php

namespace App\Models;

use App\Models\queries\BasketBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Basket extends Model
{
    use HasFactory;

    protected $table = 'basket';

    protected $fillable = [
        'product_id',
        'price',
        'total_count'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'session_id',
        'updated_at'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function loadData(): void
    {
        $this->user_id = !Auth::guest() ? Auth::user()->id : null;
        $this->session_id = Session::getId();
    }

    public function newEloquentBuilder($query): BasketBuilder
    {
        return new BasketBuilder($query);
    }

}
