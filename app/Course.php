<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Course extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'title', 'term', 'description', 'type', 'subtype', 'age', 'session_date', 'location', 'day_time', 'more_info', 'player', 'price', 'early_birth_price', 'status', 'booking_slot', 'age_group'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
