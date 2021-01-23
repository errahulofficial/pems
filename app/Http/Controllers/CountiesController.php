<?php

namespace App\Http\Controllers;

use App\counties;
use App\Division;
use Illuminate\Http\Request;
use Session;
use Redirect;

class CountiesController extends Controller
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
        $counties = counties::orderBy('county_id','DESC')->paginate(20);
		$divisions = Division::orderBy('division_id','DESC')->paginate(20);
		$selectdivision = [];
        foreach ($divisions as $selectdiv) {
            $selectdivision[$selectdiv->division_id] = $selectdiv->division_id;
        }
		return view('counties',['counties' => $counties], compact('selectdivision'));
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
			'county_name' => 'required|max:200',
            
        ]);
        $division = new counties();
        $division->division_id = filter_var($request->input('division_id'), FILTER_SANITIZE_STRING);
		$division->county_name = filter_var($request->input('county_name'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Created');
        $division->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function show(counties $counties)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function edit(counties $counties)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, counties $counties)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\counties  $counties
     * @return \Illuminate\Http\Response
     */
    public function destroy($counties)
    {
        counties::where('county_id',$counties)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
