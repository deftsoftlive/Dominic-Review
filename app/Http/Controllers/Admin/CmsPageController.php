<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\CmsPage;

class CmsPageController extends Controller
{
    public function index() {
    	return view('admin.cms-pages.index')->with(['title'=> 'Pages', 'addLink' => 'admin.cms-pages.showCreate']);
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

	public function showCreate() {
		return view('admin.cms-pages.create')->with(['title' => 'Create Page', 'addLink' => 'admin.cms-pages.list']);
	}

	public function create(Request $request) {
		CmsPage::create($request->all());
		return redirect(route('admin.cms-pages.list'))->with('flash_message', 'Cms Page Has Created Successfully');
	}

	public function changeStatus($slug) {
		$page = CmsPage::FindBySlugOrFail($slug);

     if(!empty($page)) {
        $page->status = $page->status == 1 ? 0 : 1;
        $page->save();
        $msg= $page->status == 1 ? '<b>'.$page->title.'</b> is Activated' : '<b>'.$page->title.'</b> is Deactivated';
       return redirect(route('admin.cms-pages.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
	}

	public function edit($slug) {
		$page = CmsPage::FindBySlugOrFail($slug);
		return view('admin.cms-pages.edit')->with(['title'=> 'Page Edit', 'addLink'=> 'admin.cms-pages.list', 'page' => $page]);
	}

	public function update(Request $request, $slug) {
		$page = CmsPage::FindBySlugOrFail($slug)->update($request->all());
		return redirect(route('admin.cms-pages.list'))->with('flash_message', 'Page Has Updated Successfully');
	}
}
