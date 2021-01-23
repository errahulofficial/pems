<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\interviewStatusModel;

class JobPositionStepsGet extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $step = DB::table("jobpositionstep")
        ->where("jobPositionId", $id)
        ->pluck("stepname","jobPositionStepId");
        return json_encode($step);
    }


    public function interviewerGet($id)
    {
        $step =   interviewStatusModel::where('jobPositionId', $id)
        ->orderBy('interviewstatusid','ASC')
        ->get()
        ->pluck('full_name', 'interviewstatusid');

        return json_encode($step);
    }



    public function indexnew($id)
    {
        $step2 = DB::table("addinterviewer")
        ->join('employee','employeeid','=','employeeName')
        ->pluck("fname","employeeName");
        return json_encode($step2);
    }


    // public function index($id)
    // {
    //     $step = DB::table("jobpositionstep")
    //     ->where("jobPositionId", $id)
    //     ->pluck("stepname","jobPositionStepId","status");
    //     return json_encode($step);
    // }
    
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
