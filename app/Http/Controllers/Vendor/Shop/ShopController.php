<?php

namespace App\Http\Controllers\Vendor\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendors\Eshop;
use App\Models\Products\ProductCategory;
use Auth;
use App\Models\Shop\ShopCategory;
use App\Models\Vendors\RejectionReason;
class ShopController extends Controller
{

	 public $path = 'images/shops/';

    public $filePath = 'vendors.E-shop.steps.';
    public $shopfilePath = 'vendors.E-shop.';


    public function index()
    {
    	  $e = Eshop::where('vendor_id','=',Auth::user()->id);
    	  if($e->count() == 0){
    	 	return redirect()->route('vendor.shop.index');
    	  }

    	  $ShopCategory = new ShopCategory;
    	 
    	return view($this->shopfilePath.'index')->with('shop',$e)
    	                ->with('shop',$e->first())
    	                ->with('ShopCategory',$ShopCategory);
    }



#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------




    public function first()
    {
       $e = Eshop::where('vendor_id','=',Auth::user()->id);
       return view($this->filePath.'first')->with('shop',$e)->with('e',$e->first())->with('completed',0);
    }

#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------


    public function secondStep()
    {
    	 $e = Eshop::where('vendor_id','=',Auth::user()->id);
    	 if($e->count() == 0){
    	 	return redirect()->route('vendor.shop.index');
    	 }

    	 $e = ShopCategory::where('vendor_id',Auth::user()->id)
    	    ->where('parent',0);
	    	 
	      $category_ids = $e->pluck('category_id')->toArray();

         $category = ProductCategory::where('parent',0)->where('status',1)->orderBy('sorting','ASC')->get();
    	return view($this->filePath.'second')->with('category',$category)->with('category_ids',$category_ids)->with('completed',1); 
    }
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------


    public function thirdStep()
    {
    	
    	    $e = ShopCategory::where('vendor_id',Auth::user()->id)->where('parent',0);
	    	 if($e->count() == 0){
	    	 	return redirect()->route('shop.ajax.secondStep');
	    	 }

	        $category_ids = $e->pluck('category_id');

    	    $category = ProductCategory::where('parent',0)
							    	->whereIn('id',$category_ids)
							    	->where('status',1)
							    	->orderBy('sorting','ASC')
							    	->get();

		     $e = ShopCategory::where('vendor_id',Auth::user()->id)
    	    ->where('parent','>',0);
	    	  

	      $category_id = $e->pluck('category_id')->toArray();
    	return view($this->filePath.'third')->with('category',$category)->with('category_id',$category_id)->with('completed',2); 
    }

#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------

    public function check(Request $request)
    {
      
       $e = Eshop::orWhere(function($t) use($request){
                $t->where('name',$request->shop_name);
       })->where('vendor_id','!=',Auth::user()->id);
    	
    	return $e->count() == 0 ? 'true' : 'false';
    }

#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------


     public function firstStep(Request $request,$id)
     {
         
         return $this->shopFormSteps($request,$id);
     	 
     } 
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------


public function shopFormSteps($request,$id)
{
	 switch ($id) {
	 	case 1:
	 		 return $this->createShop($request);
	 		break;
	 	case 2:
	 		 return $this->createCategories($request);
	 		break;
	 	case 3:
	 		 return $this->createSubCategories($request);
	 		break;
	 	default:
	 		# code...
	 		break;
	 }
}

#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------


public function createShop($request)
{

	$v = \Validator::make($request->all(),[
         'shop_name' => 'required'
	]);

	if($v->fails()){
		 $status = [
			         'status' => 0,
			         'messages' => 'Fill the Shop name'
				   ];

	}else{
         
		 $e = Eshop::where('vendor_id','=',Auth::user()->id);
    	 $shop = $e->count() == 0 ? new Eshop : $e->first();
		 
		 $this->resubmitAfterChanging($shop);
  
		 $logo = $e->count() == 0 ? '' : $e->first()->logo;
		 $shop->vendor_id = Auth::user()->id;
		 $shop->name = $request->shop_name;
		 $shop->logo = $request->hasFile('logo') ? uploadFileWithAjax($this->path, $request->logo) : $logo;
		 $shop->approved_status = 0;
		 $shop->save();
	     $status = [
			       'status' => 1,
			       'redirect' => url(route('shop.ajax.secondStep'))
				   ];
    }

    return response()->json($status);


}
#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------


public function createCategories($request)
{

	$v = \Validator::make($request->all(),[
         'category' => 'required'
	]);

    $e = Eshop::where('vendor_id','=',Auth::user()->id);
	if($v->fails()){
		 $status = [
			         'status' => 0,
			         'messages' => 'Please choose some product category'
				   ];

	}elseif($e->count() == 0){
              $status = [
			         'status' => 0,
			         'messages' => 'Please create shop first.'
				   ];

	}else{

           
    	 $shop = $e->first();
         ShopCategory::where('vendor_id',Auth::user()->id)->where('parent',0)->delete();
         foreach ($request->category as $key => $category_id) {
         	  $this->createCategoryOfShop($category_id,$shop->id);
         }

		  

	     $status = [
			       'status' => 1,
			       'redirect' => url(route('shop.ajax.thirdStep'))
				   ];
    }

    return response()->json($status);


}


#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------


public function createSubCategories($request)
{

	$v = \Validator::make($request->all(),[
         'category' => 'required'
	]);

    $e = Eshop::where('vendor_id','=',Auth::user()->id);
	if($v->fails()){
		 $status = [
			         'status' => 0,
			         'messages' => 'Please choose some product category'
				   ];

	}elseif($e->count() == 0){
              $status = [
			         'status' => 0,
			         'messages' => 'Please create shop first.'
				   ];

	}else{

           
         ShopCategory::where('vendor_id',Auth::user()->id)->where('parent','>',0)->delete();
    	 $shop = $e->first();
         foreach ($request->category as $parent => $category_id) {
         	  $category = ProductCategory::find($category_id);
         	  $this->createCategoryOfShop($category_id,$shop->id,$category->parent);
         }

		  

	     $status = [
			       'status' => 1,
			       'redirect' => url(route('vendor.shop'))
				   ];
    }

    return response()->json($status);


}

#---------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------


public function createCategoryOfShop($category_id,$shop_id,$parent=0)
{
	 $s = new ShopCategory;
	 $s->vendor_id = Auth::user()->id;
	 $s->parent = $parent;
	 $s->shop_id = $shop_id;
	 $s->category_id = $category_id;
	 $s->save();
}
#---------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------
#---------------------------------------------------------------------------------------------


public function changeStatus()
{
	  $e = Eshop::where('vendor_id',Auth::user()->id);
	  if($e->count() > 0){
	  	$s = $e->first();
	  	$s->status = $s->status == 1 ? 0 : 1;
	  	$s->save();
	  }
	  return redirect()->back()->with('messages','Shop status has been change successfully.');
	  
}


#----------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------

public function resubmitAfterChanging($shop)
{


     switch ($shop->approved_status) {
     	case 1:
     		 $reason ='User has been changed something in shop settings';
     		break;
     	case 2:
     		 $reason ='The shop has been resubmitted for approval.';
     		break;
     	
     	default:
     		 $reason ='The shop has been submitted for approval.';
     		break;
     }






	  $r = new RejectionReason;
      $r->type_id = $shop->id;
      $r->type = 'shop';
      $r->reason = $reason;
      $r->save();
      return 1;
}



}
