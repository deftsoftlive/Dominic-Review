<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware(['auth', 'verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    /***********************************
    |   CMS PAGES - Start Here
    |***********************************/

    /* Add Report Page */
    public function add_report()
    {
        return view('cms.addreport');
    }

    /* Listing Page */ 
    public function listing()
    {
        return view('cms.listing');
    }

    /* Set Goals Page */ 
    public function get_goals()
    {
        return view('cms.setgoals');
    }

    /***********************************
    |   CMS PAGES - End Here
    |***********************************/
}
