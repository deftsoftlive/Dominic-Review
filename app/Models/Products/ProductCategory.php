<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class ProductCategory extends Model
{
    

    use Sluggable;
    use SluggableScopeHelpers;

    
    public function sluggable()
    {
        return [

            'slug' => [
                'source' => 'label'
            ]
        ];
    }



    public function categoryParent()
    {
       return $this->belongsTo($this,'parent');
    }




    public function categorySubparent()
    {
       return $this->belongsTo($this,'subparent');
    }




    public function subCategory()
    {
         return $this->hasMany($this,'parent')->where('parent','>',0)->where('subparent',0)->orderBy('sorting','ASC');
    }



    public function childCategory()
    {
         return $this->hasMany($this,'subparent')->where('parent','>',0)->where('subparent','>',0)->orderBy('sorting','ASC');
    }





    public function subCategoryActives()
    {
         return $this->hasMany($this,'parent')->where('parent','>',0)->where('subparent',0)->orderBy('sorting','ASC');
    }



    public function childCategoryActives()
    {
         return $this->hasMany($this,'subparent','id')
        // ->where('parent','>',0)
         //->where('subparent','>',0)
         ->orderBy('sorting','ASC');
    }




    public function ProductVariations()
    {
         return $this->hasMany('App\Models\Products\ProductCategoryVariation','category_id')->groupBy('type');
    }


    public function ProductVariationWithType()
    {
         return $this->hasMany('App\Models\Products\ProductCategoryVariation','category_id'); //->where('type',$type);
    }


      public function ProductVariationWithTypess($type)
    {
         return $this->hasMany('App\Models\Products\ProductCategoryVariation','category_id')->where('type',$type);
    }




     public function ProductVariationTypes($type='')
    {
         return $this->hasMany('App\Models\Products\ProductCategoryVariation','category_id');
    }








}
