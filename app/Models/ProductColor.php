<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductColor extends Model
{
    use HasFactory;
    protected $fillable = ['product_id', 'color_ar', 'color_en'];
    protected function color(): Attribute
    {
        return Attribute::make(
            get: function () {
                $color = 'color_' . app()->getLocale();
                return $this->$color;
            },
        );
    }
}
