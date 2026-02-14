<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'total_amount',
        'status',
        'items',
    ];

    /**
     * This is the "Magic" part. 
     * It tells Laravel: "When you see 'items', treat it as an array, not a string."
     */
    protected $casts = [
        'items' => 'array',
    ];
}