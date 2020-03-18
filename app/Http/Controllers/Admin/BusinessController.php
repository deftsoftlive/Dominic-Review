<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\VendorCategory;
use App\Models\Admin\ServiceAprovalProcess;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\EmailTemplate;
use App\Mail\Emails;

class BusinessController extends Controller
{
   public $ignors = [
     '_token', 'return_url', 'vendor_page'
   ];

    public function index(Request $request) {
    	return view('admin.businesses.index')->with('title', 'Businesses');	
    }

   	public function ajax_getBusinesses($status) {
      $vanCat = VendorCategory::where(['status' => $status])->get();
  		return datatables()->of($vanCat)
  		->addColumn('action', function ($t) {
  			return $this->createAction($t, 'vendorBusinessView', 'admin_business_changeBusinessesStatus');
  		})->addColumn('services', function ($t) {
        return $this->createServices($t);
      })->make(true);
    }

  public function changeBusinessesStatus($id, $status) {
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
       return redirect(route('admin.business.index'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
  }

  function createServices($data) {
    $text = $data->title;
    if(count($data->subcategory)) {
      foreach ($data->subcategory as $key => $value) {
        if($value->title) {
          $text .= ', '.$value->title;
        }
      }
    }
      return $text;
  }

  public function rejectBusinessStatus(Request $request, $user_id, $service_id) {
    $user = User::find($user_id);    

    ServiceAprovalProcess::where(['vendor_service_id'=> $service_id, 'user_id'=> $user_id])->delete();

    foreach ($request->all() as $key => $value) {
      if(!in_array($key, $this->ignors) && $value):
        $chk = ServiceAprovalProcess::where(['vendor_service_id'=> $service_id, 'user_id'=> $user_id, 'key' => $key])->first();
        if(!empty($chk)) {
           $chk->key = $key;
           $chk->parent = $chk->parent;
         } else {
           $chk = new ServiceAprovalProcess;
           $chk->key = $key;
           $chk->parent = 0;
         }
         $chk->parent = 0;
         $chk->keyValue = $value;
         $chk->user_id = $user_id;
         $chk->vendor_service_id = $service_id;
         $chk->save();
      endif;
    }
    $vendorCategory = VendorCategory::find($service_id);
    $vendorCategory->status = 4;
    $vendorCategory->publish = 0;
    $vendorCategory->save();

    $request['link'] = route('myBusinessView', ['slug' => $vendorCategory->category->slug, 'vendorSlug' => $vendorCategory->business_url]);
    $request['title'] = $vendorCategory->title;
    $request['user'] = $user;
    $request['category'] = $vendorCategory;
    $request['email'] = EmailTemplate::find(3);
    
    Mail::to($user->email)->send(new Emails($request));
    
    return redirect($request->return_url)->with('flash_message', '<b>'.$vendorCategory->title.'</b> is Rejected');
  }

   	function createAction($data, $businessUrl, $stsUrl) {

            $text  ='<div class="btn-group">';
            $text .='<button type="button" class="btn btn-primary">Action</button>';
            $text .='<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">';
            $text .='<span class="caret"></span>';
            $text .='<span class="sr-only">Toggle Dropdown</span>';
            $text .='</button>';
            $text .='<div class="dropdown-menu" role="menu" x-placement="top-start" style="position: absolute; transform: translate3d(67px, -165px, 0px); top: 0px; left: 0px; will-change: transform;">';

            if(!empty($data->business_url)) {
              $text .='<a target="_blank" href="'.route($businessUrl, ['slug'=> $data->category->slug, 'url'=> $data->business_url]).'" class="dropdown-item">View</a>';
              $text .='<div class="dropdown-divider"></div>';
            }
            
            if($data->status !== 2) {
              $text .='<a href="'.route($stsUrl, ['id'=> $data->id, 'status'=> 2]).'" class="dropdown-item">Pending</a>';
              $text .='<div class="dropdown-divider"></div>';
            }
            if($data->status !== 3) {
              $text .='<a href="'.route($stsUrl, ['id'=> $data->id, 'status'=> 3]).'" class="dropdown-item">Approved</a>';
              $text .='<div class="dropdown-divider"></div>';
            }
            if($data->status !== 4) {
              $text .='<a class="dropdown-item" data-toggle="modal" data-action="'.route('admin_vendor_business_rejectBusinessStatus', ['user_id'=> $data->vendors->id, 'service_id' => $data->id]).'" data-vendor_page="'.route('myBusinessView', ['slug' => $data->category->slug, 'url'=> $data->business_url]).'" data-return_url="'.route('admin.business.index').'" onClick = "modalClick(this);" id="openRejectModal" href="javascript:void(0);" data-target="#rejectModal">
                                          Rejected
                                        </a>';
            }
            $text .='</div>';
            $text .='</div>';

            return $text;
}
}
