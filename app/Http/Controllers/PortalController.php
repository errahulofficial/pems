<?php

namespace App\Http\Controllers;

use App\Portal;
use App\PortalName;
use App\careerStepsPage;
use App\PortalCities;
use App\jobPositionModel;
use App\Division;
use Session;
use Redirect;
use Illuminate\Http\Request;

class PortalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pnames = PortalName::pluck('portal_name', 'id');
		$territory = Division::pluck('name', 'division_id');
		$position = jobPositionModel::pluck('name','jobPositionId');
		$token = careerStepsPage::pluck('random_token','job_position_id');
		$pcity = PortalCities::pluck('city_name','id');
		$portal = Portal::paginate(10);
		return view('portal', compact('pnames','territory','position','portal','token','pcity'));
	}
	
	 public function getcity($territory)
    {
		$city = PortalCities::where('division_id',$territory)->get();
		$scity = [];
		$scity[0] = '- Select City -';
		foreach ($city as $c){
			$scity[$c->id] = $c->city_name;
		}
		return $scity;
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
        $this->validate($request, [
            'shortcode' => 'required|max:200',
            'territory' => 'required|max:200',
            'city' => 'required|max:200',
            'portal_name' => 'required|max:200',
            'position' => 'required|max:200',
            'url' => 'required|max:200',
            'status' => 'required|max:200',
            'date' => 'required|max:200',
            						
        ]);
        $portal = new Portal();
        $portal->portal = filter_var($request->input('portal_name'), FILTER_SANITIZE_STRING);
		$portal->division_id = filter_var($request->input('territory'), FILTER_SANITIZE_STRING);
		$portal->city = filter_var($request->input('city'), FILTER_SANITIZE_STRING);
		$portal->position = $request->input('position');
		$portal->url = $request->input('url');
		$portal->status = $request->input('status');
		$portal->date = $request->input('date');
		$portal->shortcode = $request->input('shortcode');
		
        Session::flash('success', 'Successfully Created');
        $portal->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function show(Portal $portal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function edit(Portal $portal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Portal $portal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Portal  $portal
     * @return \Illuminate\Http\Response
     */
    public function destroy($portal)
    {
        Portal::where('id',$portal)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
