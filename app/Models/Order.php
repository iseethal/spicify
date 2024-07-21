<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [

        'user_id',
        'transaction_id',
        'tax',
        'total',
        'order_date',
        'order_status',
        'order_notes',
        'billing_firstname',
        'billing_lastname',
        'billing_email',
        'billing_email',
        'billing_address1',
        'billing_address2',
        'billing_city',
        'billing_state',
        'billing_city',
        'billing_zip_code',
        'shipping_name',
        'shipping_country',
        'shipping_address1',
        'shipping_address2',
        'shipping_town',
        'shipping_state',
        'shipping_zipcode',
        'phone',
        'created_at',
        'country',

    ];

    public $timestamps = false;
}
