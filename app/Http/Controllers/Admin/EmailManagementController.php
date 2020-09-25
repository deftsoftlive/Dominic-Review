<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\EmailTemplate;

class EmailManagementController extends Controller
{



	#----------------------------------------------------------------------------------------------------
	#    index
	#----------------------------------------------------------------------------------------------------


    public function index() {
    	$emails = EmailTemplate::where('id', '!=', '15')->where('id', '!=', '5')->get();
    	return view('admin.emails.index')->with(['title'=> 'Email Management', 'emails' => $emails]);
    }

	#----------------------------------------------------------------------------------------------------
	#    index
	#----------------------------------------------------------------------------------------------------


    public function edit($id) {
    	$emails = EmailTemplate::find($id);
    	return view('admin.emails.edit')->with(['title'=> 'Email Management', 'email' => $emails]);
    }

    #----------------------------------------------------------------------------------------------------
    #    index
    #----------------------------------------------------------------------------------------------------


    public function create(Request $request)
    {
       $e = new EmailTemplate;
       $e->title =trim($request->title);
       $e->save();
       return redirect()->route('admin.emails.index')->with('flash_message', 'Email Template is saved Successfully');
    }

    #----------------------------------------------------------------------------------------------------
    #    index
    #----------------------------------------------------------------------------------------------------



    public function update(Request $request, $id) {
    	$email = EmailTemplate::find($id);
    	$email->update($request->all());
    	return redirect()->route('admin.emails.index')->with('flash_message', 'Email Template has been updated Successfully');
    }
}
