<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Test;
use App\User;
use App\TestCategory;
use App\TestScore;
use App\Course;
use Excel;

class TestController extends Controller
{
    /*----------------------------------------
    |
    |   Test MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of Test
    |----------------------------------------*/ 
    public function test_index() {  

        $test = request()->get('test');

        if(!empty(request()->get('test')))
        {
            $test = Test::select(['id','title','slug','season','courses','status','test_cat_id'])->where( 'title', 'LIKE', '%' . $test . '%' )->paginate(10); 
        }
        else{
            $test = Test::select(['id','title','slug','season','courses','status','test_cat_id'])->paginate(10);    
        }
        return view('admin.test.index',compact('test'))->with(['title' => 'Test Management', 'addLink' => 'admin.test.showCreate']);
    }

    /*----------------------------------------
    |   Listing of Active Test
    |----------------------------------------*/ 
    public function test_active() {  

        $test = request()->get('test');

        if(!empty(request()->get('test')))
        {
            $test = Test::where('status',1)->select(['id','title','slug','season','courses','status','test_cat_id'])->where( 'title', 'LIKE', '%' . $test . '%' )->paginate(10); 
        }
        else{
            $test = Test::where('status',1)->select(['id','title','slug','season','courses','status','test_cat_id'])->paginate(10);    
        }
        return view('admin.test.active',compact('test'))->with(['title' => 'Test Management', 'addLink' => 'admin.test.showCreate']);
    }

    /*----------------------------------------
    |   Listing of In-Active Test
    |----------------------------------------*/ 
    public function test_inactive() {  

        $test = request()->get('test');

        if(!empty(request()->get('test')))
        {
            $test = Test::where('status',0)->select(['id','title','slug','season','courses','status','test_cat_id'])->where( 'title', 'LIKE', '%' . $test . '%' )->paginate(10); 
        }
        else{
            $test = Test::where('status',0)->select(['id','title','slug','season','courses','status','test_cat_id'])->paginate(10);    
        }
        
        // dd($test);
        return view('admin.test.inactive',compact('test'))->with(['title' => 'Test Management', 'addLink' => 'admin.test.showCreate']);
    }

    public function test_showCreate() {
        return view('admin.test.create')->with(['title' => 'Create Test', 'addLink' => 'admin.test.list']);
    }

    /*----------------------------------------
    |   Add test 
    |----------------------------------------*/ 
    public function test_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string']
        ]);

        // All selected courses
        // $courses_data = $request->courses;
        // if(!empty($courses_data)){
        //     $courses = implode(',', $request->courses); 
        // }else{
        //     $courses ="";
        // }

    	Test::create([
    		'title'       => $request['title'],
    		'description' => $request['description'],
    		'test_cat_id' => $request['test_cat_id'],
            'season'      => $request['season'],
            'courses'     => $request['course'],
            'status'      => 0,
    	]);
    	return redirect()->route('admin.test.list')->with('flash_message', 'Test has been created successfully!');
    }

    /*----------------------------------------
    |   Edit test content
    |----------------------------------------*/ 
    public function test_showEdit($slug) {
    	$venue = Test::FindBySlugOrFail($slug);
    	return view('admin.test.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Test', 'addLink' => 'admin.test.list']);
    }

    /*----------------------------------------
    |   Update testcategory content
    |----------------------------------------*/ 
    public function test_update(Request $request, $slug) {	//dd($request->all());
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string'],
        ]);

        // All selected courses
        // $courses_data = $request->courses;
        // if(!empty($courses_data)){
        //     $courses = implode(',', $request->courses); 
        // }else{
        //     $courses ="";
        // }

    	$venue = Test::FindBySlugOrFail($slug);
    	$venue->update([
    		'title'       => $request['title'],
    		'description' => $request['description'],
    		'test_cat_id' => $request['test_cat_id'],
            'season'      => $request['season'],
            'courses'     => !empty($request['course']) ? $request['course'] : $request['selected_course']

            
    	]);
    	return redirect()->route('admin.test.list')->with('flash_message', 'Test has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_test($id) {  
        $user = Test::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Test has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the testcategory
    |----------------------------------------*/ 
    public function test_Status($slug) {
     $venue = Test::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Test of <b>'.$venue->title.'</b> is Activated' : 'Test of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.test.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Wrong!');
    } 

    /*----------------------------------------
    |   Export Excel
    |----------------------------------------*/ 
    public function excel_export()
    {
        $customer_data = Test::orderBy('id','asc')->get();
        return view('export_excel',compact('customer_data'));
    }

    /*----------------------------------------
    |   Excel Export - Test Score
    |----------------------------------------*/
    public function excel($season, $course)
    {
        // dd(getCourseName($course),$season,$course);
        $customer_data = Test::where('courses',$course)->where('season',$season)->where('status',1)->orderBy('test_cat_id', 'asc')->get()->toArray();
        $course_data = Course::where('id',$course)->first();  

        $customer_array = array();
        $heading_data = array();
        $i = 1;
        $heading_data[] = array(
            "Season - ".getSeasonname($season),
            "Course - ".$course_data->title,
            "Date - ".$course_data->created_at
            );

        $customer_array=$heading_data;

        $customer_array[$i][]="User details";

        // Test Category
        foreach($customer_data as $data){   
            $customer_array[$i][] = getTestCatname($data['test_cat_id']).'-'.$data['test_cat_id'];
        }
        $testCategory=[];
        $i++;
        $testCategory[]="#";

        // Tests 
        foreach($customer_data as $key=>$customer)
        {
            $testCategory[] =$customer['title'].'-'.$customer['id'];   
        }

        $customer_array[$i]=$testCategory;


        $shop = \DB::table('shop_cart_items')->where('product_id',$course)->where('shop_type','course')->where('orderID','!=',NULL)->where('type','order')->orderBy('id','asc')->get();

        // User Details 
        $userData = [];
        $i= 0;
        foreach($shop as $sh)
        {
            $user_detail = User::where('id',$sh->child_id)->first();  
            $userData[$i]= $user_detail->name .'-'. $user_detail->id;
            array_push($customer_array,$userData);      
        }

         // dd($customer_array);

        ob_end_clean();
        ob_start();

        Excel::create('Customer Data', function($excel) use ($customer_array){
            $excel->setTitle('Customer Data');
            $excel->sheet('Customer Data', function($sheet) use ($customer_array){
                $sheet->fromArray($customer_array, null, 'A1', false, false);
            });
        })->download('xls');

        return view('export_excel',compact('customer_data'));
    }

    /*----------------------------------------
    |   Excel Import - Test Score
    |----------------------------------------*/
    public function excel_import(Request $request)
    {
        $this->validate($request,[
            'excel_file' => 'required|mimes:xls'
        ]);
        //dd($request->all());

        if(!empty($request->excel_file))
        {
            $filename = $request->excel_file;
            if ($request->hasFile('excel_file')) 
            {
               $random = substr(str_shuffle("0123456789abcefghijkl"), 0, 5);
               $excel_file = $request->file('excel_file');
               $filename = time().'-'.$random.'.'.$excel_file->getClientOriginalExtension();  
               $destinationPath = public_path('/uploads/test-excel');
               $excel_file_path = public_path().'/uploads/test-excel'.$request->excel_file; 
               $excel_file->move($destinationPath, $filename); 
            }
        }

        $path = public_path().'/uploads/test-excel/'.$filename; 
        chmod($path, 0777); 

        config(['excel.import.startRow' => 3]);
        $data = Excel::load($path)->get();  
        //dd($data);

        // Array to json conversion 
        $complete_data = json_encode($data->toArray()); 
        //dd($complete_data);

        if(!empty($data) && $data->count()){

            $test_score = [];   
            //dd($data->toArray());

            foreach ($data->toArray() as $key => $value) {  

                    if(!empty($value)){ 

                        $user = explode("-",$value[0]); 
                        $user_id = end($user);  

                        $check_test_score = TestScore::where('user_id',$user_id)->where('season_id',$request->season_id)->where('course_id',$request->course_id)->get();

                        if(!empty($check_test_score))
                        {
                            TestScore::where('user_id',$user_id)->where('season_id',$request->season_id)->where('course_id',$request->course_id)->delete();
                        }

                        //dd($user_id);

                        foreach ($value as $key1 => $value1) {  

                            $key_data = explode('_',$key1);
                            $key = end($key_data);     

                            $test = Test::where('id',$key)->first();

                                $testscore = new TestScore;
                                $testscore->user_id = $user_id;
                                $testscore->test_id = $key;
                                $testscore->season_id = $request->season_id;
                                $testscore->course_id = $request->course_id;
                                $testscore->complete_data = $complete_data;
                                $testscore->test_cat_id = $test['test_cat_id'];
                                $testscore->test_score = $value1;
                                $testscore->excel_file = isset($filename) ? $filename : '';
                                $testscore->save();
                            
                        }

                    }
            }


        }

        return redirect()->route('admin.course.list')->with('flash_message', 'Test Score has been updated successfully!');
    }

    /*----------------------------------------
    |   Test Score Excel
    |----------------------------------------*/
    public function test_score_excel($course_id, $player_id)
    {
        $test_score = TestScore::where('course_id',$course_id)->where('user_id',$player_id)->get(); 

        if(!empty($test_score) && count($test_score)>0)
        {
            foreach($test_score as $test)
            {
                // $customer_data = Test::where('id',$test->test_id)->get()->toArray(); 
                $customer_data = Test::orderBy('id','asc')->get()->toArray();   

                $customer_array = array();
                $i = 0;
                $customer_array[$i][]="User details";

                // Test Category
                foreach($customer_data as $data){
                    $customer_array[$i][] = getTestCatname($data['test_cat_id']);
                }
                $testCategory=[];
                $i++;
                $testCategory[]="#";

                // Tests 
                foreach($customer_data as $key=>$customer)
                {
                    $testCategory[] = $customer['title'];   
                }

                $customer_array[$i]=$testCategory;

                $shop = \DB::table('shop_cart_items')->where('product_id',$course_id)->where('child_id',$player_id)->where('shop_type','course')->where('orderID','!=',NULL)->orderBy('id','asc')->get();  

                // User Details 
                $userData = [];
                foreach($shop as $sh)
                {
                    $user_detail = User::where('id',$sh->child_id)->first();  
                    $userData[]= $user_detail->name .'-'. $user_detail->id;

                    $score = TestScore::where('user_id',$sh->child_id)->where('course_id',$sh->product_id)->where('season_id',$sh->course_season)->first();  
                    
                    if(!empty($score)){
                        $userData[] = $score->test_score;
                    }else{
                        $userData[] = '';
                    }

                    array_push($customer_array,$userData); 
                }

                // $customer_array[] = $testCategory;

                // dd($customer_array);

                ob_end_clean();
                ob_start();

                Excel::create('Customer Data', function($excel) use ($customer_array){
                    $excel->setTitle('Customer Data');
                    $excel->sheet('Customer Data', function($sheet) use ($customer_array){
                        $sheet->fromArray($customer_array, null, 'A1', false, false);
                    });
                })->download('xls');

                return view('export_excel',compact('customer_data'));
            }
            
        }else{
            return \Redirect::back()->with('success','No test score found.');
        }
        
    } 

    /*----------------------------------------
    |   View Test Score
    |-----------------------------------------*/
    public function view_test_score($season,$course){ 
        
        $test_score = TestScore::where('course_id',$course)->where('test_cat_id','!=',NULL)->where('season_id',$season)->get();    

        return view('admin.course.view-test-score',compact('test_score','season','course'));
    }

    /*----------------------------------------
    |   Create duplicate record functionality
    |----------------------------------------*/
    public function duplicate_test($id) {
        $tasks = Test::find($id);
        $newTask = $tasks->replicate();
        $newTask->title = $tasks->title.'(copy)';
        $newTask->slug = $tasks->slug.'-copy';
        $newTask->save();

        $latest_slug = $newTask->slug;
        return redirect('admin/test/'.$latest_slug)->with('flash_message',' Test has been replicated successfully!');
    }

}
