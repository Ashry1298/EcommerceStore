<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable = ['mac', 'product_id', 'quantity', 'totPrice'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
