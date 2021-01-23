<?php

namespace App\Http\Controllers;

use App\Reports;
use App\Division;
use App\Prospects;
use Auth;
use Session;
use Redirect;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(!isset($_GET['week'])){

			$week = date("W");
			$currentTime = time();
		}
		else 				
		{
			$curWeek = date("W");
			$week = $_GET["week"];
			
			if ($curWeek<$week) $currentTime = time()+3600*24*7*($week-$curWeek);
			else 				$currentTime = time()-3600*24*7*($curWeek-$week);
			
		}
		$today  = date("N",$currentTime)-1;
		$monday = strtotime("-$today days",$currentTime);
						
		$report = Reports::where('created_by',Auth::user()->id)->where('week_no', date('W', $monday))->get();
		foreach($report as $reps){
			$mon = explode(',',$reps->monday);
			$tue = explode(',',$reps->tuesday);
			$wed = explode(',',$reps->wednesday);
			$thr = explode(',',$reps->thrusday);
			$fri = explode(',',$reps->friday);
			$sat = explode(',',$reps->saturday);
			$sun = explode(',',$reps->sunday);
		} 
		
        return view('reports', compact('mon','tue','wed','thr','fri','sat','sun','monday','week'));
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
		$get_report = Reports::where('week_no', $request->input('week_no'))->where('created_by', Auth::user()->id)->first();
		if($get_report != null){
			$report = $get_report;	
		}
        else{
			$report = new Reports();
		}
        $report->week_no = filter_var($request->input('week_no'), FILTER_SANITIZE_STRING);
		$report->monday = $request->input('mon_callgoal').','.$request->input('mon_callmake').','.$request->input('mon_decision');
		$report->tuesday = $request->input('tue_callgoal').','.$request->input('tue_callmake').','.$request->input('tue_decision');
		$report->wednesday = $request->input('wed_callgoal').','.$request->input('wed_callmake').','.$request->input('wed_decision');
		$report->thrusday = $request->input('thr_callgoal').','.$request->input('thr_callmake').','.$request->input('thr_decision');
		$report->friday = $request->input('fri_callgoal').','.$request->input('fri_callmake').','.$request->input('fri_decision');
		$report->saturday = $request->input('sat_callgoal').','.$request->input('sat_callmake').','.$request->input('sat_decision');
		$report->sunday = $request->input('sun_callgoal').','.$request->input('sun_callmake').','.$request->input('sun_decision');
		$report->start_date = $request->input('start_date');
		$report->end_date = date('d-m-Y ', strtotime('+6 day', strtotime($request->input('start_date'))));
		$report->created_by = Auth::user()->id;
		$report->division_id = Auth::user()->division_id;
		
        Session::flash('success', 'Successfully Created');
        $report->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function view()
    {		
		if(!isset($_GET['week'])){

			$week = date("W");
			$currentTime = time();
		}
		else 				
		{
			$curWeek = date("W");
			$week = $_GET["week"];
			
			if ($curWeek<$week) $currentTime = time()+3600*24*7*($week-$curWeek);
			else 				$currentTime = time()-3600*24*7*($curWeek-$week);
			
		}
		$today  = date("N",$currentTime)-1;
		$monday = strtotime("-$today days",$currentTime);
		
		$today  = date("N",$currentTime)-1;
		$monday = strtotime("-$today days",$currentTime);
		$monday_data = $tuesday_data = $wednesday_data = $thrusday_data = $friday_data = $saturday_data = $sunday_data = [];
		$territory = Division::join('regions', 'regions.region_id', '=', 'divisions.region_id')->get();
		$reports = Reports::where('week_no',date('W', $monday ))->get();
		$repts = Reports::where('week_no',date('W', $monday ))->groupBy('week_no')->get();
		foreach($reports as $key => $report){
			$monday_data[$key] = explode(',',$report->monday);
			$tuesday_data[$key] = explode(',',$report->tuesday);
			$wednesday_data[$key] = explode(',',$report->wednesday);
			$thrusday_data[$key] = explode(',',$report->thrusday);
			$friday_data[$key] = explode(',',$report->friday);
			$saturday_data[$key] = explode(',',$report->saturday);
			$sunday_data[$key] = explode(',',$report->sunday);
		}
		$arr = $arr0 = $arr1 = $arr2 = 0;
		if($monday_data != null || $tuesday_data != null  || $wednesday_data != null  || $thrusday_data != null  || $friday_data != null  || $saturday_data != null  || $sunday_data != null){
			foreach($monday_data as $m){
				$arr0 +=(int)$m[0];
				$arr1 +=(int)$m[1];
				$arr2 +=(int)$m[2];
			}
			foreach($tuesday_data as $t){
				$arr0 +=(int)$t[0];
				$arr1 +=(int)$t[1];
				$arr2 +=(int)$t[2];
			}
			foreach($wednesday_data as $w){
				$arr0 +=(int)$w[0];
				$arr1 +=(int)$w[1];
				$arr2 +=(int)$w[2];
			}foreach($thrusday_data as $th){
				$arr0 +=(int)$th[0];
				$arr1 +=(int)$th[1];
				$arr2 +=(int)$th[2];
			}foreach($friday_data as $f){
				$arr0 +=(int)$f[0];
				$arr1 +=(int)$f[1];
				$arr2 +=(int)$f[2];
			}foreach($saturday_data as $sa){
				$arr0 +=(int)$sa[0];
				$arr1 +=(int)$sa[1];
				$arr2 +=(int)$sa[2];
			}foreach($sunday_data as $s){
				$arr0 +=(int)$s[0];
				$arr1 +=(int)$s[1];
				$arr2 +=(int)$s[2];
			}
		}
		$prospect = Prospects::get();
        return view('sales-reports',compact('territory','monday_data','tuesday_data','wednesday_data','thrusday_data','friday_data','saturday_data','sunday_data','prospect','monday','week','arr','reports','repts', 'arr0','arr1', 'arr2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function edit(Reports $reports)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reports $reports)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reports  $reports
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reports $reports)
    {
        //
    }
}
