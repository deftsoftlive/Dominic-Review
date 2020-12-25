<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class DrhActivity extends Model
{
	use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'title', 'slug', 'subtitle', 'button_text', 'button_link', 'image', 'status', 'sort', 'created_at', 'updated_at'
    ];

    public function sluggable() {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
