<?php

namespace App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class Variation extends Model
{
        

    use Sluggable;
    use SluggableScopeHelpers;

    
    public function sluggable()
    {
        return [

            'type' => [
                'source' => 'name'
            ]
        ];
    }




    #--------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------------------



    public function ProductVariation()
    {
        return $this->hasMany('App\Models\Products\ProductVariation','type','type');
    }




 

    #--------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------------------
    #--------------------------------------------------------------------------------------------

    

    public function VariationExtras()
    {
    	return $this->hasMany('App\Models\Products\VariationExtra','slug','type')->where('status',1);
    }




 



}
