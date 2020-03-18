<?php

namespace App\Http\Controllers\Cms;

use GuzzleHttp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Page;
use App\Faq;
use App\Settings;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactUs;

class CmsController extends Controller
{

    public function getCms($slug)
    {
      $page = Page::findBySlugOrFail($slug);
      return view('cms/cms', ['page'=> $page, 'slug' => $slug]);
    }
    public function faq()
    {	
    	$faqs = Faq::paginate(10);
       return view('cms/faq', compact('faqs', $faqs));
    }
    public function contactUs(Request $request)
    {
      $settings = Settings::first();
      if ($request->method() == 'POST')
      {
      	$name = $request->name;
      	$email = $request->email;
      	$query = $request->message;

      	$email_id = $settings->email_id;
      	\Mail::to('patrickphp2@gmail.com')->send(new ContactUs($name, $email, $query));
         return redirect()->back()->with("success","Thanks for contacting us. We'll respond to you very soon.");

      }else{
       return view('cms.contactUs');
      }
    }
}
