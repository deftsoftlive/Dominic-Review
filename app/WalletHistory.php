<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class WalletHistory extends Model
{
	use Notifiable;

    protected $fillable = [
        'id', 'user_id', 'money_amount', 'created_at', 'updated_at'
    ];
}
