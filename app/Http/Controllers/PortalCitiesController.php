<?php

namespace App\Http\Controllers;

use App\PortalCities;
use App\Division;
use Session;
use Redirect;
use Illuminate\Http\Request;

class PortalCitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $territory = Division::pluck('name', 'division_id');
		$pcities = PortalCities::paginate(10);
		return view('portal-cities', ['territory' => $territory, 'cities' => $pcities]);
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
            'city_name' => 'required|max:200',
			'division_id' => 'required|max:200',
			
        ]);
        $portal_cities = new PortalCities();
        $portal_cities->city_name = filter_var($request->input('city_name'), FILTER_SANITIZE_STRING);
		$portal_cities->division_id = filter_var($request->input('division_id'), FILTER_SANITIZE_STRING);
		
        Session::flash('success', 'Successfully Created');
        $portal_cities->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PortalCities  $portalCities
     * @return \Illuminate\Http\Response
     */
    public function show(PortalCities $portalCities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PortalCities  $portalCities
     * @return \Illuminate\Http\Response
     */
    public function edit(PortalCities $portalCities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PortalCities  $portalCities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortalCities $portalCities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PortalCities  $portalCities
     * @return \Illuminate\Http\Response
     */
    public function destroy($portalCities)
    {
        PortalCities::where('id',$portalCities)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
