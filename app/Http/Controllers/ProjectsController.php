<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Prospects;
use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;

class ProjectsController extends Controller
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
        $project = Projects::where('created_by', Auth::user()->id)->orderBy('id','DESC')->paginate(10);
		$prospect = Prospects::where('created_by', Auth::user()->id)->get();
		return view('projects', ['projects' => $project, 'prospects' => $prospect]);
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
        $this->validate(
            $request,
            [
            'project_name' => 'unique:projects|required|max:200'
            ]
        );
        $segment = $request->input('project_name');
        $by = Auth::user()->id;
        
        $data = new Projects();
        $data->project_name = $segment;
        $data->created_by = $by;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projects)
    {
         $this->validate(
            $request,
            [
            'project_name' => 'unique:projects|required|max:200'
            ]
        );
        
        $data = Projects::where('id', $projects)->first();
        $data->project_name = $request->input('project_name');
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
