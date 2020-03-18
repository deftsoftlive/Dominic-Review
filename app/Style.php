<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Style extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'title', 'description', 'image', 'status', 'user_id', 'added_by'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
