<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Camp;
use App\Session;
use App\CampPrice;
use App\CampCategory;
use App\Models\Shop\ShopOrder;
use App\Models\Shop\ShopCartItems;

class CampController extends Controller
{
    /*----------------------------------------
    |
    |   CAMP MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of camps
    |----------------------------------------*/ 
    public function camp_index() {
        $camp = Camp::select(['id','title','category','description','status','slug'])->orderBy('id','desc')->paginate(10);
    	return view('admin.camp.index',compact('camp'))
    	->with(['title' => 'Camp Management', 'addLink' => 'admin.camp.showCreate']);
    }

    public function camp_showCreate() {
        $campcategory = CampCategory::get();
    	return view('admin.camp.create',compact('campcategory'))->with(['title' => 'Create Camp', 'addLink' => 'admin.camp.list']);
    }

    /*----------------------------------------
    |   Add camp 
    |----------------------------------------*/ 
    public function camp_create(Request $request) {

    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'location' => ['required'],
            'term' => ['required'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'category' => ['required', 'string'],
            'camp_date' => ['required'],
            'account_id' => ['required'],
            'coach_cost' => ['required', 'numeric', 'max:100'],
            'venue_cost' => ['required', 'numeric', 'max:100'],
            'equipment_cost' => ['required', 'numeric', 'max:100'],
            'other_cost' => ['required', 'numeric', 'max:100'],
            'tax_cost' => ['required', 'numeric', 'max:100']
        ]);

        $arrSku = $request->Week;   
        //dd($arrSku);

        $arrNewSku = array();
        $incI = 0;
        foreach($arrSku as $arrKey => $arrData){ 
            //dd($arrKey,$arrData['Monday']);

            if(!empty($arrData['StartDate'])){
                $arrNewSku[$incI]['StartDate'] = isset($arrData['StartDate']) ? $arrData['StartDate'] : '';
            }

            if(!empty($arrData['EndDate'])){
                $arrNewSku[$incI]['EndDate'] = isset($arrData['EndDate']) ? $arrData['EndDate'] : '';
            }

            if(isset($arrData['Monday'])){
                $arrNewSku[$incI]['Monday'] = isset($arrData['Monday']) ? $arrData['Monday'] : '';
            }
            if(isset($arrData['Tuesday'])){
                $arrNewSku[$incI]['Tuesday'] = isset($arrData['Tuesday']) ? $arrData['Tuesday'] : '';
            }
            if(isset($arrData['Wednesday'])){
                $arrNewSku[$incI]['Wednesday'] = isset($arrData['Wednesday']) ? $arrData['Wednesday'] : '';
            }
            if(isset($arrData['Thursday'])){
                $arrNewSku[$incI]['Thursday'] = isset($arrData['Thursday']) ? $arrData['Thursday'] : '';
            }
            if(isset($arrData['Friday'])){
                $arrNewSku[$incI]['Friday'] = isset($arrData['Friday']) ? $arrData['Friday'] : '';
            }
            if(isset($arrData['Fullweek'])){
                $arrNewSku[$incI]['Fullweek'] = isset($arrData['Fullweek']) ? $arrData['Fullweek'] : '';
            }
            if(isset($arrData['Selected'])){
                $arrNewSku[$incI]['Selected'] = isset($arrData['Selected']) ? $arrData['Selected'] : '';  
            }
        }

        $selected_session = json_encode($request->Session); 

        //Convert array to json form...
        $encodedSku = json_encode($arrNewSku);

    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $image->move($destinationPath, $filename);
    	}

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_filename = time().'.'.$logo->getClientOriginalExtension();
            $logo_destinationPath = public_path('/uploads');
            $logo->move($logo_destinationPath, $logo_filename);
        }

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$camp = Camp::create([
            'logo' => $logo_filename,
    		'title' => $request['title'],
            'location' => $request['location'],
            'term' => $request['term'],
            'account_id' => $request['account_id'],
    		'description' => $request['description'],
            'usefull_info' => $request['usefull_info'],
            'info_email_content' => $request['info_email_content'],
    		// 'image' => $filename,
    		'category' => $request['category'],
            'coach_cost' => $request['coach_cost'],
            'venue_cost' => $request['venue_cost'],
            'equipment_cost' => $request['equipment_cost'],
            'other_cost' => $request['other_cost'],
            'tax_cost' => $request['tax_cost'],
            'camp_date' => $request['camp_date'],
            'popup_title' => $request['popup_title'],
            'popup_subtitle' => $request['popup_subtitle'],
            'popup_enable' => $request['popup_enable'],
            'products' => $products,
    	]);

        $camp_id = $camp->id;
        $camp_price = CampPrice::create($request->all());
        $camp_price->week = $encodedSku;
        $camp_price->selected_session = $selected_session;
        $camp_price->camp_id = $camp_id;
        $camp_price->save();

    	return redirect()->route('admin.camp.list')->with('flash_message', 'Camp has been created successfully!');
    }

    /*----------------------------------------
    |   Edit camp content
    |----------------------------------------*/ 
    public function camp_showEdit($slug) {
    	$venue = Camp::FindBySlugOrFail($slug);
        $campcategory = CampCategory::get();
    	return view('admin.camp.edit',compact('campcategory'))
    	->with(['venue' => $venue, 'title' => 'Edit Camp', 'addLink' => 'admin.camp.list']);
    }

    /*----------------------------------------
    |   Update camp content
    |----------------------------------------*/ 
    public function camp_update(Request $request, $slug) 
    {  
        // dd($request->all());

    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            'location' => ['required'],
            'term' => ['required'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'category' => ['required', 'string'],
            'camp_date' => ['required'],
            'account_id' => ['required'],
            'coach_cost' => ['required', 'numeric', 'max:100'],
            'venue_cost' => ['required', 'numeric', 'max:100'],
            'equipment_cost' => ['required', 'numeric', 'max:100'],
            'other_cost' => ['required', 'numeric', 'max:100'],
            'tax_cost' => ['required', 'numeric', 'max:100']
        ]);

        $arrSku = $request->Week;   
        //dd($arrSku);

        $arrNewSku = array();
        $incI = 0;
        foreach($arrSku as $arrKey => $arrData){ 

            if(!empty($arrData['StartDate'])){
                $arrNewSku[$incI]['StartDate'] = isset($arrData['StartDate']) ? $arrData['StartDate'] : '';
            }

            if(!empty($arrData['EndDate'])){
                $arrNewSku[$incI]['EndDate'] = isset($arrData['EndDate']) ? $arrData['EndDate'] : '';
            }
            
            if(isset($arrData['Monday'])){
                $arrNewSku[$incI]['Monday'] = isset($arrData['Monday']) ? $arrData['Monday'] : '';
                $arrNewSku[$incI]['MondayDate'] = isset($arrData['MondayDate']) ? $arrData['MondayDate'] : '';
            }
            if(isset($arrData['Tuesday'])){
                $arrNewSku[$incI]['Tuesday'] = isset($arrData['Tuesday']) ? $arrData['Tuesday'] : '';
                $arrNewSku[$incI]['TuesdayDate'] = isset($arrData['TuesdayDate']) ? $arrData['TuesdayDate'] : '';
            }
            if(isset($arrData['Wednesday'])){
                $arrNewSku[$incI]['Wednesday'] = isset($arrData['Wednesday']) ? $arrData['Wednesday'] : '';
                $arrNewSku[$incI]['WednesdayDate'] = isset($arrData['WednesdayDate']) ? $arrData['WednesdayDate'] : '';
            }
            if(isset($arrData['Thursday'])){
                $arrNewSku[$incI]['Thursday'] = isset($arrData['Thursday']) ? $arrData['Thursday'] : '';
                $arrNewSku[$incI]['ThursdayDate'] = isset($arrData['ThursdayDate']) ? $arrData['ThursdayDate'] : '';
            }
            if(isset($arrData['Friday'])){
                $arrNewSku[$incI]['Friday'] = isset($arrData['Friday']) ? $arrData['Friday'] : '';
                $arrNewSku[$incI]['FridayDate'] = isset($arrData['FridayDate']) ? $arrData['FridayDate'] : '';
            }
            if(isset($arrData['Fullweek'])){
                $arrNewSku[$incI]['Fullweek'] = isset($arrData['Fullweek']) ? $arrData['Fullweek'] : '';
                $arrNewSku[$incI]['FullweekDate'] = isset($arrData['FullweekDate']) ? $arrData['FullweekDate'] : '';
            }
            if(isset($arrData['Selected'])){
                $arrNewSku[$incI]['Selected'] = isset($arrData['Selected']) ? $arrData['Selected'] : '';  
            }

            $incI++;
        }

        $selected_session = json_encode($request->Session);  

        //Convert array to json form...
        $encodedSku = json_encode($arrNewSku);  

    	$venue = Camp::FindBySlugOrFail($slug);
    	$filename = $venue->image;
    	if ($request->hasFile('image')) {
	        $image = $request->file('image');
	        $filename = time().'.'.$image->getClientOriginalExtension();
	        $destinationPath = public_path('/uploads');
	        $img_path = public_path().'/uploads/'.$venue->image;
	        $image->move($destinationPath, $filename);
    	}

        $logo_filename = $venue->logo;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_filename = time().'.'.$logo->getClientOriginalExtension();
            $logo_destinationPath = public_path('/uploads');
            $logo_img_path = public_path().'/uploads/'.$venue->logo;
            $logo->move($logo_destinationPath, $logo_filename);
        }

        $camp_id = $request->camp_id;

        // All selected camps
        $product_data = $request->products;
        if(!empty($product_data)){
            $products = implode(',', $request->products); 
        }else{
            $products ="";
        }

    	$camp = $venue->update([
            'logo' => $logo_filename,
    		'title' => $request['title'],
            'location' => $request['location'],
            'term' => $request['term'],
            'description' => $request['description'],
            'usefull_info' => $request['usefull_info'],
            'info_email_content' => $request['info_email_content'],
            // 'image' => $filename,
            'category' => $request['category'],
            'camp_date' => $request['camp_date'],
            'account_id' => $request['account_id'],
            'coach_cost' => $request['coach_cost'],
            'venue_cost' => $request['venue_cost'],
            'equipment_cost' => $request['equipment_cost'],
            'other_cost' => $request['other_cost'],
            'tax_cost' => $request['tax_cost'],
            'popup_title' => $request['popup_title'],
            'popup_subtitle' => $request['popup_subtitle'],
            'popup_enable' => $request['popup_enable'],
            'products' => $products,
    	]);

        $camp_id = $camp_id;
        $camp_price_id = $request->camp_price_id;

        $camp_price = CampPrice::find($camp_price_id);
        $camp_price->week = $encodedSku;
        $camp_price->selected_session = $selected_session;
        $camp_price->early_price = $request->early_price;
        $camp_price->early_time = $request->early_time;
        $camp_price->early_percent = $request->early_percent;
        $camp_price->lunch_price = $request->lunch_price;
        $camp_price->lunch_time = $request->lunch_time;
        $camp_price->lunch_percent = $request->lunch_percent;
        $camp_price->fullday_price = $request->fullday_price;
        $camp_price->fullday_time = $request->fullday_time;
        $camp_price->latepickup_price = $request->latepickup_price;
        $camp_price->latepickup_time = $request->latepickup_time;
        $camp_price->latepickup_percent = $request->latepickup_percent;
        $camp_price->morning_price = $request->morning_price;
        $camp_price->morning_time = $request->morning_time;
        $camp_price->morning_seats = $request->morning_seats;
        $camp_price->morning_percent = $request->morning_percent;
        $camp_price->afternoon_price = $request->afternoon_price;
        $camp_price->afternoon_time = $request->afternoon_time;
        $camp_price->afternoon_seats = $request->afternoon_seats;
        $camp_price->afternoon_percent = $request->afternoon_percent;
        $camp_price->save();

    	return redirect()->route('admin.camp.list')->with('flash_message', 'Camp has been updated successfully!');
    }

    /*----------------------------------------
    |   Change the status of the camp
    |----------------------------------------*/ 
    public function camp_Status($slug) {
     $venue = Camp::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Camp of <b>'.$venue->title.'</b> is Activated' : 'Camp of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.camp.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*---------------------------------------
    |   Camp - View Register (Who book camp)
    |---------------------------------------*/
    public function camp_view_reg($id){
        $camp_id = $id;
        $shop = \DB::table('shop_cart_items')->where('shop_type','camp')->where('product_id',$camp_id)->where('orderID',NULL)->orderBy('id','desc')->get();
        return view('admin.camp.view-register',compact('shop'));
    }

    /*---------------------------------------
    |   Book a camp
    |---------------------------------------*/
    public function admin_book_a_camp($slug) 
    {
        $camp = Camp::FindBySlugOrFail($slug); 
        // $accordian_book_a_camp = Accordian::where('page_title','book-a-camp')->where('status',1)->orderBy('sort','asc')->get(); 
        $session = Session::where('status',1)->get();
        return view('admin.camp.book-a-camp',compact('camp','session'));
    }

    /*---------------------------------------
    |   Save book a camp
    |---------------------------------------*/
    public function submit_book_a_camp(Request $request) 
    {  
        $child = $request->parent;  

        if(!empty($child))
        {
            $camp_id = $request->camp_id; 
            $week = $request->week; 
            $child = $request->player;   

            $camp_price = CampPrice::where('camp_id',$camp_id)->first();

            $early_price = $camp_price->early_price; 
            $early_percent = $camp_price->early_percent;

            $lunch_price = $camp_price->lunch_price;
            $lunch_percent = $camp_price->lunch_price;

            $fullday_price = $camp_price->fullday_price;
            $fullday_percent = $camp_price->fullday_percent;

            $latepickup_price = $camp_price->latepickup_price;
            $latepickup_percent = $camp_price->latepickup_price;

            $morning_price = $camp_price->morning_price;
            $morning_seats = $camp_price->morning_seats;
            $morning_percent = $camp_price->morning_percent;

            $afternoon_price = $camp_price->afternoon_price;
            $afternoon_seats = $camp_price->afternoon_seats;
            $afternoon_percent = $camp_price->afternoon_percent;

            $arrNewSku = array();
            $incI = 0;
            $count_early = array();
            $count_late_pickup = array();
            $count_lunch_club = array();

            $camp_morning = array();
            $camp_noon = array();
            $camp_full = array();

              if(isset($week))
              {
                foreach($week as $arrKey => $arrData){ 

                  if(isset($arrData['early_drop'])){  
                    $arrNewSku[$incI]['early_drop'] = isset($arrData['early_drop']) ? $arrData['early_drop'] : '';
                    $count_early[] = count($arrData['early_drop'])*$early_price;
                  }

                  if(isset($arrData['late_pickup'])){  
                    $arrNewSku[$incI]['late_pickup'] = isset($arrData['late_pickup']) ? $arrData['late_pickup'] : '';
                    $count_late_pickup[] = count($arrData['late_pickup'])*$latepickup_price;
                  }

                  if(isset($arrData['lunch'])){  
                    $arrNewSku[$incI]['lunch'] = isset($arrData['lunch']) ? $arrData['lunch'] : '';
                    $count_lunch_club[] = count($arrData['lunch'])*$lunch_price;
                  }

                  if(isset($arrData['camp']))
                  {  
                    $camp_data = array();;
                    foreach ($arrData['camp'] as $sku){ 
                      $camp_array = explode('-',$sku);
                      $camp_data[] = $camp_array[2];
                    }
                    $camp_counts = array_count_values($camp_data);
                    $camp_morning[] = (isset($camp_counts['mor']) ? $camp_counts['mor'] : 0)*$morning_price;
                    $camp_noon[] = (isset($camp_counts['noon']) ? $camp_counts['noon'] : 0)*$afternoon_price;
                    $camp_full[] = (isset($camp_counts['full']) ? $camp_counts['full'] : 0)*$fullday_price;
                  }

                    $incI++;
                }

                // dd($request->all(), $camp_morning,$camp_noon,$camp_full);

                $early_drop_price = isset($count_early) ? array_sum($count_early) : '';
                $late_pickup_price = isset($count_late_pickup) ? array_sum($count_late_pickup) : '';
                $lunch_club_price = isset($count_lunch_club) ? array_sum($count_lunch_club) : '';

                $morning_price = isset($camp_morning) ? array_sum($camp_morning) : '';
                $afternoon_price = isset($camp_noon) ? array_sum($camp_noon) : '';
                $fullweek_price = isset($camp_full) ? array_sum($camp_full) : '';

                // Add Prices 
                $add_price = $early_drop_price+$late_pickup_price+$lunch_club_price+$morning_price+$afternoon_price+$fullweek_price;

                $sel_week = json_encode($request->week);


                $add_course = new ShopCartItems;
                $add_course->shop_type  = 'camp';
                $add_course->quantity   = 1;
                $add_course->vendor_id  = 1;
                $add_course->product_id = $camp_id;
                $add_course->user_id    = $request->parent;
                $add_course->price      = $add_price;
                $add_course->total      = $add_price;
                $add_course->week       = $sel_week;
                $add_course->camp_price = $add_price;
                $add_course->child_id   = $child;
                $add_course->type       = 'order';
                $add_course->orderID    = '#DRHSHOP'.strtotime(date('y-m-d h:i:s'));
                $add_course->manual     = '1';
                $add_course->save();


                $so = new ShopOrder;
                $so->user_id = $add_course->user_id;
                $so->payment_by = isset($request->payment_method) ? $request->payment_method : '';
                $so->amount = $add_price;
                $so->orderID = $add_course->orderID;
                $so->status = 1;
                // $so->billing_address = $billing_address;
                // $so->shipping_address = $shipping_address;

                if($so->save()){
                  return \Redirect::back()->with('success',' Camp booked successfully!');
                }else{
                  return \Redirect::back()->with('error',' Something went wrong!');
                }
            }
        
        }else{
           return \Redirect::back()->with('error',' Please select player.'); 
        }
    }
}
