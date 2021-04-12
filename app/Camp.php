<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Camp extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'slug', 'account_id', 'logo', 'title', 'location', 'term', 'category', 'image', 'description', 'info_email_content', 'usefull_info', 'camp_date', 'coach_cost', 'venue_cost', 'equipment_cost', 'other_cost', 'tax_cost', 'price', 'popup_title', 'popup_subtitle', 'popup_enable', 'products', 'status', 'created_at', 'updated_at', 'banner_image',
    ];

     public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
