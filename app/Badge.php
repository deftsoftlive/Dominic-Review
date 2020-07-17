<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Badge extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'name', 'description', 'image', 'end_date', 'points', 'status', 'sort', 'created_at', 'updated_at'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
