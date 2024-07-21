<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAmountOptions extends Model
{
    use HasFactory;

    protected $table = 'product_amount_options';

    protected $fillable = [

        'product_id',
        'qty_name',
        'amount',
        'is_deleted',
    ];

    public $timestamps = false;

}