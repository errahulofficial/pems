<?php

namespace App\Http\Controllers;

use App\Prospects;
use App\Projects;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;

class ProspectsController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		$prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		$project_list = Projects::where('created_by', Auth::user()->id)->pluck('project_name','id');
		return view('add-prospect', ['project' => $project ], compact('project_list','prospect'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 public function contact()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('contact', ['prospect' => $prospect ], compact('project'));
    }
	
	 public function firstcommit()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('1stcommit', ['prospect' => $prospect ], compact('project'));
    }
	
	 public function secondcommit()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('2ndcommit', ['prospect' => $prospect ], compact('project'));
    }
	
	 public function sidedish()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('sidedish', ['prospect' => $prospect ], compact('project'));
    }
	
	 public function markedsold()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('markedsold', ['prospect' => $prospect ], compact('project'));
    }
	 public function markedclosed()
    {
		$project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
        $prospect = Prospects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->get();
		return view('markedclosed', ['prospect' => $prospect ], compact('project'));
    }
	 
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
        $this->validate(
		$request,[
			'project_id' => 'required|max:200',
			'website' => 'required|max:200',
			'company_name' => 'required|max:200',
			'company_address' => 'required|max:200',
			'facebook_url' => 'required|max:200',
			'whatsapp' => 'required|max:200',
			'contact_phone' => 'required|max:200',
			'contact_name' => 'required|max:200',
			'contact_surname' => 'required|max:200',
			'contact_email' => 'required|max:200'
			]
		);
		
		$proj = Projects::where('id', $request->input('project_id'))->first();
		
		$data = new Prospects();
		$data->project_id = $request->input('project_id');
		$data->project_name = $proj->project_name;
		$data->website = $request->input('website');
		$data->company_name = $request->input('company_name');
		$data->company_address = $request->input('company_address');
		$data->facebook_url = $request->input('facebook_url');
		$data->whatsapp = $request->input('whatsapp');
		$data->contact_phone = $request->input('contact_phone');
		$data->contact_name = $request->input('contact_name');
		$data->contact_surname = $request->input('contact_surname');
		$data->contact_email = $request->input('contact_email');
		$data->commit_stage = '0';
        $data->created_by = $proj->created_by;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect('/contacts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function show(Prospects $prospects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function edit(Prospects $prospects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $prospects)
    {
        $this->validate(
		$request,[
			'commit_stage' => 'required',
			
			]
		);
		
		
		$data = Prospects::where('id', $prospects)->first();

		$data->commit_stage = $request->input('commit_stage');
		if($request->input('commit_stage') == '1' || $request->input('commit_stage') == '2'){
			
		$data->commit_confirm =  $request->input('commit_confirm');
		$data->commit_schedule =  strtotime($request->input('commit_schedule_date')." ".$request->input('commit_schedule_hrs').":".$request->input('commit_schedule_min')." ".$request->input('commit_schedule_am'));
		
		}
		
        $data->note_title = $request->input('title');
		$data->note_description = $request->input('description');
        Session::flash('success', 'Successfully Updated');
        $data->save();
		
		if($request->input('commit_stage') == '1')
        return redirect('/1st-commit');
	
		if($request->input('commit_stage') == '2')
			return redirect('/2nd-commit');
		
		if($request->input('commit_stage') == '3')
			return redirect('/side-dish');
		
		if($request->input('commit_stage') == '4')
			return redirect('/marked-sold');
		
		if($request->input('commit_stage') == '5')
			return redirect('/marked-closed');
		
		if($request->input('commit_stage') == '6')
			return redirect('/contacts');
		
		if($request->input('commit_stage') == '0')
			return redirect('/contacts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prospects  $prospects
     * @return \Illuminate\Http\Response
     */
    public function destroy($prospects)
    {
        Prospects::where('id',$prospects)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
