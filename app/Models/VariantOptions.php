<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariantOptions extends Model
{
    use HasFactory;

    protected $table = 'variant_options';

    protected $fillable = [

        'category_id',
        'name',
        'image',
        'support_image1',
        'support_image2',
        'support_image3',
        'support_image4',
        'description',
        'is_featured',
        'is_active',
        'is_deleted',
    ];

    public $timestamps = false;

}
