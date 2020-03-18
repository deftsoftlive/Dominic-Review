<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class FaqController extends Controller
{
    public function showFaq() {
        $faqs = Faq::orderByDesc('id')->paginate(10);
        return view('admin/faq/faqs_show',['faqs' => $faqs]);
    }

    public function showCreateFaq() {
        return view('admin/faq/faq_create');
    }

    public function createFaq(Request $request) {
        Faq::create($request->all());
        return redirect()->route('admin.showFaqs')->with('flash_message', 'Faq has been added successfully');
    }

    public function destroyFaq(Request $request) {
        if ($request->id) {
           $faq = Faq::find($request->id);
           $faq->delete();
           return response()->json(['message' => 'Faq has been deleted successfully'], 200);
        }
           return response()->json(['message' => 'Faq Id is required'], 400);
   }

    public function showEditFaq(Request $request, $slug) {
        $faq = Faq::findBySlugOrFail($slug);
        return view('admin/faq/faq_edit',[ 'faq' => $faq]);
    }

    public function updateFaq(Request $request, $slug) {
        $faq = Faq::findBySlugOrFail($slug);
        $faq->update($request->all());
        return redirect()->route('admin.showFaqs')->with('flash_message', 'Faq has been Updated successfully');
    }
    
}
