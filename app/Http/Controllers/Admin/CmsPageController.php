<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\CmsPage;

class CmsPageController extends Controller
{
	/******************************
	|	Listing of all CMS Pages
	|******************************/ 
    public function index() {
    	$cms_pages = CmsPage::orderBy('id','desc')->paginate(10);
    	return view('admin.cms-pages.index',compact('cms_pages'))->with(['title'=> 'Pages', 'addLink' => 'admin.cms-pages.showCreate']);
    }

    public function ajaxData() {
		$vanues = CmsPage::select(['title', 'status', 'slug'])->get();
		
		return datatables()->of($vanues)
		->addColumn('action', function ($t) {
			return createAction($t, 'admin.cms-pages.edit', 'admin.cms-pages.status');
		})->editColumn('status', function($t){
			return $t->status == 1 ? 'Active' : 'In-Active';
		})->make(true);
	}

	/******************************
	|	Add CMS Pages
	|******************************/ 
	public function showCreate() {
		return view('admin.cms-pages.create')->with(['title' => 'Create Page', 'addLink' => 'admin.cms-pages.list']);
	}

	/******************************
	|	Save CMS Pages
	|******************************/ 
	public function create(Request $request) {
		CmsPage::create($request->all());
		return redirect(route('admin.cms-pages.list'))->with('flash_message', 'Cms page has created successfully');
	}

	/******************************
	|	Change Status of CMS Pages
	|******************************/ 
	public function changeStatus($slug) {
		$page = CmsPage::FindBySlugOrFail($slug);

     if(!empty($page)) {
        $page->status = $page->status == 1 ? 0 : 1;
        $page->save();
        $msg= $page->status == 1 ? '<b>'.$page->title.'</b> is Activated' : '<b>'.$page->title.'</b> is Deactivated';
       return redirect(route('admin.cms-pages.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something went wrong!');
	}

	/******************************
	|	Edit CMS Pages
	|******************************/ 
	public function edit($slug) {
		$page = CmsPage::FindBySlugOrFail($slug);
		return view('admin.cms-pages.edit')->with(['title'=> 'Page Edit', 'addLink'=> 'admin.cms-pages.list', 'page' => $page]);
	}

	/******************************
	|	Update CMS Pages
	|******************************/
	public function update(Request $request, $slug) {
		$page = CmsPage::FindBySlugOrFail($slug)->update($request->all());
		return redirect(route('admin.cms-pages.list'))->with('flash_message', 'Page has updated successfully');
	}

	/******************************
	|	Delete CMS Pages
	|******************************/
	public function delete($slug) {
		$page = CmsPage::FindBySlugOrFail($slug)->delete();
		return redirect(route('admin.cms-pages.list'))->with('flash_message', 'Page has deleted successfully');
	}
}
