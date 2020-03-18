<?php
namespace App\Traits\ProductAttributes;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductAttribute;
use App\Traits\ProductAttributes\ProductAttributes;

// more traits
use App\Traits\ProductAttributes\CreateInventory;
use App\Traits\ProductAttributes\ProductAssignedVariationTrait;
use App\Traits\ProductAttributes\CreateSubProductOfVariations;
trait Attributes{


use CreateInventory;
use ProductAssignedVariationTrait;
use CreateSubProductOfVariations;

#===================================================================================================
#===================================================================================================
#===================================================================================================


public function saveAttributeTrait($request,$product)
{
	$variation_type = $request->variation_type;
	foreach ($variation_type as $key => $type) {
		if(!empty($request->variations[$type])){
			      $variations = $request->variations[$type];
			      $product_view = !empty($request->visible[$type]) ? 1 : 0;
			      $product_variant = !empty($request->variable[$type]) ? 1 : 0;

			      $a = new ProductAttribute;
			      $a->shop_id = $product->shop_id; 
			      $a->product_id = $product->id; 
			      $a->user_id = $product->user_id; 
			      $a->type = $type;
			      $a->vkey = $type;
			      $a->product_view = $product_view;
			      $a->product_variant = $product_variant;
			      if($a->save()){
			      	$this->saveVariationAttributes($variations,$product,$a);
			      }
		}


    }  

    return 1;

}





#============================================================================================================
#============================================================================================================
#============================================================================================================

public function saveVariationAttributes($variations,$product,$parent)
{
      if($this->deleteProductVariationAttribute($parent)){
		  foreach ($variations as $key => $value) {
		  	 
		              $a = new ProductAttribute;
				      $a->shop_id = $product->shop_id; 
				      $a->product_id = $product->id; 
				      $a->user_id = $product->user_id; 
				      $a->parent = $parent->id;
				      $a->type = $parent->type;
				      $a->vkey = $parent->type; 
				      $a->value = $value;
				      $a->save(); 
		 }
	  }
	 return 1;
}



#============================================================================================================
#============================================================================================================
#============================================================================================================

public function deleteProductVariationAttribute($parent)
{
	 
	    $a = ProductAttribute::where('id','!=',$parent->id)
							 ->where('type',$parent->type)
							 ->where('product_id',$parent->product_id)
							 ->where('shop_id',$parent->shop_id)
							 ->where('user_id',$parent->user_id)
							 ->delete();
       return 1;
}






#=============================================================================================================
#=============================================================================================================
#=============================================================================================================


public function variationAttributeAddationItem(Request $request,$product_id)
{
	 $product = Product::find($product_id);
          $vv = view('vendors.E-shop.products.variationBoxes.variation.singleItem')
		      ->with('variationCount',($request->count + 1))
		      ->with('withHeader',1)
	          ->with('product',$product);
          return response()->json(['status' => 1, 'htm' => $vv->render()]);


}




#=============================================================================================================
#=============================================================================================================
#=============================================================================================================




}