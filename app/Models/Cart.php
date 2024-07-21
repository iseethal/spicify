<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [

        'user_id',
        'variant_option_id',
        'product_name',
        'image',
        'quantity',
        'amount',
        'total_amount',
        'is_coupon_applied',
        'buy_now',

    ];

    public $timestamps = false;
}
