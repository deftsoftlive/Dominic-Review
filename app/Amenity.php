<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Amenity extends Model
{
    use Sluggable;
    

    protected $fillable = [
        'name', 'description', 'slug', 'image', 'status', 'type'
    ];

    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
