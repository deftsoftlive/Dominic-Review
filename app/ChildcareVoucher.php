<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class ChildcareVoucher extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'provider_name', 'provider_code', 'status', 'created_at', 'updated_at'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'provider_name'
            ]
        ];
    }
}
