<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Vouchure extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'title', 'start_date', 'end_date', 'uses', 'discount_type', 'amount', 'flat_discount', 'courses', 'camps', 'products', 'status', 'created_at', 'updated_at'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
