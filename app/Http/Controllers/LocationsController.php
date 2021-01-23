<?php

namespace App\Http\Controllers;

use App\Locations;
use App\Division;
use App\Region;
use Illuminate\Http\Request;
use Session;
use Redirect;
 
class LocationsController extends Controller
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
        $divisions = Division::get();
		$location = Locations::orderBy('id','DESC')->paginate(20);
		$regions = Region::get();
		$selectregion = [];
        foreach ($regions as $selectreg) {
            $selectregion[$selectreg->region_id] = $selectreg->region_id;
        }
		$selectdivision = [];
        foreach ($divisions as $selectdiv) {
            $selectdivision[$selectdiv->division_id] = $selectdiv->division_id;
        }
		return view('locations',['locations' => $location], compact('selectregion', 'selectdivision'));
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
            'division_id' => 'required|max:200',
			'zip' => 'required|max:200',
			'state' => 'required|max:200',
			'state_name' => 'required|max:200',
			'city' => 'required|max:200',
			'county' => 'required|max:200',
            
        ]);
		
		$divisions = Division::where('division_id', $request->input('division_id'))->first();
				
        $location = new Locations();
        $location->division_id = filter_var($request->input('division_id'), FILTER_SANITIZE_STRING);
		$location->region_id = $divisions->region_id;
		$location->zip = filter_var($request->input('zip'), FILTER_SANITIZE_STRING);
		$location->state = filter_var($request->input('state'), FILTER_SANITIZE_STRING);
		$location->state_name = filter_var($request->input('state_name'), FILTER_SANITIZE_STRING);
		$location->city = filter_var($request->input('city'), FILTER_SANITIZE_STRING);
		$location->county = filter_var($request->input('county'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Created');
        $location->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function show(Locations $locations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function edit(Locations $locations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locations $locations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locations  $locations
     * @return \Illuminate\Http\Response
     */
    public function destroy($locations)
    {
        Locations::where('id',$locations)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
