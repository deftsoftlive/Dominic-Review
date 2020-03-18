<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendors\Eshop;
use App\Models\Shop\ShopCategory;
use App\Models\Vendors\RejectionReason;
use App\Models\Products\Product;
use App\Traits\EmailTraits\EmailNotificationTrait;
class ShopController extends Controller
{
    use EmailNotificationTrait;
    public $filePath = 'admin.shop.settings.';

#=========================================================================================#
#=========================================================================================#
#=========================================================================================#

	public function index(Request $request)
	{
		  $status = $request->status != "" && $request->status < 5 ? $request->status : 5;
		return view($this->filePath.'index')->with('title','E-Shop Listing')->with('status',$status);
	}

#=========================================================================================#
#=========================================================================================#
#=========================================================================================#


	public function detail($id)
	{
		$eshop=Eshop::find($id);
        $ShopCategory = new ShopCategory;
		   return view($this->filePath.'detail')
				 ->with('shop',$eshop)
				 ->with('ShopCategory',$ShopCategory)
				 ->with('title','E-Shop Listing');
	}

#=========================================================================================#
#=========================================================================================#
#=========================================================================================#


#----------------------------------------------------------------------------------------------------------------
# Brand list search function
#----------------------------------------------------------------------------------------------------------------

    public function Ajax(Request $request)
	{        

		      $event = Eshop::select('*');
		      
                 $events = $event->where(function($t) use($request){
                 	    if($request->status != 5){

                        $t->where('approved_status',$request->status);
                 	    }

                 })->get();
		      
		      return datatables()->of($events)
								 ->addColumn('action', function ($t) {
								   return  $this->Actions($t);
								})
								->editColumn('status',function($t){
						                        switch ($t->approved_status) {
										           	case 1:
										           		return 'Approved';
										           		break;
										           	case 2:
										           		return 'Rejected';
										           		break;
										           	
										           	default:
										           		return 'Awaiting for approval';
										           		break;
									            }
								})
								->make(true);
	}


/*__________________________________________________________________________________________
|
|  Next Function starts calls from Ajax function, append here all actions
|___________________________________________________________________________________________
*/
    

    public function Actions($data)
    {
        $text  ='<div class="btn-group">';
        $text .='<button type="button" class="btn btn-primary">Action</button>';
        $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
        $text .='<span class="caret"></span>';
        $text .='<span class="sr-only">Toggle Dropdown</span>';
        $text .='</button>';
        $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

        $text .='<a href="'.route('admin.shop.list.detail',$data->id).'" class="dropdown-item">View</a>';
        $text .='<div class="dropdown-divider"></div>';
        // $status=$data->status == 0 ? 'Active' : 'In-Active';
        // $text .='<a href="'.route('admin.products.brands.event_status',$data->id).'" class="dropdown-item">'.$status.'</a>';

        $text .='</div>';
        $text .='</div>';

        return $text;
    }






#=============================================================================================
#  products
#=============================================================================================


public function shopRejection($slug)
{
	 $shop = Eshop::findBySlug($slug);
	   return view($this->filePath.'rejection')
	        ->with('title',$shop->name)
	        ->with('shop',$shop);
}


#=============================================================================================
# shopRejected
#=============================================================================================

public function shopApproved(Request $request,$slug)
{
	 
	$shop = Eshop::findBySlug($slug);
	//return $shop->RejectionReason;
    $r = new RejectionReason;
    $r->type_id = $shop->id;
    $r->type = 'shop';
    $r->reason = 'Shop Approved';
    
    if($r->save()){
                if($this->ShopApprovedEmailTrait($shop) == 1){
			    	$shop->approved_status = 1;
			    	$shop->save();
			    	return redirect()->route('admin.shop.listing')->with('messages','The shop has been Approved successfully.');
                }
    }
    
}

#=============================================================================================
# shopRejected
#=============================================================================================

public function shopRejected(Request $request,$slug)
{
	$this->validate($request,[
       'reasons' => 'required'
	]);
	$shop = Eshop::findBySlug($slug);
	//return $shop->RejectionReason;
    $r = new RejectionReason;
    $r->type_id = $shop->id;
    $r->type = 'shop';
    $r->reason = $request->reasons;

    if($r->save()){
                if($this->ShopRejectedEmailTrait($shop) == 1){
			    	$shop->approved_status = 2;
			    	$shop->save();
			    	return redirect()->route('admin.shop.listing')->with('messages','The shop has been rejected successfully.');
                }
    }
    
}

#=============================================================================================
#  products
#=============================================================================================


public function productListing($status)
{
	 
	 
        return view($this->filePath.'products.all')
		     ->with('title','Products')
		     ->with('status',$status);
       

}


#=============================================================================================
#  products
#=============================================================================================


public function products(Request $request,$slug)
{
	 $shop = Eshop::findBySlug($slug);
	 $status = !empty($request->status) ? $request->status : 0;
     return view($this->filePath.'products.list')
     ->with('title',$shop->name)
     ->with('status',$status)
     ->with('shop',$shop);

}




public function productListingAjax($status)
{
	 
          
		 $event = Product::with('shop')->select('*')->where('parent',0);
         $events = $status == 5 ? $event->get() : $event->where('approved_status',$status)->get();
		       return datatables()->of($events)
		->addColumn('action', function ($t) {
		       return  $this->ProductActions($t);
		})
		->editColumn('status',function($t){
           return $t->approved_status == 1 ? 'Approved' : $t->approved_status == 2 ? 'Rejected' : 'Awaiting for approval';
		})
		->make(true);
	 
}




public function productAjax($slug,$status)
{
	 
         $shop = Eshop::findBySlug($slug);    
		 $event = Product::with('shop')->select('*')->where('parent',0)->where('shop_id',$shop->id);
         $events = $status == 0 ? $event->get() : $event->where('approved_status',$status)->get();
		       return datatables()->of($events)
		->addColumn('action', function ($t) {
		       return  $this->ProductActions($t);
		})
		->editColumn('status',function($t){
           return $t->approved_status == 1 ? 'Approved' : $t->approved_status == 2 ? 'Rejected' : 'Awaiting for approval';
		})
		->make(true);
	 
}


public function productStatusDiv($status)
{
	switch ($status) {
		case 0:
			 return '<span class="status-awaiting">Awaiting for approval</span>';
			break;
		case 1:
			 return '<span class="status-Approved">Approved</span>';
			break;
		case 2:
			 return '<span class="status-Rejected">Rejected</span>';
			break;
		
		default:
			# code...
			break;
	}
}



 public function ProductActions($data)
    {
        $text  ='<div class="btn-group">';
        $text .='<button type="button" class="btn btn-primary">Action</button>';
        $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
        $text .='<span class="caret"></span>';
        $text .='<span class="sr-only">Toggle Dropdown</span>';
        $text .='</button>';
        $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';
        $text .='<a href="'.route('admin.shop.products.detail',[$data->shop->slug,$data->slug]).'" class="dropdown-item">View</a>';
        $text .='<div class="dropdown-divider"></div>';
        $text .='</div>';
        $text .='</div>';

        return $text;
    }

#----------------------------------------------------------------------------------------------------
#   product Detail
#----------------------------------------------------------------------------------------------------

    public function productDetail($slug,$productSlug)
    {
    	        $shop = Eshop::findBySlug($slug);
			    $product = Product::findBySlug($productSlug);
		        return view($this->filePath.'products.detail')
				     ->with('title',$shop->name)
				     ->with('product',$product)
				     ->with('shop',$shop);

    }




#=============================================================================================
#  products
#=============================================================================================


public function productRejection($slug,$productSlug)
{
	 $shop = Product::findBySlug($productSlug);
	   return view($this->filePath.'rejection')
	        ->with('title',$shop->name)
	        ->with('shop',$shop);
}


#=============================================================================================
# shopRejected
#=============================================================================================

public function productApproved(Request $request,$slug,$productSlug)
{
	 
	$shop = Product::findBySlug($productSlug);
	//return $shop->RejectionReason;
    $r = new RejectionReason;
    $r->type_id = $shop->id;
    $r->type = 'product';
    $r->reason = 'Product is Approved';
    
    if($r->save()){
              
                  if($this->ProductApprovedEmailTrait($shop) == 1 && $this->productChangeStatus($productSlug,1) == 1){
			    	 return redirect()->route('admin.shop.products.detail',[$shop->shop->slug,$productSlug])
			    	                  ->with('messages','The product has been approved successfully.');
                }
    }
    
}

#=============================================================================================
# shopRejected
#=============================================================================================

public function productRejected(Request $request,$slug,$productSlug)
{
	$this->validate($request,[
       'reasons' => 'required'
	]);
	$shop = Product::findBySlug($productSlug);
	//return $shop->RejectionReason;
    $r = new RejectionReason;
    $r->type_id = $shop->id;
    $r->type = 'product';
    $r->reason = $request->reasons;

    if($r->save()){
                if($this->productRejectedEmailTrait($shop) == 1 && $this->productChangeStatus($productSlug,2) == 1){
			    	 return redirect()->route('admin.shop.products.detail',[$shop->shop->slug,$productSlug])
			    	                  ->with('messages','The product has been rejected successfully.');
                }
    }
    
}






#=======================================================================================
#
#=======================================================================================

public function productChangeStatus($productSlug,$status)
{
	 $product = Product::findBySlug($productSlug);
	 $product->approved_status = $status;
	 $product->save();

	 if($product->subProducts != null && $product->subProducts->count() > 0){
	 	foreach ($product->subProducts as $p) {
	 		 $p->approved_status = $status;
	 		 $p->save();
	 	}
	 }
	 return 1;

}











}
