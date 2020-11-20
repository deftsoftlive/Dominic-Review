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
        'slug', 'title', 'description', 'season', 'type', 'subtype', 'course_category', 'level', 'account_id', 'age', 'session_date', 'location', 'day_time', 'more_info', 'info_email_content', 'player', 'price', 'early_birth_price', 'status', 'booking_slot', 'age_group', 'bottom_section', 'linked_coach', 'coach_cost', 'venue_cost' , 'equipment_cost', 'other_cost', 'tax_cost', 'badges', 'sort', 'end_date', 'image'
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
