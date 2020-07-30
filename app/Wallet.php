<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'id', 'user_id', 'money_amount', 'created_at', 'updated_at'
    ];
}
