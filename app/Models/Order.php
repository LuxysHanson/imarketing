<?php

namespace App\Models;

use App\Components\Traits\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory, Customer;

    protected $fillable = [
        'email',
        'phone',
        'status',
        'address',
        'delivery_type'
    ];
}
