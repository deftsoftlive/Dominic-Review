<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Faq extends Model
{
    use Sluggable;
	use SluggableScopeHelpers;
	
    protected $fillable = [
		'slug', 'title', 'description', 'status'
	];
	
	public function sluggable() {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
	}
}
