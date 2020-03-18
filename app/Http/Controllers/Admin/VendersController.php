<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Traits\EmailTraits\EmailNotificationTrait;
class VendersController extends Controller
{
    use EmailNotificationTrait;

#-------------------------------------------------------------------------------------
#  list
#-------------------------------------------------------------------------------------


    public function index()
    {
    	return view('admin.user-vendor.vendors.newVendors')
    	      ->with('title','New Vendors');
    }

#-------------------------------------------------------------------------------------
#  detail
#-------------------------------------------------------------------------------------


    public function detail($id)
    {


    	$u = User::find($id);

    	 //$this->VendorRejectionNotification($u,'hello');
    	//return $this->VendorApprovalNotification($u);
    	return view('admin.user-vendor.vendors.detail')
    	      ->with('vendor',$u)
    	      ->with('title',$u->name);
    }



    public function approved($id)
    {
    	$u = User::find($id);
    	$u->status = 1;
    	$u->save();
        $this->VendorApprovalNotification($u);
        $msg = 'This Accpunt has been Approved successfully.';
        return redirect()->back()->with('messages',$msg);

    }


    public function rejected(Request $request,$id)
    {
       
    	$u = User::find($id);
      $u->status = 0;
      $u->custom_token = createToken();
    	$u->updated_status = 0;
    	$u->save();
        $this->VendorRejectionNotification($u,$request->detail);
        $msg = 'This Accpunt has been Rejected successfully.';
        return redirect()->back()->with('messages',$msg);

    }

#-------------------------------------------------------------------------------------
#  get ajax 
#-------------------------------------------------------------------------------------


    public function ajax_getVendors(Request $request)
    {
        $vendors = User::where('role', 'vendor')
                     ->where('login_count','=',0)
                     ->where('status','=',0)
                     ->get();

          return datatables()->of($vendors)
                 ->addColumn('action', function ($t) {
                          return $this->createAction($t, 'admin_vendor_business', 'admin_vendor_changeStatus');
                })
                 ->editColumn('status', function($t) {
                          return $t->status == 1 ? 'Active' : 'In-Active';
                 })
                 ->make(true);
    }

#-------------------------------------------------------------------------------------
#  get ajax 
#-------------------------------------------------------------------------------------
    function createAction($data, $businessUrl, $stsUrl) {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

            

              $text .='<a href="'.route('admin.vendor.detail', $data->id).'" class="dropdown-item">View Document</a>';
              $text .='<div class="dropdown-divider"></div>';
            
            if(!empty($stsUrl)) {
              $status=$data->status == 0 ? 'Active' : 'In-Active';
              $text .='<a href="'.route($stsUrl, $data->id).'" class="dropdown-item">'.$status.'</a>';
            }
            $text .='</div>';
            $text .='</div>';

            return $text;
}
#-------------------------------------------------------------------------------------
#  get ajax 
#-------------------------------------------------------------------------------------


    public function ajax_getInvitingVendors(Request $request)
   	{

      if(!empty($request->type)){
                         $vendors = \App\Models\InviteVendor::select('*')->where('type','user') 
                                  ->get();

      }else{
   		                         $vendors = \App\Models\InviteVendor::join('categories','categories.id','=','invite_vendors.category_id') 
                                  ->select('categories.label','invite_vendors.*')
                                  ->where('invite_vendors.type','vendor') 
                                  ->get();
      }
		  return datatables()->of($vendors)
		         ->addColumn('action', function ($t) {
			              return $this->createAction2($t);
	           })
        		 ->make(true);
   	}

#-------------------------------------------------------------------------------------
#  get ajax 
#-------------------------------------------------------------------------------------
   	function createAction2($data) {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';
            $text .='<a href="'.route('admin.'.$data->type.'.inviting', $data->id).'" class="dropdown-item">View</a>';
            $text .='<div class="dropdown-divider"></div>';
            
             
            $text .='</div>';
            $text .='</div>';

            return $text;
}



#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

public function invite()
{

    return view('admin.user-vendor.vendors.invitingList')
              
              ->with('title','Inviting Vendor List');
    
}
#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

public function inviteDetail($id)
{
   $vendor = \App\Models\InviteVendor::find($id);
   return view('admin.user-vendor.vendors.inviteDetail')
        ->with('vendor',$vendor)
        ->with('title',$vendor->business_name);
    
}

#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------


public function vendorInvite($id)
{      
    $vendor = \App\Models\InviteVendor::find($id);
    if($this->VendorInvitingRequestNotification($vendor)){
        $vendor->status = 1; 
        $vendor->save();

    return redirect()->back()->with('flash_message','Invitation Email has been sent successfully.');
    }
}

#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

public function invite2()
{

    return view('admin.user-vendor.users.inviteIndex')
         ->with('title','Inviting User List');
    
}
#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

public function inviteDetail2($id)
{
   $vendor = \App\Models\InviteVendor::find($id);
   return view('admin.user-vendor.users.inviteDetail')
        ->with('vendor',$vendor)
        ->with('title',$vendor->business_name);
    
}

#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------


public function vendorInvite2($id)
{      
    $vendor = \App\Models\InviteVendor::find($id);
    if($this->UserInvitingRequestNotification($vendor)){
        $vendor->status = 1; 
        $vendor->save();

    return redirect()->back()->with('flash_message','Invitation Email has been sent successfully.');
    }
}

#------------------------------------------------------------------------------------------------------------
# invite Vendors
#------------------------------------------------------------------------------------------------------------

}
