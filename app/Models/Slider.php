<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
