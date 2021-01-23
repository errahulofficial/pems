<?php

namespace App\Http\Controllers;

use App\Division;
use App\Region;
use Illuminate\Http\Request;
use Session;
use Redirect;

class DivisionController extends Controller
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
        $divisions = Division::orderBy('division_id','DESC')->paginate(20);
		$regions = Region::get();
		$selectregion = [];
        foreach ($regions as $selectreg) {
            $selectregion[$selectreg->region_id] = $selectreg->region_id;
        }
		return view('divisions',['divisions' => $divisions], compact('selectregion'));
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
            'region_id' => 'required|max:200',
			'name' => 'unique:divisions|required|max:200',
			'state' => 'required|max:200',
			'available' => 'required|max:200',
			'email' => 'required|max:200',
            
        ]);
        $division = new Division();
        $division->region_id = filter_var($request->input('region_id'), FILTER_SANITIZE_STRING);
		$division->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
		$division->state = filter_var($request->input('state'), FILTER_SANITIZE_STRING);
		$division->available = filter_var($request->input('available'), FILTER_SANITIZE_STRING);
		$division->support_email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Created');
        $division->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function show(Division $division)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function edit(Division $division)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Division $division)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Division  $division
     * @return \Illuminate\Http\Response
     */
    public function destroy($division)
    {
        Division::where('division_id',$division)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
      
    }
}
