<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [

        'name',
        'phone',
        'email',
        'subject',
        'message',
        'followup',
        'show_followup',
        'is_deleted',
        'created_at',

    ];

    public $timestamps = false;
}
