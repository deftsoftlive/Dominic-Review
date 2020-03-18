<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Category extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    

    protected $fillable = [
        'label', 'slug', 'meta_title', 'meta_tag', 'meta_description', 'color', 'type'
    ];
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'label'
            ]
        ];
    }


    public function category_parent()
    {
       return $this->belongsTo('App\Category','parent');
    }

    public function category_subparent()
    {
       return $this->belongsTo('App\Category','subparent');
    }

    public function subCategory()
    {
         return $this->hasMany('App\Category','parent')->where('parent','>',0)->where('subparent',0)->where('status', 1);
    }

    public function childCategory()
    {
         return $this->hasMany('App\Category','subparent')->where('parent','>',0)->where('subparent','>',0);
    }


# category variants Brand

    public function categoryBrands()
    {
        return $this->hasMany('App\CategoryVaritant','category_id')->where('variantKey','brands');
    }

# category variants CategoryTechniques
    public function CategoryTechniques()
    {
        return $this->hasMany('App\CategoryVaritant','category_id')->where('variantKey','techniques');
    }


# category variants CategoryModels
    public function CategoryModels()
    {
        return $this->hasMany('App\CategoryVaritant','category_id')->where('variantKey','models');
    }



# category variants CategorySizes
    public function CategorySizes()
    {
        return $this->hasMany('App\CategoryVaritant','category_id')->where('variantKey','sizes');
    }

# category variants CategoryStyles
    public function CategoryStyles()
    {
        return $this->hasMany('App\CategoryVaritant','category_id')->where('variantKey','styles');
    }


# category variants CategoryMaterials
    public function CategoryAmenity()
    {
        // return $this->hasMany('App\CategoryVariation','category_id')->where('type','amenity');
        return $this->hasMany('App\CategoryVariation','category_id')
        ->join('amenities', 'amenities.id', '=', 'category_variations.variant_id')
       ->where('amenities.type','amenity')
       ->where('category_variations.type','amenity')
       ->where('amenities.status',1)
       ->groupBy('category_variations.variant_id');   
    }



    # category variants CategoryMaterials
    public function CategoryGames()
    {
        //return $this->hasMany('App\CategoryVariation','category_id')->where('type','game');

       return $this->hasMany('App\CategoryVariation','category_id')
        ->join('amenities', 'amenities.id', '=', 'category_variations.variant_id')
       ->where('amenities.type','game')
       ->where('category_variations.type','game')
       ->where('amenities.status',1)
       ->groupBy('category_variations.variant_id');        
    }


      public function CategoryEvent()
    {
        return $this->hasMany('App\CategoryVariation','category_id')
                    ->join('events', 'events.id', '=', 'category_variations.variant_id')
                    ->select('category_variations.*')
                    ->where('events.status', 1)
                    ->where('category_variations.type','event')
                    ->groupBy('category_variations.variant_id');
    }

      public function CategorySeasons()
    {
        return $this->hasMany('App\CategoryVariation','category_id','category_id')

                    ->join('seasons', 'seasons.id', '=', 'category_variations.variant_id')
                    ->select('category_variations.*')
                    ->where('seasons.status', 1)
                    ->where('category_variations.type','seasons')
                    ->groupBy('category_variations.variant_id')

                    ->where('type','seasons');
    }

    public function businesses() {
       return $this->hasMany('App\VendorCategory')->where('status', 3)->where('publish', 1);
    }



}
