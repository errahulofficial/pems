<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\jobPositionsStepModel;

class jobPositionsSteps extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index($id)
    {
        $data = jobPositionsStepModel::where('jobPositionId',$id)->orderBy('jobPositionStepId','DESC')->paginate(10);
        return view('job-positions-steps',['job'=>$data,'id'=>$id]);
    }
    public function positionup($id)
    {
        $data = jobPositionsStepModel::where('jobPositionId',$id)->orderBy('stepname','ASC')->paginate(10);
        return view('job-positions-steps',['job'=>$data,'id'=>$id]);
    }
    public function positiondown($id)
    {
        $data = jobPositionsStepModel::where('jobPositionId',$id)->orderBy('stepname','DESC')->paginate(10);
        return view('job-positions-steps',['job'=>$data,'id'=>$id]);
    }
    public function timeup($id)
    {
        $data = jobPositionsStepModel::where('jobPositionId',$id)->orderBy('created_at','ASC')->paginate(10);
        return view('job-positions-steps',['job'=>$data,'id'=>$id]);
    }
    public function timedown($id)
    {
        $data = jobPositionsStepModel::where('jobPositionId',$id)->orderBy('created_at','DESC')->paginate(10);
        return view('job-positions-steps',['job'=>$data,'id'=>$id]);
    }
    public function create(Request $request,$id)
    {
        $this->validate($request, [
            'stepno' => 'required|max:3',
            'stepname' => 'required|max:200',
            'timespan' => 'required|max:400',
            'desc' => 'required|max:400',
        ]);
        $data = new jobPositionsStepModel();
        $data->jobPositionId = filter_var($id, FILTER_SANITIZE_STRING);
        $data->stepno = filter_var($request->input('stepno'), FILTER_SANITIZE_STRING);
        $data->stepname = filter_var($request->input('stepname'), FILTER_SANITIZE_STRING);
        if(!empty($request->input('timespan'))){
            $data->timespan = filter_var($request->input('timespan'), FILTER_SANITIZE_STRING);
        }
        $data->desc = filter_var($request->input('desc'), FILTER_SANITIZE_STRING);
        $data->colorcode = $request->input('colorcode') == null ? "N/A" : $request->input('colorcode');
        $data->status = $request->input('status') == null ? "N/A" : $request->input('status');
        // date_default_timezone_set('Asia/Kolkata');
        // $data->created_at = date('Y-m-d H:i:s');
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'stepname' => 'required|max:200',
            'timespan' => 'required|max:400',
            'desc' => 'required|max:400',
        ]);
        $data = jobPositionsStepModel::where('jobPositionStepId',$id)->first();
        $data->stepname = filter_var($request->input('stepname'), FILTER_SANITIZE_STRING);
        if (!empty($request->input('timespan'))) {
            $data->timespan = filter_var($request->input('timespan'), FILTER_SANITIZE_STRING);
        }
        $data->desc = filter_var($request->input('desc'), FILTER_SANITIZE_STRING);
        $data->colorcode = $request->input('colorcode') == null ? "N/A" : $request->input('colorcode');
        $data->status = $request->input('status') == null ? "N/A" : $request->input('status');
        // date_default_timezone_set('Asia/Kolkata');
        // $data->created_at = date('Y-m-d H:i:s');
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id,$backid)
    {
        $data = jobPositionsStepModel::where('jobPositionStepId',$id)->get();
        return view('job-positions-step-edit',['job'=>$data,'backid'=>$backid]);
    }
    public function delete($id)
    {
        jobPositionsStepModel::where('jobPositionStepId',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
