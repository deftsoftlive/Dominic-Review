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
        'slug', 'title', 'description', 'season', 'type', 'subtype', 'level',  'age', 'session_date', 'location', 'day_time', 'more_info', 'player', 'price', 'early_birth_price', 'status', 'booking_slot', 'age_group', 'bottom_section', 'linked_coach', 'coach_cost', 'venue_cost' , 'equipment_cost', 'other_cost', 'tax_cost', 'badges', 'sort'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
