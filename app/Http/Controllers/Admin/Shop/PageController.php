<?php

namespace App\Http\Controllers\Admin\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Shop\ShopPage;
class PageController extends Controller
{
   
public $view ='admin.shop.pages.';


public function index()
{
   $pages = ShopPage::all(); 

  return view($this->view.'index')
  ->with('title','CMS Pages for Shop')
  ->with('addLink',route('admin.shop.cms.create'))
  ->with('ajaxLink','')
  ->with('shop_pages',$pages);

}


#=================================================================================================
#=================================================================================================
#=================================================================================================

public function add()
{
   $pages = ShopPage::all(); 

  return view($this->view.'add')
  ->with('title','CMS Pages for Shop')
  ->with('addLink',route('admin.shop.cms'));

}

#=================================================================================================
#=================================================================================================
#=================================================================================================

public function store(Request $request)
{
    
   $this->validate($request,[
     'title' => 'required',
     'content' => 'required'
   ]);

   $p = new ShopPage;
   $p->title = $request->title;
   $p->description = $request->content;
   $p->save();

   return redirect()->route('admin.shop.cms')->with('messages','Page is created successfully.');


}

#=================================================================================================
#=================================================================================================
#=================================================================================================

public function edit($id)
{
   $pages = ShopPage::find($id); 

  return view($this->view.'edit')
  ->with('title','CMS Pages for Shop')
  ->with('addLink',route('admin.shop.cms'))
  ->with('ajaxLink','')
  ->with('shop_pages',$pages);

}

#=================================================================================================

public function update(Request $request,$id)
{
    
   $this->validate($request,[
     'title' => 'required',
     'content' => 'required'
   ]);

   $p = ShopPage::find($id);
   $p->title = $request->title;
   $p->description = $request->content;
   $p->save();
  $p->sluggable();
   return redirect()->route('admin.shop.cms')->with('messages','Page is updated successfully.');


}


#================================================================================================

public function delete($id)
{
	
   $p = ShopPage::find($id);
     
   $p->delete();

   return redirect()->route('admin.shop.cms')->with('messages','Page is deleted successfully.');


}

}
