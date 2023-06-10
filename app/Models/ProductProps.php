<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductProps extends Model
{
    use HasFactory;

    protected $fillable=['key_en','key_ar','value_en','value_ar','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
