<?php

namespace App\Http\Controllers\Vendor\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductAttribute;
use App\Models\Products\ProductInventory;
use App\Traits\ProductAttributes\Attributes;
use App\Models\Products\ProductAssignedVariation;
class VariationController extends Controller
{

use Attributes;
 
#===================================================================================================
#===================================================================================================
#===================================================================================================

  public function types(Request $request,$product_id)
  {
  	 $product = Product::find($product_id);
     $vv = view('vendors.E-shop.products.variationBoxes.attributesAccordons')
	     ->with('product',$product)
	     ->with('type',$request->type)
	     ->with('variationType',$request->variationType);

     return response()->json($vv->render());

  }



#===================================================================================================
#===================================================================================================
#===================================================================================================


public function saveAttributes(Request $request,$product_id)
{  

	$product = Product::find($product_id);

    
    $this->saveAttributeTrait($request,$product);
		  $vv = view('vendors.E-shop.products.variationBoxes.attribute.list')
	     ->with('product',$product);
         return response()->json(['status' => 1, 'htm' => $vv->render()]);
   
}

#==========================================================================================================
#==========================================================================================================
#==========================================================================================================

public function loadSteps(Request $request,$product_id)
{
	$product = Product::find($product_id);
    $product->product_type= $request->variationType;
	$product->save();
	$step = $request->step;
    switch ($step) {
		case 1:
		       $vv = view('vendors.E-shop.products.variationBoxes.general')
	               ->with('product',$product);
                    return response()->json(['status' => 1, 'htm' => $vv->render()]); 
		     break;
		case 2:
		      $vv = view('vendors.E-shop.products.variationBoxes.inventory')
	               ->with('product',$product);
                    return response()->json(['status' => 1, 'htm' => $vv->render()]); 
			break;
		case 3:
		     $vv = view('vendors.E-shop.products.variationBoxes.attributes')
	               ->with('product',$product);
                    return response()->json(['status' => 1, 'htm' => $vv->render()]); 
			break;
		case 4:
		      $vv = view('vendors.E-shop.products.variationBoxes.variation')
	               ->with('product',$product);
                    return response()->json(['status' => 1, 'htm' => $vv->render()]); 
			break;
		
		default:
			# code...
			break;
	}
}


#=======================================================================================================
#=======================================================================================================
#=======================================================================================================

 



public function removeProductVariationWithType(Request $request,$product_id)
{
	  $product = Product::find($product_id);
	if($product->user_id == Auth::user()->id){

         
         switch ($request->type) {
         	case 'attribute':

         		      $attribute = ProductAttribute::where('id',$request->id)->where('product_id',$product->id)->delete();
         		      $attribute = ProductAttribute::where('parent',$request->id)->where('product_id',$product->id)->delete();
                      return 1;
         		break;
         	
         	default:
         		# code...
         		break;
         }

	}
}






}
