<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductInventory;
use App\Models\Products\ProductAssignedVariation;
class ProductFilterController extends Controller
{
   

    public $filePath = 'e-shop.modules.products.';
    public $include = 'e-shop.includes.products.';


#================================================================================
#================================================================================
#================================================================================


public function index(Request $request,$category_id)
{

 

     $simpleIds =$this->getSimpleProductId($request,$category_id);
     $ids = $this->getProductIDWIthFilters($request,$category_id);
     $compineIDS = array_merge($simpleIds,$ids);
     $filterArray=[
       'filters' => !empty($request) ? 1 : 0,
       'filterArr' => $compineIDS
     ];
 

   
 

   $Product = Product::has('eshop') 
                      ->where('childcategory_id',$category_id)
                      ->where('create_status',1)
                      ->where('approved_status',1)
                      ->where('status',1)
                        ->where(function($t) use($filterArray){
                              if($filterArray['filters'] > 0){
                                 $t->whereIn('id',$filterArray['filterArr']);
                               }
                        })->where(function($t) use($request){
                               
                              if(!empty($request->price)){
                                $price = explode('&', $request->price);
                                $t->whereBetween('products.final_price',[$price[0],$price[1]]);
                              }
                        })->paginate(20);
 
           $vv = view($this->include.'list')
               ->with('products',$Product);
   return response()->json(['status' => 1,'htm' => $vv->render()]);
}


#================================================================================
#================================================================================
#================================================================================


public function getSimpleProductId($request,$category_id)
{
	 $product = Product::has('eshop')->where('products.product_type',0)
	                   ->where('products.childcategory_id',$category_id)
	                   ->where('products.create_status',1) 
                     ->where('products.approved_status',1)
                      ->where('products.status',1);
                     
                      if(!empty($request->price)){
    		            		$price = explode('&', $request->price);
    		            		$product->whereBetween('products.final_price',[$price[0],$price[1]]);
		            	    }
  return $product->pluck('id')->toArray();
}



public function getProductIDWIthFilters($request,$category_id)
{
        $product =  Product::has('eshop')
                          ->join('product_assigned_variations','product_assigned_variations.parent','=','products.variant_id')
                          ->select('product_assigned_variations.*')
                          ->where('products.childcategory_id',$category_id)
                          ->where('products.approved_status',1)
                          ->where('products.create_status',1);

            $ids = $product->where('products.product_type',1)
                           ->where('products.create_status',1)
                           ->where('products.approved_status',1)
                           ->where('products.status',1)
                           ->where('products.variant_id','>',0)
                           ->groupBy('product_assigned_variations.parent') 
                           ->pluck('product_assigned_variations.parent')
                           ->toArray();
	 
        foreach ($request->all() as $key => $value) {
                   if($key != 'price'){
                        $ids = $this->getProductIdS($category_id,$key,$value,$ids);
                   }
        }

 
       return Product::whereIn('variant_id',$ids)->pluck('id')->toArray();

  

}




#===============================================================================================================



public function getProductIdS($category_id,$key,$value,$ids=0)
{
             $product =  Product::has('eshop')
                                          ->join('product_assigned_variations','product_assigned_variations.parent','=','products.variant_id')
                                          ->select('product_assigned_variations.*')
                                          ->where('products.childcategory_id',$category_id)
                                          ->where('products.create_status',1)
                                          ->where('products.approved_status',1)
                                          ->where('product_assigned_variations.type',$key)
                                          ->whereIn('product_assigned_variations.attribute_id',$value)
                                          ->where('products.product_type',1)
                                          ->where(function($t) use($ids){
                                                 if(is_array($ids)){
                                                    $t->whereIn('product_assigned_variations.parent',$ids);
                                                 }
                                          })
                                          ->where('products.create_status',1)
                                          ->where('products.status',1)
                                          ->groupBy('product_assigned_variations.parent')
                                          ->pluck('product_assigned_variations.parent')
                                          ->toArray();
             return $product;
 
}
#===============================================================================================================





}
