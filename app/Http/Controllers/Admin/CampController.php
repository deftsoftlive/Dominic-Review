<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Camp;
use App\CampPrice;
use App\CampCategory;

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
        $camp = Camp::select(['id','title','category','description','status','slug'])->paginate(10);
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
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'category' => ['required', 'string'],
            'camp_date' => ['required']
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
    		'description' => $request['description'],
            'usefull_info' => $request['usefull_info'],
    		'image' => $filename,
    		'category' => $request['category'],
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
    public function camp_update(Request $request, $slug) {  //dd($request->all());
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
            // 'image' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'category' => ['required', 'string'],
            'camp_date' => ['required']
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
            'image' => $filename,
            'category' => $request['category'],
            'camp_date' => $request['camp_date'],
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
}
