<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class StripeAccount extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'account_name', 'slug', 'acc_holder_name', 'secret_key', 'public_key', 'client_key', 'created_at', 'updated_at'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'account_name'
            ]
        ];
    }
}
