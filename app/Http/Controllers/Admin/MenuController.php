<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;

class MenuController extends Controller
{
    /*----------------------------------------
    |
    |   MENU MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of Menus
    |----------------------------------------*/ 
    public function menu_index() {
        $Menu = Menu::select(['id','title','url','sub_menu','type','sort'])->where('type','header')->where('sub_menu',NULL)->orderBy('sort','asc')->paginate(10);
    	return view('admin.Menu.index',compact('Menu'))
    	->with(['title' => 'Header Menu Management', 'addLink' => 'admin.Menu.showCreate']);
    }

    public function menu_footer_index() {
        $Menu = Menu::select(['id','title','url','sub_menu','type','sort'])->where('type','footer')->where('sub_menu',NULL)->orderBy('sort','asc')->paginate(10);
        return view('admin.Menu.footer-index',compact('Menu'))
        ->with(['title' => 'Footer Menu Management', 'addLink' => 'admin.Menu.showCreate']);
    }

    public function menu_showCreate() {
    	return view('admin.Menu.create')->with(['title' => 'Create Menu Item', 'addLink' => 'admin.Menu.list']);
    }

    /*----------------------------------------
    |   Add Menu 
    |----------------------------------------*/ 
    public function menu_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required'],
            'type' => ['required']
            // 'url' => ['required']
        ]);

    	Menu::create([
            'type' =>$request['type'],
    		'title' => $request['title'],
    		'url' => $request['url'],
            'sort' => 0,
    		'sub_menu' => $request['sub_menu']
    	]);

        if($request['type'] == 'header')
        {
            return redirect()->route('admin.Menu.list')->with('flash_message', 'Menu Item ('.$request['type'].' type) has been created successfully!');
        }
        elseif($request['type'] == 'footer')
        {
            return redirect()->route('admin.Menu.footer-list')->with('flash_message', 'Menu Item ('.$request['type'].' type) has been created successfully!');
        }
    	
    }

    /*----------------------------------------
    |   Edit Menu content
    |----------------------------------------*/ 
    public function menu_showEdit($id) {
    	$venue = Menu::find($id);
    	return view('admin.Menu.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Menu Item', 'addLink' => 'admin.Menu.list']);
    }

    /*----------------------------------------
    |   Update Menu content
    |----------------------------------------*/ 
    public function menu_update(Request $request, $id) {
    	$validatedData = $request->validate([
    		'title' => ['required'],
            'type' => ['required']
            // 'url' => ['required']
        ]);

    	$venue = Menu::find($id);
    	$venue->update([
            'type' =>$request['type'],
    		'title' => $request['title'],
    		'url' => $request['url'],
    		'sub_menu' => $request['sub_menu'],
    	]);
    	return redirect()->route('admin.Menu.list')->with('flash_message', 'Menu Item has been updated successfully!');
    }

    /*----------------------------------------------
    |   Change the status of the Menu
    |-----------------------------------------------*/ 
    public function menu_Status($id) {
     $venue = Menu::find($id);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Menu of <b>'.$venue->provider_name.'</b> is Activated' : 'Menu of <b>'.$venue->provider_name.'</b> is Deactivated';
       return redirect(route('admin.Menu.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*----------------------------------------
    |   Delete Menu Record
    |----------------------------------------*/
    public function menu_delete($id) {

    	$check_submenu = Menu::where('sub_menu','=',$id)->get();

    	if(count($check_submenu)>0)
    	{
	        return \Redirect::back()->with('error_flash_message','This Menu Item contain submenus. Firstly remove submenus under this menu item. Then you can delete this.');

    	}else{

    		$menu = Menu::find($id);
	        $menu->delete();
	        return \Redirect::back()->with('flash_message',' Menu Item has been deleted successfully!');
    	}
        
    }

    /*----------------------------------------
    |   Update menu sorting number 
    |-----------------------------------------*/
    public function update_menu_sort($sort_no,$menu_id) 
    {   
        $menu = Menu::find($menu_id);
        $menu->sort = $sort_no;
        $menu->save();

        $data = array(
            'sort_no'   => $menu,
        );

        echo json_encode($data);
    }
}
