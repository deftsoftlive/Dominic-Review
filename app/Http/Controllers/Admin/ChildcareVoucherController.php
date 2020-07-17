<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ChildcareVoucher;

class ChildcareVoucherController extends Controller
{
    /*----------------------------------------
    |
    |   Childcare Voucher MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of Childcare Vouchers
    |----------------------------------------*/ 
    public function childcare_voucher_index() {
        $ChildcareVoucher = ChildcareVoucher::select(['id','provider_name', 'provider_code','status','slug'])->paginate(10);
    	return view('admin.ChildcareVoucher.index',compact('ChildcareVoucher'))
    	->with(['title' => 'Childcare  Voucher Management', 'addLink' => 'admin.ChildcareVoucher.showCreate']);
    }

    public function childcare_voucher_showCreate() {
    	return view('admin.ChildcareVoucher.create')->with(['title' => 'Create Childcare Voucher', 'addLink' => 'admin.ChildcareVoucher.list']);
    }

    /*----------------------------------------
    |   Add Childcare Voucher 
    |----------------------------------------*/ 
    public function childcare_voucher_create(Request $request) {
    	$validatedData = $request->validate([
            'provider_name' => ['required'],
            'provider_code' => ['required']
        ]);

    	ChildcareVoucher::create([
    		'provider_name' => $request['provider_name'],
    		'provider_code' => $request['provider_code'],
    		'status' => 0,
    	]);
    	return redirect()->route('admin.ChildcareVoucher.list')->with('flash_message', 'Childcare Voucher has been created successfully!');
    }

    /*----------------------------------------
    |   Edit Childcare Voucher content
    |----------------------------------------*/ 
    public function childcare_voucher_showEdit($slug) {
    	$venue = ChildcareVoucher::FindBySlugOrFail($slug);
    	return view('admin.ChildcareVoucher.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Childcare Voucher', 'addLink' => 'admin.ChildcareVoucher.list']);
    }

    /*----------------------------------------
    |   Update Childcare Voucher content
    |----------------------------------------*/ 
    public function childcare_voucher_update(Request $request, $slug) {
    	$validatedData = $request->validate([
            'provider_name' => ['required'],
            'provider_code' => ['required']
        ]);

    	$venue = ChildcareVoucher::FindBySlugOrFail($slug);
    	$venue->update([
    		'provider_name' => $request['provider_name'],
    		'provider_code' => $request['provider_code'],
    	]);
    	return redirect()->route('admin.ChildcareVoucher.list')->with('flash_message', 'Childcare Voucher has been updated successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the Childcare Voucher
    |-----------------------------------------------*/ 
    public function childcare_voucher_Status($slug) {
     $venue = ChildcareVoucher::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Childcare Voucher of <b>'.$venue->provider_name.'</b> is Activated' : 'Childcare Voucher of <b>'.$venue->provider_name.'</b> is Deactivated';
       return redirect(route('admin.ChildcareVoucher.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }
}
