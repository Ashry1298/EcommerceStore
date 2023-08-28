<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'product_id ',
        'product_name',
        'product_price',
        'sub_total',
        'quantity',
        'chosen_color',
        'chosen_size'
    ];

}
