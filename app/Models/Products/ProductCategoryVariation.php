<?php

namespace App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductCategoryVariation extends Model
{
   


   public function hasSameValue($category_id,$type,$value,$return=null)
   {
   	   $variation = $this->where('type',$type)->where('category_id',$category_id)->where('value',$value);

   	   if($return == null){
   	   	  return $variation->first();
   	   }else{
   	   	   return $variation->count() > 0 ? $return : '';
   	   }
   }





    public function variationTypes()
    {
         return $this->hasMany('App\Models\Products\ProductCategoryVariation','type','type')->groupBy('value');
    }


    public function variations()
    {
    	return $this->belongsTo('App\Models\Products\Variation','type','type')->where('status',1);
    }

    public function variation()
    {
    	return $this->belongsTo('App\Models\Products\ProductVariation','value')->where('status',1);
    }




}
