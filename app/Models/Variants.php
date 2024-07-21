<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variants extends Model
{
    use HasFactory;

    protected $table = 'variants';

    protected $fillable = [

        'category_id',
        'name',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;

}
