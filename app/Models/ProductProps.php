<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductProps extends Model
{
    use HasFactory;

    protected $fillable=['key_en','key_ar','value_en','value_ar','product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    protected function key(): Attribute
    {
        return Attribute::make(
            get: function () {
                $key = 'key_' . app()->getLocale();
                return $this->$key;
            },
        );
    }
    
    protected function value(): Attribute
    {
        return Attribute::make(
            get: function () {
                $value = 'value_' . app()->getLocale();
                return $this->$value;
            },
        );
    }
}
