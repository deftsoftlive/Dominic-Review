<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vouchure;

class VochureController extends Controller
{
    /*----------------------------------------
    |
    |   VOCHURE MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of vochure
    |----------------------------------------*/ 
    public function vochure_index() {
        $vochure = Vouchure::orderBy('id','desc')->paginate(10);
    	return view('admin.vochure.index',compact('vochure'))
    	->with(['title' => 'Vochure Management', 'addLink' => 'admin.vochure.showCreate']);
    }

    /*----------------------------------------
    |   Listing of active vochure
    |----------------------------------------*/ 
    public function vochure_active() {
        $vochure = Vouchure::where('status',1)->orderBy('id','desc')->paginate(10);
    	return view('admin.vochure.active',compact('vochure'))
    	->with(['title' => 'Vochure Management', 'addLink' => 'admin.vochure.showCreate']);
    }

    /*----------------------------------------
    |   Listing of in-active vochure
    |----------------------------------------*/ 
    public function vochure_inactive() {
        $vochure = Vouchure::where('status',0)->orderBy('id','desc')->paginate(10);
    	return view('admin.vochure.inactive',compact('vochure'))
    	->with(['title' => 'Vochure Management', 'addLink' => 'admin.vochure.showCreate']);
    }

    public function vochure_showCreate() {
    	return view('admin.vochure.create')->with(['title' => 'Create Voucher', 'addLink' => 'admin.vochure.list']);
    }

    /*----------------------------------------
    |   Add vochure 
    |----------------------------------------*/ 
    public function vochure_create(Request $request) {

        // All selected courses
        $co_data = $request->courses;
        if(!empty($co_data)){
            $courses = implode(',', $request->courses); 
        }else{
            $courses ="";
        }

        // All selected camps
        $camp_data = $request->camps;
        if(!empty($camp_data)){
            $camps = implode(',', $request->camps); 
        }else{
            $camps ="";
        }

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$validatedData = $request->validate([
            'title' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	Vouchure::create([
    		'title' => $request['title'],
    		'start_date' => $request['start_date'],
    		'end_date' => $request['end_date'],
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products,
    		'status' => 0,
    	]);
    	return redirect()->route('admin.vochure.list')->with('flash_message', 'Voucher has been created successfully!');
    }

    /*----------------------------------------
    |   Edit vochure content
    |----------------------------------------*/ 
    public function vochure_showEdit($slug) {
    	$venue = Vouchure::FindBySlugOrFail($slug);	
    	return view('admin.vochure.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Voucher', 'addLink' => 'admin.vochure.list']);
    }

    /*----------------------------------------
    |   Update vochure content
    |----------------------------------------*/ 
    public function vochure_update(Request $request, $id) {  

    	// dd($request->all());

        // All selected courses
        $co_data = $request->courses;
        if(!empty($co_data)){
            $courses = implode(',', $request->courses); 
        }else{
            $courses ="";
        }

        // All selected camps
        $camp_data = $request->camps;
        if(!empty($camp_data)){
            $camps = implode(',', $request->camps); 
        }else{
            $camps ="";
        }

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$validatedData = $request->validate([
            'title' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	$venue = Vouchure::find($request->id);
    	$venue->update([
    		'title' => $request['title'],
    		'start_date' => $request['start_date'],
    		'end_date' => $request['end_date'],
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products
    	]);
    	return redirect()->route('admin.vochure.list')->with('flash_message', 'Voucher has been updated successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the vochure
    |-----------------------------------------------*/ 
    public function vochure_Status($id) {
     $venue = Vouchure::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Voucher of <b>'.$venue->title.'</b> is Activated' : 'Voucher of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.vochure.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }
}
