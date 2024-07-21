<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wishlist';

    protected $fillable = [

        'user_id',
        'variant_option_id',
        'product_name',
        'image',
        'quantity',
        'amount',
        'amount_id',

    ];

    public $timestamps = false;
}
