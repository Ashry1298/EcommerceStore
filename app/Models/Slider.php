<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;
    protected $fillable = [
        'small_title_ar',
        'small_title_en',
        'big_title_ar',
        'big_title_en',
        'image'
    ];

    protected function smallTitle(): Attribute
    {
        return Attribute::make(
            get: function () {
                $title = 'small_title_' . app()->getLocale();
                return $this->$title;
            },
        );
    }
    protected function bigTitle(): Attribute
    {
        return Attribute::make(
            get: function () {
                $title = 'big_title_' . app()->getLocale();
                return $this->$title;
            },
        );
    }
}
