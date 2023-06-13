<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['title_en', 'title_ar', 'logo'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    protected function title(): Attribute
    {
        return Attribute::make(
            get: function () {
                $title = 'title_' . app()->getLocale();
                return $this->$title;
            },
        );
    }
}
