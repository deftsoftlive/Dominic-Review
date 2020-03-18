<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Blog extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
 
    protected $fillable = [
        'slug', 'category', 'title', 'content', 
        'image', 'metatitle', 'metakeywords',
        'metadescription', 'status',
	];
	
	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
	}
}
