<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class PayGoCourse extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'id', 'slug', 'title', 'description', 'season', 'type', 'account_id', 'subtype', 'course_category', 'level', 'image', 'age', 'session_date', 'location', 'day_time', 'age_group', 'booking_slot', 'more_info', 'info_email_content', 'player', 'price', 'early_birth_price', 'bottom_section', 'linked_coach', 'coach_cost', 'venue_cost' , 'equipment_cost', 'other_cost', 'tax_cost', 'status', 'sort', 'end_date', 'membership_popup'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
