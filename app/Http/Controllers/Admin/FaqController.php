<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\FAQs;

class FaqController extends Controller
{
	public function index($type) {
		$faqs = FAQs::where('type', $type)->orderBy('id','desc')->paginate(10);
		return view('admin.faqs.index')
            ->with([
            	'faqs' => $faqs,
            	'title' => 'Faqs list of '.$type,
            	'addLink' => 'admin.faqs.showCreate',
             	'type' => $type
             ]);
	}

	public function showCreate($type) {
		 return view('admin.faqs.create')
	                    ->with([
	                    	'title' => 'Create faq for '.$type, 
	                    	'addLink' => 'admin.faqs.lists', 
	                    	'type' => $type
	                    ]);
	} 

	public function create(Request $request, $type) {
         $faq = new FAQs;

     	 $faq->question = $request->question;
     	 $faq->answer = $request->answer;
     	 $faq->type = $type;
     	 $faq->status = 1;
         
         if($faq->save()) {
            return redirect()->route('admin.faqs.lists', $type)->with('flash_message', 'Faq has been saved successfully!');
         }
	}

	public function edit($type, $id) {
		$faq = FAQs::where(['id' => $id, 'type' => $type])->first();
		 return !empty($faq) ? view('admin.faqs.edit') 
	                    ->with([
	                    	'faq' => $faq,
	                    	'title' => 'Edit faq for '.$type, 
	                    	'addLink' => 'admin.faqs.lists', 
	                    	'type' => $type
	                    ]) : redirect()->back()->with('error_flash_message', 'Something Wrong!');
	}	


	public function update(Request $request, $type, $id) {
	     $faq = FAQs::find($id);

	     $faq->question = $request->question;
     	 $faq->answer = $request->answer;

     	 $faq->save();

		 return redirect()->route('admin.faqs.lists', $type)->with('flash_message', 'Faq has been updated successfully!');
	}

	 public function delete($type, $id) {
         $faq = FAQs::find($id);
         if(!empty($faq)) {
            $faq->delete();            
            return redirect(route('admin.faqs.lists', $type))->with('flash_message', 'Faq has been deleted successfully');
         }
         return redirect()->back()->with('flash_message', 'Something Woring!');
    }


    public function changeStatus($type, $id) {
         $faq = FAQs::find($id);
         if(!empty($faq)) {
            $faq->status = $faq->status == 1 ? 0 : 1;
            $faq->save();
            
            $msg = $faq->status == 1 ? '<b>'.$faq->question.'</b> is Activated' : '<b>'.$faq->question.'</b> is Deactivated';
            return redirect(route('admin.faqs.lists', $type))->with('flash_message', $msg);
         }
         return redirect()->back()->with('flash_message', 'Something Woring!');
    }	
   
}
