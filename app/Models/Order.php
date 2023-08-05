<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'full_address',
        'phone',
        'email',
        'sub_total',
        'status',
        'status_notes',
        'total',
        'user_id'
    ];
}
