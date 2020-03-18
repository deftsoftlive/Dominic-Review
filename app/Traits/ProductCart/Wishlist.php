<?php
namespace App\Traits\ProductCart;
use Illuminate\Http\Request;
 
use App\Models\Products\Product;
use Auth;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use App\Models\Shop\ShopCategory;
use App\Models\Products\ProductInventory;
use App\Models\Products\ProductImage;
use App\Models\Products\ProductAssignedVariation;
use App\Models\Shop\ShopCartItems;
use Cart; 
trait Wishlist{




public $filePaths = 'e-shop.modules.wishlist.';
public $InclidesfilePaths = 'e-shop.includes.wishlist.';



public function wishlistCart()
{
	
	return view($this->filePaths.'list');
}






#=======================================================================================================
#   wishlist
#=======================================================================================================



public function wishlist(Request $request,$id)
{
  if(Auth::check() && Auth::user()->role == "user"){

	   $user_id = Auth::user()->id;
	   $list = ShopCartItems::where('user_id',$user_id)->where('type','wishlist')->where('product_id',$id);

	   if($list->count() == 0){
	   	$w = new ShopCartItems;
	   	$w->product_id = $id;
	   	$w->user_id = $user_id;
	   	$w->type = "wishlist";
	   	$w->save();
	   }

	   $status = [
               'status' => 1,
               'messages' => 'This Product is added to your Wishlist',
               'myShopWishList' => Auth::user()->myShopWishList->count()
	   ];

   }else{

   	   $status = [
               'status' => 0,
               'url' =>  url('/login?redirectLink='.$request->redirectLink)
	   ];

   }


   return response()->json($status);
 

}




#================================================================================================================
#================================================================================================================
#================================================================================================================


public function wishlistOperations(Request $request)
{
	switch ($request->type) {
		case 'list':
			 return $this->getWishlistItems();
			break;
		case 'remove':
			 return $this->removeItemFromWishlist($request->id);
			break;
		default:
			# code...
			break;
	}
}


#==================================================================================================================
#==================================================================================================================
#==================================================================================================================

public function removeItemFromWishlist($id)
{
	$w = ShopCartItems::where('id',$id)->where('user_id',Auth::user()->id)->delete();

	return $this->getWishlistItems();
}

#==================================================================================================================
#==================================================================================================================
#==================================================================================================================

public function getWishlistItems()
{


	$vv = view($this->InclidesfilePaths.'list');

	return [
         'status' => 1,
         'htm' => $vv->render()
 
	];
}




}