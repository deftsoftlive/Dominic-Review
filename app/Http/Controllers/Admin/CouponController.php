<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Coupon;
use App\User;
use App\Course;
use App\Camp;
use App\Product;
use Excel;

class CouponController extends Controller
{
    /*----------------------------------------
    |
    |   COUPON MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of coupons
    |----------------------------------------*/ 
    public function coupon_index() {
        $coupon = Coupon::orderBy('id','desc')->paginate(10);
    	return view('admin.coupon.index',compact('coupon'))
    	->with(['title' => 'Coupon Management', 'addLink' => 'admin.coupon.showCreate']);
    }

    public function coupon_showCreate() {
    	return view('admin.coupon.create')->with(['title' => 'Create Coupon', 'addLink' => 'admin.coupon.list']);
    }

    /*----------------------------------------
    |   Add coupon 
    |----------------------------------------*/ 
    public function coupon_create(Request $request) {

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
            'coupon_code' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	Coupon::create([
    		'coupon_code' => $request['coupon_code'],
    		'start_date' => date('d-m-Y',strtotime($request['start_date'])),
    		'end_date' => date('d-m-Y',strtotime($request['end_date'])),
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products,
    		'status' => 0,
    	]);
    	return redirect()->route('admin.coupon.list')->with('flash_message', 'Coupon has been created successfully!');
    }

    /*----------------------------------------
    |   Edit coupon content
    |----------------------------------------*/ 
    public function coupon_showEdit($slug) {
    	$venue = Coupon::find($slug);
    	return view('admin.coupon.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Coupon', 'addLink' => 'admin.coupon.list']);
    }

    /*----------------------------------------
    |   Update coupon content
    |----------------------------------------*/ 
    public function coupon_update(Request $request, $id) {  

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
            'coupon_code' => ['required'],
            'start_date' => ['required'],
            'end_date' => ['required'],
            'flat_discount' => ['required','numeric','min:1','max:100']
        ]);

    	$venue = Coupon::find($id);
    	$venue->update([
    		'coupon_code' => $request['coupon_code'],
    		'start_date' => date('d-m-Y',strtotime($request['start_date'])),
            'end_date' => date('d-m-Y',strtotime($request['end_date'])),
            'discount_type' => $request['discount_type'],
    		'uses' => $request['uses'],
    		'flat_discount' => $request['flat_discount'],
            'courses' => $courses,
            'camps' => $camps,
            'products' => $products
    	]);
    	return redirect()->route('admin.coupon.list')->with('flash_message', 'Coupon has been updated successfully!');
    }
    
    /*----------------------------------------
    |   Delete Coupon Record
    |----------------------------------------*/
    public function delete_coupon($id) {
        $course = Coupon::find($id);
        $course->delete();
        return \Redirect::back()->with('flash_message',' Coupon has been deleted successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the coupon
    |-----------------------------------------------*/ 
    public function coupon_Status($id) {
     $venue = Coupon::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Coupon of <b>'.$venue->coupon_code.'</b> is Activated' : 'Coupon of <b>'.$venue->coupon_code.'</b> is Deactivated';
       return redirect(route('admin.coupon.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    }

    /*----------------------------------------
    |   Create duplicate coupon functionality
    |----------------------------------------*/
    public function duplicate_coupon($id) {
        $tasks = Coupon::find($id);
        $newTask = $tasks->replicate();
        $newTask->coupon_code = $tasks->coupon_code.'(copy)';
        $newTask->status = '0';
        $newTask->save();

        return redirect('admin/coupon/'.$newTask->id)->with('flash_message',' Coupon has been replicated successfully!');
    }

    /*----------------------------------------
    |   Excel Export of coupons
    |----------------------------------------*/
    public function export_coupon_csv()
    {
        // All coupons
        $coupon_data = Coupon::orderBy('id','desc')->get()->toArray();   

        $coupon_array = array();
        $heading_data = array();
        $i = 1;
         $heading_data[] = [
            0  => 'id',
            1  => 'coupon_code',
            2  => 'start_date',
            3  => 'end_date',
            4  => 'uses',
            5  => 'discount_type',
            6  => 'amount',
            7  => 'flat_discount',
            8  => 'courses',
            9  => 'camps',
            10 => 'products',
            11 => 'status'
            ];

        $coupon_array=$heading_data;

        // Coupon Array
        $i = 1;
        foreach($coupon_data as $data){   

            // if($data['status'] == 1){
            //     $status = 'Active';
            // }
            // elseif($data['status'] == 0){
            //     $status = 'Inactive';
            // }

            $coupon_array[$i][1]  = $data['id'];
            $coupon_array[$i][2]  = $data['coupon_code'];
            $coupon_array[$i][3]  = $data['start_date'];
            $coupon_array[$i][4]  = $data['end_date'];
            $coupon_array[$i][5]  = $data['uses'];
            $coupon_array[$i][6]  = $data['discount_type'];
            $coupon_array[$i][7]  = $data['amount'];
            $coupon_array[$i][8]  = $data['flat_discount'];
            $coupon_array[$i][9]  = $data['courses'];
            $coupon_array[$i][10] = $data['camps'];
            $coupon_array[$i][11] = $data['products'];
            $coupon_array[$i][12] = $data['status'];

            $i++; 
        }

        if (ob_get_contents()) { ob_end_clean(); }
        ob_start();

        Excel::create('Coupon Data', function($excel) use ($coupon_array){
            $excel->setTitle('Coupon Data');
            $excel->sheet('Coupon Data', function($sheet) use ($coupon_array){
                $sheet->fromArray($coupon_array, null, 'A1', false, false);
            });
        })->download('xls');

        return view('export_excel',compact('coupon_data'));
    }

    /*-----------------------------------------------
    |   Template to upload the CSV of coupon
    |-----------------------------------------------*/
    public function coupon_import_csv()
    {
        return view('admin.coupon.upload-csv'); 
    } 

    /*-----------------------------------------------
    |   Save imported coupons
    |-----------------------------------------------*/
    public function save_coupon_csv(Request $request)
    {
        //dd($request->all()); 

        if(!empty($request->csv))
        {
            $filename = $request->csv;
            if ($request->hasFile('csv')) 
            {
               $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
               $csv = $request->file('csv');
               $filename = time().'-'.$random.'.'.$csv->getClientOriginalExtension();  
               $destinationPath = public_path('/uploads/coupon-csv');
               $excel_file_path = public_path().'/uploads/test-excel'.$request->csv; 
               $csv->move($destinationPath, $filename); 
            }
        }

        $path = public_path().'/uploads/coupon-csv/'.$filename; 
        chmod($path, 0777); 

        config(['excel.import.startRow' => 1]);
        $data = Excel::load($path)->get(); 
        $complete_data = json_encode($data->toArray()); 

       // dd($complete_data);

        if(!empty($data) && $data->count()){

            $test_score = [];   
            //dd($data->toArray());

            foreach ($data->toArray() as $key => $value) {  

                //dd($value);

                if(!empty($value)){ 

                    $check_coupon = Coupon::where('id',$value['id'])->first();

                    if($value['courses'] == 'All')
                    {
                        $courses = Course::orderBy('id','asc')->get();
                        $course_ids = [];

                        foreach($courses as $course)
                        {
                            $course_ids[] = $course->id;
                        }
                        $courses = !empty($course_ids) ? implode(',',$course_ids) : '';
                    }else{
                        $courses = $value['courses'];
                    }

                    if($value['camps'] == 'All')
                    {
                        $camps = Camp::orderBy('id','asc')->get(); 
                        $camp_ids = [];

                        foreach($camps as $camp)
                        {
                            $camp_ids[] = $camp->id;
                        }
                        
                        $camps = !empty($camp_ids) ? implode(',',$camp_ids) : '';
                    }else{
                        $camps = $value['camps'];
                    }

                    if($value['products'] == 'All')
                    {
                        $products = Product::orderBy('id','asc')->get();
                        $product_ids = [];

                        foreach($products as $product)
                        {
                            $product_ids[] = $product->id;
                        }
                        $products = !empty($product_ids) ? implode(',',$product_ids) : '';
                    }else{
                        $products = $value['products'];
                    }

                    if(!empty($check_coupon))
                    {
                        $co = Coupon::find($value['id']);
                        $co->update([
                            'coupon_code'   => $value['coupon_code'],
                            'start_date'    => date('d-m-Y',strtotime($value['start_date'])),
                            'end_date'      => date('d-m-Y',strtotime($value['end_date'])),
                            'uses'          => $value['uses'],
                            'discount_type' => $value['discount_type'],
                            'amount'        => $value['amount'],
                            'flat_discount' => $value['flat_discount'],
                            'courses'       => $courses,
                            'camps'         => $camps,
                            'products'      => $products,
                            'status'        => $value['status'],
                        ]);
                    }else{
                        $co                 =  new Coupon;
                        $co->coupon_code    =  $value['coupon_code'];
                        $co->start_date     =  date('d-m-Y',strtotime($value['start_date']));
                        $co->end_date       =  date('d-m-Y',strtotime($value['end_date']));
                        $co->uses           =  $value['uses'];
                        $co->discount_type  =  $value['discount_type'];
                        $co->amount         =  $value['amount'];
                        $co->flat_discount  =  $value['flat_discount'];
                        $co->courses        =  $courses;
                        $co->camps          =  $camps;
                        $co->products       =  $products;
                        $co->status         =  $value['status'];
                        $co->save();
                    }
                }
            }
        }

        return redirect()->route('admin.coupon.list')->with('flash_message', 'Coupon CSV has been uploaded successfully!'); 
    } 
}
