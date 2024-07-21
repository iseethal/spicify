<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $table = 'coupons';

    protected $fillable = [

        'product_id',
        'coupon_name',
        'coupon_limit',
        'coupon_code',
        'discount',
        'valid_from',
        'valid_to',
        'status',
        'used_coupons',
        'created_at',

    ];

    public $timestamps = false;
}
