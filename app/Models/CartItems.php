<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItems extends Model
{
    use HasFactory;
    protected $fillable = [
        'sessionId',
        'identifier'
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
