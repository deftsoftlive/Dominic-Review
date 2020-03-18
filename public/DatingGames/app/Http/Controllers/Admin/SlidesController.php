<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;

class SlidesController extends Controller
{
    public function __construct()
  {
    $this->middleware('auth:admin');
  }
  	public function index()
    {   
        $slides = Slides::orderBy('id','desc')->paginate(10);
        return view('admin.slides.index')->with('slides',$slides);
    }

    public function add()
    {   
        $slides = Testimonial::orderBy('id','desc')->paginate(5);
        return view('admin.slides.add')->with('slides',$slides);
    }

    public function store(Request $request)
    {
       $this->validate($request,[
                'title' => 'required',
                'tag' => 'required',
                'short_description' => 'required',
                'image' => 'image'
       ]);
       
        $image_name =$request->hasFile('image') ? $this->updateFile($request->image) : '';
        
        $b= new Testimonial;
        $b->title = trim($request->title);
        $b->tag = trim($request->tag);
        $b->short_description = trim($request->short_description);
        $b->image = trim($image_name);

        if($b->save()){
            return redirect('/admin/testimonials')->with('flash_success','Testimonial added successfully.');
        }
    }
}
