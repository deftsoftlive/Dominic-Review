<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class BlogCategory extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    
    protected $fillable = [
		'slug', 'name', 'status'
	];
	
	public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
	}
}
