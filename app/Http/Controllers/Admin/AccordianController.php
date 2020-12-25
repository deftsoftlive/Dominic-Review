<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Accordian;
use App\CampCategory;
use App\AccordianPdf;

class AccordianController extends Controller
{
    /*----------------------------------------
    |
    |   ACCORDIAN MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of accordians
    |----------------------------------------*/ 
    public function accordian_index() {
        $accordian = Accordian::select(['id','title','sort','description','status','slug','page_title'])->orderBy('sort','asc')->paginate(20);
       return view('admin.accordian.index',compact('accordian'))
    	->with(['title' => 'Accordian Management', 'addLink' => 'admin.accordian.showCreate']);
    }

    public function accordian_showCreate() {
        $camp_cat = CampCategory::orderBy('id','asc')->where('status','1')->get();
    	return view('admin.accordian.create',compact('camp_cat'))->with(['title' => 'Create Accordian', 'addLink' => 'admin.accordian.list']);
    }

    /*----------------------------------------
    |   Add accordian 
    |----------------------------------------*/ 
    public function accordian_create(Request $request) {   

        $data = $request->all(); 

    	$validatedData = $request->validate([
    		'page_title' => ['required'],
            'title' => ['required', 'max:255'],
            // 'description' => ['required'],
        ]);

    	// if ($request->hasFile('pdf')) {
	    //     $pdf = $request->file('pdf');
	    //     $filename = time().'.'.$pdf->getClientOriginalExtension();
	    //     $destinationPath = public_path('/uploads');
	    //     $pdf->move($destinationPath, $filename);
    	// }

    	$accordian = Accordian::create([
    		'page_title' => $request['page_title'],
    		'title' => $request['title'],
    		'description' => $request['description'],
    		// 'pdf' => isset($filename) ? $filename : '',
            'color' => $request['color'],
    	]);

        $acc_id = $accordian->id;

            // if($request->hasFile('pdf'))
            // {
            //   foreach($request->file('pdf') as $image)
            //   {
            //     $pdf_name = $image->getClientOriginalName();
            //     $filename = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/uploads/accordian');  
            //     $image->move($destinationPath, $filename);

            //     $upload = new AccordianPdf;
            //     $upload->accordian_id = $acc_id;
            //     $upload->title = $pdf_name;
            //     $upload->pdf = $filename;
            //     $upload->save();
            //   }
            // }
            
            if($request->hasFile('pdf'))
            {
                foreach ($data['accordian_title'] as $number => $value){    
                
                $string = str_random(5);
                $image[$number] = request()->pdf[$number];  
                $filename[$number] = time().$string.'.'.$image[$number]->getClientOriginalExtension();
                $destinationPath[$number] = public_path('/uploads/accordian');  
                $image[$number]->move($destinationPath[$number], $filename[$number]);

                  $co                    =  new AccordianPdf;
                  $co->accordian_id      =  $acc_id;  
                  $co['accordian_title'] =  isset($data['accordian_title'][$number]) ? $data['accordian_title'][$number] : '' ;
                  $co['pdf']             = isset($filename[$number]) ? $filename[$number] : '';
                  $co->save(); 

                }
            }

    	return redirect()->route('admin.accordian.list')->with('flash_message', 'Accordian has been created successfully!');
    }

    /*----------------------------------------
    |   Edit accordian content
    |----------------------------------------*/ 
    public function accordian_showEdit($slug) {
    	$venue = Accordian::FindBySlugOrFail($slug);
        $venue_id = $venue->id; 

        // Accordian PDF's
        $acc_pdf = AccordianPdf::where('accordian_id',$venue_id)->get();
        $acc_pdf_count = $acc_pdf->count();

        // Camp Category
        $camp_cat = CampCategory::orderBy('id','asc')->where('status','1')->get();

    	return view('admin.accordian.edit',compact('acc_pdf','acc_pdf_count','camp_cat'))
    	->with(['venue' => $venue, 'title' => 'Edit Accordian', 'addLink' => 'admin.accordian.list']);
    }

    /*----------------------------------------
    |   Update accordian content
    |----------------------------------------*/ 
    public function accordian_update(Request $request, $slug) { 

        $data = $request->all(); 

    	$validatedData = $request->validate([
            'page_title' => ['required'],
            'title' => ['required', 'max:255'],
            // 'description' => ['required']
        ]);

    	$venue = Accordian::FindBySlugOrFail($slug);
        $accordian_id = $venue['id'];
    	$filename = $venue->pdf;

        // if(isset($filename))
        // {
        // 	if ($request->hasFile('pdf')) {
    	   //      $pdf = $request->file('pdf');
    	   //      $filename = time().'.'.$pdf->getClientOriginalExtension();
    	   //      $destinationPath = public_path('/uploads');
    	   //      $img_path = public_path().'/uploads/'.$venue->pdf;
    	   //      $pdf->move($destinationPath, $filename);
        // 	}
        // }
    	$venue->update([
    		'page_title' => $request['page_title'],
    		'title' => $request['title'],
    		'description' => $request['description'],
    		// 'pdf' => isset($filename) ? $filename : '',
            'color' => $request['color'],
    	]);

        $acc_id = $accordian_id;

            // if($request->hasFile('pdf'))
            // {
            //   foreach($request->file('pdf') as $image)
            //   {
            //     $pdf_name = $image->getClientOriginalName();
            //     $filename = time().'.'.$image->getClientOriginalExtension();
            //     $destinationPath = public_path('/uploads/accordian');  
            //     $image->move($destinationPath, $filename);

            //     $upload = new AccordianPdf;
            //     $upload->accordian_id = $acc_id;
            //     $upload->title = $pdf_name;
            //     $upload->pdf = $filename;
            //     $upload->save();
            //   }
            // }

            if($request->hasFile('pdf'))
            {
                foreach ($data['accordian_title'] as $number => $value){    
                
                $string = str_random(5);
                $image[$number] = request()->pdf[$number];  
                $filename[$number] = time().$string.'.'.$image[$number]->getClientOriginalExtension();
                $destinationPath[$number] = public_path('/uploads/accordian');  
                $image[$number]->move($destinationPath[$number], $filename[$number]);

                  $co                    =  new AccordianPdf;
                  $co->accordian_id      =  $acc_id;  
                  $co['accordian_title'] =  isset($data['accordian_title'][$number]) ? $data['accordian_title'][$number] : '' ;
                  $co['pdf']             = isset($filename[$number]) ? $filename[$number] : '';
                  $co->save(); 

                }
            }


    	return redirect()->route('admin.accordian.list')->with('flash_message', 'Accordian has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_accordian($id) {
        $acc = Accordian::find($id);
        $acc->delete();
        return \Redirect::back()->with('flash_message','Accordian has been deleted successfully!');
    }

    /*----------------------------------------
    |   Create duplicate record functionality
    |----------------------------------------*/
    public function duplicate_accordian($id) {
        $tasks = Accordian::find($id);
        $newTask = $tasks->replicate();
        $newTask->title = $tasks->title.'(copy)';
        $newTask->status = '0';
        $newTask->save();

        $latest_slug = $newTask->slug;
        return redirect('admin/accordian/'.$latest_slug)->with('flash_message',' Accordian has been replicated successfully!');
    }

    /*----------------------------------------
    |   Change the status of the accordian
    |----------------------------------------*/ 
    public function accordian_Status($slug) {
     $venue = Accordian::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Accordian of <b>'.$venue->title.'</b> is Activated' : 'Accordian of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.accordian.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   Update accordian sorting number 
    |-----------------------------------------*/
    public function update_accordian_sort($sort_no,$accordian_id) 
    {   
        $acc = Accordian::find($accordian_id);
        $acc->sort = $sort_no;
        $acc->save();

        $data = array(
            'sort_no'   => $acc,
        );

        echo json_encode($data);
    }

    /*---------------------------------------
    |   Remove PDF Functionality
    |---------------------------------------*/ 
    public function remove_pdf_data($acc_id){
        $acc = AccordianPdf::find($acc_id);
        $acc->delete();

        $data = array(
            'sort_no'   => $acc,
        );

        echo json_encode($data);
    }
}
