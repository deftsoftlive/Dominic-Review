<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\VendorCategory;
use App\Models\Admin\EmailTemplate;
use Illuminate\Support\Facades\Mail;
use App\Mail\Emails;

class VendorController extends Controller
{
    public function index(Request $request) {
    	return view('admin.user-vendor.vendors.index')->with('title', 'Vendors');	
    }

   	public function ajax_getVendors(Request $request)
   	{
   		$vendors = User::where('role', 'vendor')
                     ->where('login_count','>',0)
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

   	public function changeStatus($id) {
		$user = User::find($id);

     if(!empty($user)) {
        $user->status = $user->status == 1 ? 0 : 1;
        $user->save();
        $msg= $user->status == 1 ? '<b>'.$user->name.'</b> is Activated' : '<b>'.$user->name.'</b> is Deactivated';
       return redirect(route('list_vendors'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
	}

  public function business($id) {
    $vendor = User::find($id);
    return view('admin.user-vendor.vendors.business')->with(['title' => 'Vendor Business', 'vendor'=> $vendor]);
  }

  public function changeBusinessStatus($user_id, $id, $status) {
    $vendorCategory = VendorCategory::find($id);
      $statusTitle = '';
      $publishSts = 0;

      if($status == 3) {
        $statusTitle = 'Approved';
        $publishSts = 1;
      }
      elseif($status == 2) {
        $statusTitle = 'Pending';
        $publishSts = 0;
      }

     if(!empty($vendorCategory)) {
        $vendorCategory->status = $status;
        $vendorCategory->publish = $publishSts;
        $vendorCategory->save();
        $msg= '<b>'.$vendorCategory->title.'</b> is '.$statusTitle;
        if($status == 3) {
          $vendorCategory['link'] = route('myBusinessView', ['slug' => $vendorCategory->category->slug, 'vendorSlug' => $vendorCategory->business_url]);
          $vendorCategory['title'] = $vendorCategory->title;
          $vendorCategory['email'] = EmailTemplate::find(2);
          Mail::to($vendorCategory->vendors->email)
          ->send(new Emails($vendorCategory));
        }
       return redirect(route('admin_vendor_business', $user_id))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
  }

   	function createAction($data, $businessUrl, $stsUrl) {
            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

            if(!empty($businessUrl)) {
              $text .='<a href="'.route($businessUrl, $data->id).'" class="dropdown-item">View Business</a>';
              $text .='<div class="dropdown-divider"></div>';
            }
            
            if(!empty($stsUrl)) {
              $status=$data->status == 0 ? 'Active' : 'In-Active';
              $text .='<a href="'.route($stsUrl, $data->id).'" class="dropdown-item">'.$status.'</a>';
            }
            $text .='</div>';
            $text .='</div>';

            return $text;
}
}
