<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [

        'category_id',
        'product_name',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;
}
