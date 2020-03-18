<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Category;
use App\Models\Vendors\DiscountDeal;
use App\VendorPackage;

class DealController extends Controller
{


 public $path = 'images/vendors/deals/';

   #-----------------------------------------------------------------
   #    construct
   #-----------------------------------------------------------------
  
   public function getData($slug)
   {
   	  
      $category = Category::where('slug',$slug)
                           ->join('vendor_categories','vendor_categories.category_id','=','categories.id')
                           ->where('vendor_categories.user_id',Auth::user()->id);


      return $category->count() > 0 ? $category->first() : redirect()->route('vendor_dashboard')->with('messages','Please check your url, Its wrong!');

   	   
   }


   #-----------------------------------------------------------------
   #    index
   #-----------------------------------------------------------------
  
   public function index($slug)
   {
   	    $category = $this->getData($slug);
        $deals = DiscountDeal::where('category_id', $category->category_id)
                           ->where('user_id',Auth::user()->id);


 
       return view('vendors.management.deals.index')
              ->with('category',$category)
              ->with('deals',$deals->paginate(12))
              ->with('dealCount',$deals->count())
              ->with('slug',$slug)
              ->with('title',$category->label.' Management :: Deals & Discount');
   }


   #-----------------------------------------------------------------
   #    index
   #-----------------------------------------------------------------
  
   public function add($slug)
   {
   	  $category = $this->getData($slug);
      $packages = VendorPackage::where([
                      'category_id' => $category->category_id,
                      'user_id'=> Auth::User()->id,
                      'status'=> 1
                    ])->get();

      return view('vendors.management.deals.add')
              ->with('category', $category)
              ->with('addLink', 'vendor_deals_management')
              ->with('packages', $packages)
              ->with('slug', $slug)
              ->with('title', $category->label.' Management :: Deals & Discount');
   }


   #-----------------------------------------------------------------
   #    Store
   #-----------------------------------------------------------------
  
   public function store(Request $request,$slug)
   {
       $category = $this->getData($slug);


       $this->validate($request,[
             'title' => 'required',
             'description' => 'required',
             'image' => 'required|image',
             'message_text' => 'required',
       ]);
       
        
      $d = new DiscountDeal;
      $d->title = trim($request->title);
      $d->category_id = trim($category->category_id);
      $d->user_id = Auth::user()->id;
      $d->description = trim($request->description);
      $d->expiry_date = trim($request->expiry_date);
      $d->deal_life = trim($request->deal_life);
      $d->message_text = trim($request->message_text);
      $d->vendor_category_id = $this->getVendorCategoryID($category->category_id);
      $d->image = $request->hasFile('image') ? uploadFileWithAjax($this->path,$request->file('image')) : '';
      $d->title = trim($request->title);
      $d->min_price =$request->deal_off_type == 1 ? $request->min_amount : 0;
      $d->type_of_deal = trim($request->type_of_deal);
      $d->packages = $request->type_of_deal == 0 ? 0 : trim($request->packages);
      $d->start_date = trim($request->start_date);
      $d->amount = trim($request->amount);
      $d->deal_off_type = trim($request->deal_off_type);
      $d->deal_code = trim($request->deal_code);

      $d->save();

      return redirect()->route('vendor_deals_management',$slug)->with('messages','Deal & Discount added successfully.');



   }



   #-----------------------------------------------------------------
   #    edit
   #-----------------------------------------------------------------
  
   public function edit($slug, $id)
   {
   	  $category = $this->getData($slug);
        $deals =DiscountDeal::where('category_id',$category->category_id)
                           ->where('id', $id)
                           ->where('user_id',Auth::user()->id);

      $packages = VendorPackage::where([
                      'category_id' => $category->category_id,
                      'user_id'=> Auth::User()->id,
                      'status'=> 1
                    ])->get();
      // dd($packages);

        if($deals->count() == 0){
        	return redirect()->back()->with('error_message','Something Wrong!');
        }
        $deal = $deals->first();
      return view('vendors.management.deals.edit')
              ->with('category',$category)
              ->with('slug',$slug)
              ->with('packages', $packages)
              ->with('deal',$deal)
              ->with('addLink', 'vendor_deals_management')
              ->with('title',$category->label.' Management :: Deals & Discount');
   }


   #-----------------------------------------------------------------
   #    update
   #-----------------------------------------------------------------
  
   public function update(Request $request,$slug,$id)
   {
       $category = $this->getData($slug);


       $this->validate($request,[
             'title' => 'required',
             'description' => 'required',
             'image' => 'image',
             'message_text' => 'required',
       ]);
         $deals =DiscountDeal::where('category_id',$category->category_id)
                           ->where('id',$id)
                           ->where('user_id',Auth::user()->id);
       if($deals->count() == 0){
        	return redirect()->back()->with('error_message','Something Wrong!');
        }

        $deal = $deals->first();
       
        
      $d =DiscountDeal::find($id);
      $d->title = trim($request->title);
      $d->category_id = trim($category->category_id);
      $d->user_id = Auth::user()->id;
      $d->description = trim($request->description);
      $d->message_text = trim($request->message_text);
      $d->deal_life = trim($request->deal_life);
      $d->image = $request->hasFile('image') ? uploadFileWithAjax($this->path,$request->file('image')) : $d->image;
      $d->title = trim($request->title);
      $d->min_price =$request->deal_off_type == 1 ? $request->min_amount : 0;
      $d->type_of_deal = trim($request->type_of_deal);
      $d->packages = trim($request->packages);
      $d->start_date = trim($request->start_date);
      $d->expiry_date = trim($request->expiry_date);
      $d->amount = trim($request->amount);
      $d->deal_off_type = trim($request->deal_off_type);
      $d->deal_code = trim($request->deal_code);
      
      $d->vendor_category_id = $this->getVendorCategoryID($category->category_id);
      $d->save();

      return redirect()->route('vendor_deals_management',$slug)->with('messages','Deal & Discount updated successfully.');



   }



public function getVendorCategoryID($category_id)
{
        $VendorCategory = \App\VendorCategory::where('user_id',Auth::user()->id)
       ->where('category_id',$category_id);
       $vendor = $VendorCategory->first();
       return $vendor_category_id = $VendorCategory->count() > 0 ? $vendor->id : 0;

}
   #-----------------------------------------------------------------
   #    update
   #-----------------------------------------------------------------
  

  public function delete(Request $request,$slug,$id)
  {
  	  $category = $this->getData($slug);

       $deals =DiscountDeal::where('category_id',$category->category_id)
                           ->where('id',$id)
                           ->where('user_id',Auth::user()->id);
       if($deals->count() == 0){
        	return redirect()->back()->with('error_message','Something Wrong!');
        }

        $deal = $deals->delete();

          return redirect()->route('vendor_deals_management',$slug)->with('messages','Deal & Discount deleted successfully.');
  }

}