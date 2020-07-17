<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;

class RegisterTemplateController extends Controller
{
    public function camp_reg_temp()
    {
    	return view('admin.register-template.camp-template');
    }

    public function course_reg_temp($id)
    {	
    	$course = Course::where('id',$id)->first();
    	return view('admin.register-template.course-template',compact('course'));
    }
}
