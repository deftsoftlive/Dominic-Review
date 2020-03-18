<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ServiceAprovalProcess extends Model
{
	protected $fillable = [
        'parent', 'user_id', 'vendor_service_id', 'key', 'keyValue'
    ];
}
