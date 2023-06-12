<?php

namespace App\Models;

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
        'quantity'
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
}
