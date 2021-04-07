<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\VideosManagement;
use App\VideoManagementLinking;
use App\VideoCategory;
use App\User;
use App\Season;

class VideoManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $videos = VideosManagement::orderBy('id','desc')->get();
        $count_video = $videos->count();
        return view('admin.video-management.index',compact('count_video','videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = User::where(['role_id' => 2])->get();
        $coaches = User::where(['role_id' => 3])->get();
        $seasons = Season::all();    
        $categories = VideoCategory:: where('status', 1)->where('slug', '!=', 'my-videos')->where('slug', '!=', 'all-videos')->get();    
        return view('admin.video-management.create',compact('parents','seasons','coaches', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $formData['title'] = $request->title;
        $formData['url'] = $request->url;
        $formData['description'] = $request->description;
        $formData['users'] = $request->users;

        if ($request->linked_coaches) {
           $formData['linked_coaches'] = implode(',', $request->linked_coaches);
        }
        if ($request->category) {
           $formData['video_category'] = implode(',', $request->category);
        }
        
        $data = VideosManagement::create($formData);
        if (!empty($request->parent)) {
            $parents = $request->parent;
           foreach ($parents as $key => $value) {
               VideoManagementLinking::create(['video_id' => $data->id,'user_id' => $value]);
           }
        }elseif (!empty($request->season)) {
            $seasons = $request->season;
           foreach ($seasons as $key => $season) {
               VideoManagementLinking::create(['video_id' => $data->id,'season_id' => $season]);
           }
        }
        return redirect()->route('admin.video.management')->with('flash_message', 'Video added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideosManagement  $VideosManagement
     * @return \Illuminate\Http\Response
     */
    public function show(VideosManagement $VideosManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideosManagement  $VideosManagement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        
        $video = VideosManagement::find($id);
        $parents = User::where(['role_id' => 2])->get();
        $selected_parents = VideoManagementLinking::where(['video_id' => $id])->whereNotNull('user_id')->whereNotNull('video_id')->get();
        $selected_seasons = VideoManagementLinking::where(['video_id' => $id])->whereNotNull('season_id')->whereNotNull('video_id')->get();        
        $seasons = Season::all();   
        $coaches = User::where(['role_id' => 3])->get();
        $categories = VideoCategory:: where('status', 1)->where('slug', '!=', 'my-videos')->where('slug', '!=', 'all-videos')->get(); 
        //dd($coaches);     
        return view('admin.video-management.edit',compact('video','parents','seasons','selected_parents','selected_seasons','coaches','categories'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideosManagement  $VideosManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
        $cate = $request->category ? implode(',', $request->category) : ''; 
        if (strcmp($request->select_coaches, 'all') == 0 ) {
            $coa = 'all';
        }elseif(strcmp($request->select_coaches, 'individual_coach') == 0 ){            
            $coa = implode( ',', $request->linked_coaches );
        }
        $video = VideosManagement::where('id',$id)->first();
        $video->update([
            'title' => $request['title'],
            'url' => $request['url'],
            'video_category' => $cate,
            'users' => $request['users'],
            'description' => $request['description'],
            'linked_coaches' => $coa,
        ]);
        $del = VideoManagementLinking::where('video_id',$id)->delete();
        if (!empty($request->parent)) {
            $parents = $request->parent;
           foreach ($parents as $key => $value) {
               VideoManagementLinking::create(['video_id' => $id,'user_id' => $value]);
           }
        }elseif (!empty($request->season)) {
            $seasons = $request->season;
           foreach ($seasons as $key => $season) {
               VideoManagementLinking::create(['video_id' => $id,'season_id' => $season]);
           }
        }
        return redirect()->route('admin.video.management')->with('flash_message', 'Video updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideosManagement  $VideosManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    {
        $video = VideosManagement::find($id);
        $del = VideoManagementLinking::where('video_id',$id)->delete();
        $video->delete();
        return redirect()->back()->with('flash_message','Video deleted Successfully.');
    }


    public function status($id) {
     $video = VideosManagement::find($id);

     if(!empty($video)){
        $video->status = $video->status == 1 ? 0 : 1;
        $video->save();
        $msg= $video->status == 1 ? '<b>'.$video->title.'</b> is Activated' : '<b>'.$video->title.'</b> is Deactivated';
       return redirect(route('admin.video.management'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }


}
