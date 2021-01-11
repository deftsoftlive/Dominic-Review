<?php

namespace App\Http\Controllers\Admin;

use App\VideoManagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.video-management.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function show(VideoManagement $videoManagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function edit(VideoManagement $videoManagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoManagement $videoManagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VideoManagement  $videoManagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoManagement $videoManagement)
    {
        //
    }
}
