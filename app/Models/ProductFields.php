<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFields extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'width',
        'height',
        'weight',
        'color'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
