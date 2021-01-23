<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\jobPositionModel;
use App\interviewStatusModel;

class interviewStatus extends Controller
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
    public function index()
    {
        $interviewStatus = interviewStatusModel::join('jobposition', 'jobposition.jobPositionId', 'interviewstatus.jobPositionId')
        ->join('jobpositionstep', 'jobpositionstep.jobPositionStepId', 'interviewstatus.jobPositionStepid')
        ->select(
            'interviewstatusid',
            'interviewstatus.colorcode as interviewstatus_colorcode',
            'interviewstatus.jobPositionId as interviewstatus_jobPositionId',
            'interviewstatus.jobPositionStepid as interviewstatus_jobPositionStepid',
            'emailSubject',
            'EmailFromAddress',
            'EmailFromAddressPass',
            'EmailFromName',
            'variables',
            'HTMLMessage',
            'TextMessage',
            'interviewstatus.name as interviewstatus_name',
            'jobposition.name as jobposition_name',
            'jobpositionstep.stepname as jobpositionstep_stepname'
            )
        ->orderBy('interviewstatusid', 'DESC')
        ->paginate(10);

        $jobPositions = jobPositionModel::orderBy('name', 'ASC')->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }
        return view('interview-status', ['interviewStatus'=>$interviewStatus], compact('jobPositionsArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => 'required|max:200',
            'colorcode' => 'required|max:400',
            'jobposition' => 'required|max:10',
            'step' => 'required|max:100',
        ]);

        $stepGet = filter_var($request->input('step'), FILTER_SANITIZE_STRING);

        $stepId = substr($stepGet, 0, strpos($stepGet, '|'));

        $stepName1 = explode('|', $stepGet);
        $stepName = end($stepName1);

        $data = new interviewStatusModel();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $data->colorcode = filter_var($request->input('colorcode'), FILTER_SANITIZE_STRING);
        $data->jobPositionId = filter_var($request->input('jobposition'), FILTER_SANITIZE_STRING);
        $data->jobPositionStepid = $stepId;
        $data->jobPositionStepName = $stepName;
        
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function email($id)
    {
          $dataEmail = interviewStatusModel::where('interviewstatusid',$id)->get();
        return view('interview-status-email',['dataEmail'=>$dataEmail]);
    }

    public function updateEmail(Request $request,$id)
    {
        $data = interviewStatusModel::where('interviewstatusid',$id)->first();
        $data->emailSubject = $request->input('emailSubject');
        //$data->useInterviewerData = $request->input('useInterviewerData');
        $data->EmailFromAddress = $request->input('EmailFromAddress');
        $data->EmailFromAddressPass = $request->input('EmailFromAddressPass');
        $data->EmailFromName = $request->input('EmailFromName');
        $data->variables = $request->input('variables');
        $data->HTMLMessage = $request->input('HTMLMessage');
        $data->TextMessage = $request->input('TextMessage');
       
        Session::flash('success', 'Successfully Saved');
        $data->save();
        return redirect::back();
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }
       
        $interviewStatus = interviewStatusModel::join('jobposition', 'jobposition.jobPositionId', 'interviewstatus.jobPositionId')
        ->join('jobpositionstep', 'jobpositionstep.jobPositionStepId', 'interviewstatus.jobPositionStepid')
        ->select(
            'interviewstatusid',
            'interviewstatus.colorcode as interviewstatus_colorcode',
            'interviewstatus.jobPositionId as interviewstatus_jobPositionId',
            'interviewstatus.jobPositionStepid as interviewstatus_jobPositionStepid',
            'emailSubject',
            'EmailFromAddress',
            'EmailFromAddressPass',
            'EmailFromName',
            'variables',
            'HTMLMessage',
            'TextMessage',
            'interviewstatus.name as interviewstatus_name',
            'jobposition.name as jobposition_name',
            'jobpositionstep.stepname as jobpositionstep_stepname'
            )
        ->where('interviewstatusid', $id)
        ->orderBy('interviewstatusid', 'DESC')
        ->get();

        return view('interview-status-edit', ['interviewStatus'=>$interviewStatus], compact('jobPositionsArray'));
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
        $this->validate($request, [
            'name' => 'required|max:200',
            'colorcode' => 'required|max:400',
            'jobposition' => 'required|max:10',
            'step' => 'required|max:10',
        ]);
        $data = interviewStatusModel::where('interviewstatusid', $id)->first();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        $data->colorcode = filter_var($request->input('colorcode'), FILTER_SANITIZE_STRING);
        $data->jobPositionId = filter_var($request->input('jobposition'), FILTER_SANITIZE_STRING);
        $data->jobPositionStepid = filter_var($request->input('step'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        interviewStatusModel::where('interviewstatusid', $id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
