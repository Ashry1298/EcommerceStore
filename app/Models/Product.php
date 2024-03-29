<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'name_en',
        'name_ar',
        'price',
        'main_image',
        'desc_en',
        'desc_ar',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function props()
    {
        return $this->hasMany(ProductProps::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }


    protected function name(): Attribute
    {
        return Attribute::make(
            get: function () {
                $name = 'name_' . app()->getLocale();
                return $this->$name;
            },
        );
    }
 
    protected function desc(): Attribute
    {
        return Attribute::make(
            get: function () {
                $desc = 'desc_' . app()->getLocale();
                return $this->$desc;
            },
        );
    }

    public function sizes()
    {
        return $this->belongsToMany(CategorySize::class, 'product_size', 'product_id', 'category_size_id');
    }
    public function cartItem()
    {
        return $this->hasMany(CartItems::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
