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
        'title', 'slug', 'heading', 'subheading', 'description', 'button_text', 'button_link', 'image', 'status', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
