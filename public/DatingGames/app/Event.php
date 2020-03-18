<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Event extends Model
{
    use Sluggable;
	use SluggableScopeHelpers;
	protected $fillable = [
	   'name', 'venue_id', 'slug', 'event_date', 'event_time', 'price', 'min_age', 'max_place', 'max_age','max_place', 'event_type', 'event_duration', 'male_availability', 'female_availability', 'status', 'event_description'
	];

	public function sluggable() {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}
	public function bookings()
    {
        return $this->hasMany('App\Booking');
    }
    public function venue()
    {
        return $this->belongsTo('App\Venue');
    }
}
