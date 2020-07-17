<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code', 'start_date', 'end_date', 'uses', 'discount_type', 'amount', 'flat_discount', 'courses', 'camps', 'products', 'status', 'created_at', 'updated_at'
    ];
}
