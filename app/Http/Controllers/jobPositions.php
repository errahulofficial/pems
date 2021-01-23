<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\jobPositionModel;
use App\jobPositionsStepModel;

class jobPositions extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = jobPositionModel::orderBy('jobPositionId','DESC')->paginate(10);
        $datastep = jobPositionsStepModel::get();
        return view('job-positions',['job'=>$data,'jobsteps'=>$datastep]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
        ]);
        $data = new jobPositionModel();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $data->desc = $request->input('desc')==null ? "N/A" : $request->input('desc');
        $data->status = $request->input('status')==null ? "N/A" : $request->input('status');
        date_default_timezone_set('Asia/Kolkata');
        $data->created_at = date('l-d-m-Y h:i A');
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            'desc' => 'required|max:400',
            'status' => 'required|max:200',
        ]);
        $data = jobPositionModel::where('jobPositionId',$id)->first();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $data->desc = filter_var($request->input('desc'), FILTER_SANITIZE_STRING);
        $data->status = filter_var($request->input('status'), FILTER_SANITIZE_STRING);
        date_default_timezone_set('Asia/Kolkata');
        $data->created_at = date('l-d-m-Y h:i A');
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id)
    {
        $data = jobPositionModel::where('jobPositionId',$id)->get();
        return view('job-positions-edit',['job'=>$data]);
    }
    public function delete($id)
    {
        jobPositionModel::where('jobPositionId',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
