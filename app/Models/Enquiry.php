<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = 'enquiries';

    protected $fillable = [

        'variant_option_id',
        'type',
        'name',
        'email',
        'mobile',
        'address',
        'status',
        'is_deleted',
        'created_at',

    ];

    public $timestamps = false;
}
