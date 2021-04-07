<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReportQuestion;
use App\ReportQuestionOption;
use App\PlayerReport;
use App\User;
use App\Competition;
use App\MatchStats;

class ReportQuestionController extends Controller
{
    /*----------------------------------------
    |
    |   ReportQuestion MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of ReportQuestion
    |----------------------------------------*/ 
    public function reportquestion_index() {
        $reportquestion = ReportQuestion::select(['id','title','slug'])->orderBy('id','desc')->paginate(20);
    	return view('admin.reportquestion.index',compact('reportquestion'))
    	->with(['title' => 'Report Question Management', 'addLink' => 'admin.reportquestion.showCreate']);
    }

    public function reportquestion_showCreate() {
    	return view('admin.reportquestion.create')->with(['title' => 'Create Question Category', 'addLink' => 'admin.reportquestion.list']);
    }

    /*----------------------------------------
    |   Add reportquestion 
    |----------------------------------------*/ 
    public function reportquestion_create(Request $request) {
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:40']
        ]);

    	ReportQuestion::create([
    		'title' => $request['title'],
    		'description' => $request['description']
    	]);
    	return redirect()->route('admin.reportquestion.list')->with('flash_message', 'Question Category has been created successfully!');
    }

    /*----------------------------------------
    |   Edit reportquestion content
    |----------------------------------------*/ 
    public function reportquestion_showEdit($slug) {
    	$venue = ReportQuestion::FindBySlugOrFail($slug);
    	return view('admin.reportquestion.edit')
    	->with(['venue' => $venue, 'title' => 'Edit Question Category', 'addLink' => 'admin.reportquestion.list']);
    }

    /*----------------------------------------
    |   Update reportquestion content
    |----------------------------------------*/ 
    public function reportquestion_update(Request $request, $slug) {	
    	$validatedData = $request->validate([
            'title' => ['required', 'string', 'max:40']
        ]);

    	$venue = ReportQuestion::FindBySlugOrFail($slug);
    	
    	$venue->update([
    		// 'title' => $request['title'],
            'title' => ucfirst($request['title']),
            'slug'  => str_slug($request->title),
    	]);
    	return redirect()->route('admin.reportquestion.list')->with('flash_message', 'Question Category has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_reportquestion($id) {
        $user = ReportQuestion::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Question Category has been deleted successfully!');
    }

    /*----------------------------------------
    |   Change the status of the ReportQuestion
    |----------------------------------------*/ 
    public function reportquestion_Status($slug) {
     $venue = ReportQuestion::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Question Category of <b>'.$venue->title.'</b> is Activated' : 'Question Category of <b>'.$venue->title.'</b> is Deactivated';
       return redirect(route('admin.reportquestion.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }


    /*----------------------------------------
    |
    |   Report Question Options MANAGEMENT
    |
    |----------------------------------------*/


    /*----------------------------------------
    |   Listing of ReportQuestion
    |----------------------------------------*/ 
    public function reportquestionopt_index() {
        $reportquestionopt = ReportQuestionOption::orderBy('id','desc')->paginate(50);
    	return view('admin.reportquestionopt.index',compact('reportquestionopt'))
    	->with(['title' => 'Report Question Management', 'addLink' => 'admin.reportquestionopt.showCreate']);
    }

    public function reportquestionopt_showCreate() {
    	return view('admin.reportquestionopt.create')->with(['title' => 'Create Report Question', 'addLink' => 'admin.reportquestionopt.list']);
    }

    /*----------------------------------------
    |   Add reportquestionopt 
    |----------------------------------------*/ 
    public function reportquestionopt_create(Request $request) {
    	$validatedData = $request->validate([
            'option_title' => ['required', 'string', 'max:255']
        ]);

    	ReportQuestionOption::create([
    		'option_title' => $request['option_title'],
    		'report_question_id' => $request['report_question_id']
    	]);
    	return redirect()->route('admin.reportquestionopt.list')->with('flash_message', 'Report Question has been created successfully!');
    }

    /*----------------------------------------
    |   Edit reportquestionopt content
    |----------------------------------------*/ 
    public function reportquestionopt_showEdit($id) {
    	$venue = ReportQuestionOption::find($id);
    	return view('admin.reportquestionopt.edit')
    	->with(['venue' => $venue, 'title' => 'Edit ReportQuestionOption', 'addLink' => 'admin.reportquestionopt.list']);
    }

    /*----------------------------------------
    |   Update reportquestionopt content
    |----------------------------------------*/ 
    public function reportquestionopt_update(Request $request, $id) {	
    	$validatedData = $request->validate([
            'option_title' => ['required', 'string', 'max:255']
        ]);

    	$venue = ReportQuestionOption::find($id);
    	
    	$venue->update([
    		'option_title' => $request['option_title'],
    		'report_question_id' => $request['report_question_id']
    	]);
    	return redirect()->route('admin.reportquestionopt.list')->with('flash_message', 'Report Question has been updated successfully!');
    }

    /*----------------------------------------
    |   Delete User Record
    |----------------------------------------*/
    public function delete_reportquestionopt($id) {
        $user = ReportQuestionOption::find($id);
        $user->delete();
        return \Redirect::back()->with('flash_message',' Report Question has been deleted successfully!');
    }

    /*-------------------------------------------------
    |   Change the status of the ReportQuestionOption
    |-------------------------------------------------*/ 
    public function reportquestionopt_Status($slug) {
     $venue = ReportQuestionOption::FindBySlugOrFail($slug);

     if(!empty($venue)){
        $venue->status = $venue->status == 1 ? 0 : 1;
        $venue->save();
        $msg= $venue->status == 1 ? 'Report Question of <b>'.$venue->option_title.'</b> is Activated' : 'Report Question of <b>'.$venue->option_title.'</b> is Deactivated';
       return redirect(route('admin.reportquestionopt.list'))->with('flash_message', $msg);
     }
     return redirect()->back()->with('flash_message', 'Something Went Woring!');
    }

    /*-------------------------------------------------
    |   Player Report Listing
    |-------------------------------------------------*/
    public function player_reports()
    {
        $player_name = request()->get('player_name'); 
        $coach_name = request()->get('coach_name'); 
        $course = request()->get('course'); 

        if(!empty($course) && empty($player_name) && empty($coach_name))
        {
            $reports = PlayerReport::where('course_id',$course)->orderBy('id','asc')->paginate(10);
        }
        elseif(!empty($player_name) && empty($course) && empty($coach_name))
        {
            $player_users = User::where( 'name', 'LIKE', '%' . $player_name . '%' )->get();
            $user_ids[] = array();
            foreach($player_users as $user)
            {
                $user_ids[] = $user->id;
            }

            $reports = PlayerReport::whereIn('player_id',array_filter($user_ids))->paginate(10);

        }
        elseif(!empty($coach_name) && empty($player_name) && empty($course))
        {
            $coach_user = User::where( 'name', 'LIKE', '%' . $coach_name . '%' )->get();
            $coach_ids[] = array();
            foreach($coach_user as $user)
            {
                $coach_ids[] = $user->id;
            }

            $reports = PlayerReport::whereIn('coach_id',array_filter($coach_ids))->paginate(10);
            
        }
        elseif(!empty($coach_name) && !empty($player_name) && empty($course))
        {
            $coach_user = User::where( 'name', 'LIKE', '%' . $coach_name . '%' )->get();
            $coach_ids[] = array();
            foreach($coach_user as $user)
            {
                $coach_ids[] = $user->id;
            }

            $player_users = User::where( 'name', 'LIKE', '%' . $player_name . '%' )->get();
            $user_ids[] = array();
            foreach($player_users as $user)
            {
                $user_ids[] = $user->id;
            }
            
            $reports = PlayerReport::whereIn('coach_id',array_filter($coach_ids))->whereIn('player_id',array_filter($user_ids))->paginate(10);
            
        }
        elseif(!empty($coach_name) && empty($player_name) && !empty($course))
        {
            $coach_user = User::where( 'name', 'LIKE', '%' . $coach_name . '%' )->get();
            $coach_ids[] = array();
            foreach($coach_user as $user)
            {
                $coach_ids[] = $user->id;
            }
            
            $reports = PlayerReport::whereIn('coach_id',array_filter($coach_ids))->where('course_id',$course)->paginate(10);
            
        }
        elseif(empty($coach_name) && !empty($player_name) && !empty($course))
        {
            $player_users = User::where( 'name', 'LIKE', '%' . $player_name . '%' )->get();
            $user_ids[] = array();
            foreach($player_users as $user)
            {
                $user_ids[] = $user->id;
            }
            
            $reports = PlayerReport::whereIn('player_id',array_filter($user_ids))->where('course_id',$course)->paginate(10);
            
        }
        elseif(!empty($coach_name) && !empty($player_name) && !empty($course))
        {
            $coach_user = User::where( 'name', 'LIKE', '%' . $coach_name . '%' )->get();
            $coach_ids[] = array();
            foreach($coach_user as $user)
            {
                $coach_ids[] = $user->id;
            }

            $player_users = User::where( 'name', 'LIKE', '%' . $player_name . '%' )->get();
            $user_ids[] = array();
            foreach($player_users as $user)
            {
                $user_ids[] = $user->id;
            }
            
            $reports = PlayerReport::whereIn('coach_id',array_filter($coach_ids))->whereIn('player_id',array_filter($user_ids))->where('course_id',$course)->orderBy('id','desc')->paginate(10);
            
        }
        else{
           $reports = PlayerReport::orderBy('id','desc')->paginate(10); 
        }

        // dd($reports);

        return view('admin.player-report.player-report-listing')->with('reports',$reports);
    } 

    /*-------------------------------------------------
    |   Player Report Detail
    |-------------------------------------------------*/
    public function player_reports_detail($id){
        $report = PlayerReport::where('id',$id)->orderBy('id','asc')->first();
        return view('admin.player-report.player-report-detail')->with('report',$report);
    }

    /*-------------------------------------------------
    |   Match Reports - Competition Records
    |-------------------------------------------------*/
    public function comp_list()
    {
        $player_name = request()->get('player_name');

        if(!empty($player_name))
        {
            $competitions = \DB::table('competitions')
                ->leftjoin('users', 'competitions.player_id', '=', 'users.id')
                ->select('users.name', 'competitions.*')
                ->where( 'name', 'LIKE', '%' . $player_name . '%' )
                ->orderBy('id','desc')
                ->paginate(10);
        }
        else{
            $competitions = Competition::orderBy('id','desc')->paginate(10);
        }

        return view('admin.player-report.match-report.competition')->with('competitions',$competitions);
    }  

    /*-------------------------------------------------
    |    Match Reports - Competition Details
    |--------------------------------------------------*/
    public function comp_detail($id){
        $competition = Competition::where('id',$id)->first();
        return view('admin.player-report.match-report.match')->with('competition',$competition);
    }

    /*-------------------------------------------------
    |    Match Stats
    |--------------------------------------------------*/
    public function match_stats($comp_id,$match_id)
    {    
        $stats = MatchStats::where('competition_id',$comp_id)->where('match_id',$match_id)->first();

        if(!empty($stats))
        {
            $stats_calculation = statsCalculation($stats);
        }else{
            $stats_calculation = '';
        }
        return view('admin.player-report.match-report.stats',compact('stats_calculation','comp_id','match_id'));
    }

    /*-------------------------------------------------
    |    Delete reports (End of term & match report)
    |-------------------------------------------------*/
    public function player_reports_delete($id)
    {
        $get_report = PlayerReport::where('id',$id)->delete();    
        return \Redirect::back()->with('success','Report deleted successfully.');
    }

}
