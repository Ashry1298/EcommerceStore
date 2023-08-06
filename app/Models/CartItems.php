<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'mac',
        'user_id',
        'product_id',
        'quantity',
        'product_price',
        'category_size_id',
        'product_color_id',
        'totPrice'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function sizes()
    {
        return $this->belongsTo(CategorySize::class);
    }
}
