<?php

namespace App\Models;

use App\Components\Traits\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory, Customer;

    protected $table = 'basket';

    protected $fillable = [
        'product_id',
        'price',
        'quantity'
    ];

    protected $hidden = [
        'id',
        'user_id',
        'session_id',
        'updated_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
