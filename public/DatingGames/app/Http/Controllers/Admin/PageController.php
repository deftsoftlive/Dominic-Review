<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Page;

class PageController extends Controller
{
    public function showPages() {
        $pages = Page::paginate(30);
        return view('admin/cmspages/pages/pages_show', ['pages' => $pages, 'search' => '']);
    }

    public function searchPage(Request $request) {
        $search_parameter = $request->search;
        
       if($search_parameter != "") {
        $filterPages= Page::where ( 'name', 'LIKE', '%' . $search_parameter . '%' )
        ->paginate(30)->setPath( '' );

        return view('admin/cmspages/pages/pages_show', 
            [
            'pages' => $filterPages, 
            'search' => $request->search
            ]);
       }
       return $this->showPages();
    }

    public function showCreatePages() {
        return view('admin/cmspages/pages/page_create');
    }

    public function createPage(Request $request) {
        $validatedData = $request->validate([
            'body'         => 'required',
        ]);
        Page::create($request->all());
        return redirect()->route('admin.cmspages.showpages')->with('flash_message','Page has been added successfully');
    }

    public function destroyPage(Request $request) {
        if ($request->id) {
           $page = Page::find($request->id);
           $page->delete();
           return response()->json(['message' => 'Page has been deleted successfully'], 200);
        }
           return response()->json(['message' => 'Page id is required'], 400);
   }

   public function showEditPage(Request $request, $slug) {
    $page = Page::findBySlugOrFail($slug);
    return view('admin/cmspages/pages/page_edit', ['page' => $page]);
   }

   public function updatePage(Request $request, $slug) {
    $validatedData = $request->validate([
        'body'         => 'required',
    ]);
    $page = Page::findBySlugOrFail($slug);
        $page->update($request->all());
        return redirect()->route('admin.cmspages.showpages')->with('flash_message','Page has been updated successfully');
   }
}
