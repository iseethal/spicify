<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompareProduct extends Model
{
    use HasFactory;

    protected $table = 'compare_products';

    protected $fillable = [

        'user_id',
        'variant_option_id',
        'product_name',
        'image',
        'quantity',
        'amount',

    ];

    public $timestamps = false;
}
