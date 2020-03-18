<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DisputeVendor;
use App\Traits\EmailTraits\EmailNotificationTrait;
class DisputeController extends Controller
{
   
use EmailNotificationTrait;

   public function index()
   {

   	   return view('admin.disputes.index');
   }








    /*__________________________________________________________________________________________
	|
	|  Next Function starts
	|___________________________________________________________________________________________
	*/	


	public function ajax()
	{
	 
		$events = \App\Models\DisputeVendor::select('*')->orderBy('created_at','DESC')
		              ->get();

		return datatables()->of($events)
		->addColumn('action', function ($t) {
		return  $this->Actions($t);
		})
		
		->editColumn('amount',function($t){
		return '$'.$t->amount;
		})

		->make(true);
	}


	/*__________________________________________________________________________________________
	|
	|  Next Function starts
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
            $url = url(route('admin.vendor.dispute.detail',$data->id));
            $text .='<a href="'.$url.'" class="dropdown-item">Detail</a>';
            $text .='<div class="dropdown-divider"></div>';
            //$status=$data->status == 0 ? 'Active' : 'In-Active';
            //$text .='<a href="'.route('event_status',$data->slug).'" class="dropdown-item">'.$status.'</a>';

            $text .='</div>';
            $text .='</div>';

            return $text;
    }






#==============================================================================================================


    public function detail($id)
    {
       $dispute = DisputeVendor::with('orderEvent')->where('id',$id)->first();
       return view('admin.disputes.detail')
            ->with('data',$dispute)
            ->with('order',$dispute->orderEvent)
            ->with('event',$dispute->orderEvent->event);
    }



#==============================================================================================================

    public function block($id)
    {       $dispute = DisputeVendor::with('orderEvent')->where('id',$id)->first();
    	    $vendorCategory = \App\VendorCategory::find($dispute->vendor_id);
		    $vendorCategory->status = 5;
		    $vendorCategory->publish = 0;
		    $vendorCategory->save();
            if($this->BlockVendorEmailOrderSuccess($vendorCategory) == 1){
            	$dispute->status = 2;
            	$dispute->save();
            	return redirect()->route('admin.vendor.dispute.detail',$id)->with('messages','This Vendor has been blocked successfully.');
            }
    }







     

}
