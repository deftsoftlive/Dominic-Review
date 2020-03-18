<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Models\InviteVendor;
class VendorsController extends Controller
{
   

#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function index()
	{
		$vendors = InviteVendor::where('user_id',Auth::user()->id)->where('type','vendor')->paginate(15);
		return view('users.vendors.index')->with('vendors',$vendors);
	}

#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function add()
	{
		$categories = Category::where('parent',0)->orderBy('label','ASC')->where('status',1)->get();
		return view('users.vendors.add')->with('categories',$categories);
	}

#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function store(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            'label' => 'required',
            'business_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'detail' => 'required',
		],[
           'label.required' => 'The category field is required.'
		]);

		 $v = new InviteVendor;
		 $v->name = $request->name;
		 $v->category_id = $request->label;
		 $v->business_name = $request->business_name;
		 $v->address = $request->address;
		 $v->phone_number = $request->phone_number;
		 $v->email = $request->email;
		 $v->detail = $request->detail;
		 $v->status = 0;
		 $v->user_id = Auth::user()->id;
		 $v->save();
         return redirect()->back()->with('messages','Your request has been sent successfully');
	}
#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function index2()
	{
		$vendors = InviteVendor::where('user_id',Auth::user()->id)->where('type','user')->paginate(15);
		return view('users.inviteUser.index')->with('vendors',$vendors);
	}

#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function add2()
	{
		$categories = Category::where('parent',0)->orderBy('label','ASC')->where('status',1)->get();
		return view('users.inviteUser.add')->with('categories',$categories);
	}

#----------------------------------------------------------------------------------------
# Invisting the Vendors
#----------------------------------------------------------------------------------------

	public function store2(Request $request)
	{
		$this->validate($request,[
            'name' => 'required',
            
            'phone_number' => 'required',
            'email' => 'required',
            'detail' => 'required',
		],[
           'label.required' => 'The category field is required.'
		]);

		 $v = new InviteVendor;
		 $v->name = $request->name;
		 
		 
		 $v->phone_number = $request->phone_number;
		 $v->email = $request->email;
		 $v->detail = $request->detail;
		 $v->status = 0;
		 $v->user_id = Auth::user()->id;
		 $v->type = 'user';
		 $v->save();
         return redirect()->back()->with('messages','Your request has been sent successfully');
	}

}
