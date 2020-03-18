<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class ShopPage extends Model
{
    public $table = 'shop_pages';

    use Sluggable;
    use SluggableScopeHelpers;

    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
