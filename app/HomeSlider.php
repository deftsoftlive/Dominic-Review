<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class HomeSlider extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'title', 'title_color', 'slug', 'heading', 'heading_color', 'subheading', 'sub_heading_color', 'description', 'description_color', 'button_text', 'button_link', 'image', 'status', 'sort', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
