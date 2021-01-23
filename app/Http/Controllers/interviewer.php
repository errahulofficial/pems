<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InterviewerStoreRequest;


use App\employeeModel;
use App\interviewerModel;
use App\jobPositionModel;
use App\jobPositionsStepModel;
use App\Category;
use App\Subcategory;
use App\addinterviewer_jobpositions;
use App\addinterviewer_jobpositions_steps;
use App\reserved_time_model;
use App\User;
use Session;
use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class interviewer extends Controller
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
        if (Auth::user()->role == "superadmin" || Auth::user()->role == "hr") {
            $employeeData = User::where('role','!=', 'superadmin')->orderBy('id', 'DESC')->get();
            $selectemployeeData = [];
            foreach ($employeeData as $employeeDataShow) {
                $selectemployeeData[$employeeDataShow->id] = $employeeDataShow->fname .' '. $employeeDataShow->lname;
            }

            $treeView2 = jobPositionModel::with(['jobPositionsStepModel'])
            ->orderBy('name', 'ASC')
            ->get();
            return view('add-interviewer',['treeView2' => $treeView2],compact('selectemployeeData'));
        } else {
            session::flash('rolesession', 'For Super Admin Only');
            return view('index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(InterviewerStoreRequest $request)
    {

        if (Auth::user()->role == "superadmin" || Auth::user()->role == "hr") {
            $employeeName = $request->input('employeeName');
            $intervieweremail = $request->input('intervieweremail');
            $intervieweremailpass = $request->input('intervieweremailpass');
           
            $position_name = $request->input('position_name');
            $job_position_main_id = $request->input('job_position_main_id');
            

            $position_token = $request->input('position_token');
            $job_positions_checks = $request->input('job_positions_checks');

           
            foreach ($position_name as $key => $position_name_data) {
                $position_name_new[] = $position_name_data;
            }

            foreach ($job_position_main_id as $key => $job_position_main_id_data) {
                $job_position_main_id_new[] = $job_position_main_id_data;
            }

            foreach ($position_token as $key => $position_token_data) {
                $position_token_new[] = $position_token_data;
            }

            $job_position_count = count($position_name_new);

            $job_position_main_id_count = count($job_position_main_id_new);


            $characters = '123456789';
            $pin = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);

            $characters2 = '123456789';
            $pin2 = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters2[rand(0, strlen($characters2) - 1)];
            $string2 = str_shuffle($pin2);

            for ($i=0;$i<$job_position_count;$i++) {
                $data = new addinterviewer_jobpositions();
                $data->position_name = $position_name_new[$i];
                $data->job_position_main_id = $job_position_main_id_new[$i];
                $data->position_token = $position_token_new[$i];
                $data->add_interview_token = $string;
                $data->save();
            }

            $count = count($position_name_new);
            for ($i=1;$i<=$count;$i++) {
                $job_positions_checks[] = $request->input('job_positions_checks'.$i);
                $check_steps_name[] = $request->input('check_steps_name'.$i);
                $jobPositionStep_name[] = $request->input('jobPositionStep_name'.$i);
                $job_positions_checks_token[] = $request->input('job_positions_checks_token'.$i);
           
            }
            $count_checkes = count($job_positions_checks);
            for ($i2=0;$i2<$count_checkes;$i2++) {
                if ($job_positions_checks[$i2] != null) {
                    $count_vals = count($job_positions_checks[$i2]);
                    for ($j=0;$j<$count_vals;$j++) {
                        $data = new addinterviewer_jobpositions_steps();
                        $data->check_steps_name = $check_steps_name[$i2][$j];
                        $data->jobPositionStep_name = $jobPositionStep_name[$i2][$j];
                        $data->checked_not = $job_positions_checks[$i2][$j];
                        $data->position_token = $job_positions_checks_token[$i2][$j];
                        $data->save();
                    }
                }
            }
            $monday = $request->input('monday');
            foreach ($monday as $key => $mondaydata) {
                $mondaynew[] = $mondaydata;
            }
            $mondaynew = implode('|', $mondaynew);

            $tuesday = $request->input('tuesday');
            foreach ($tuesday as $key => $tuesdaydata) {
                $tuesdaynew[] = $tuesdaydata;
            }
            $tuesdaynew = implode('|', $tuesdaynew);


            $wednesday = $request->input('wednesday');
            foreach ($wednesday as $key => $wednesdaydata) {
                $wednesdaynew[] = $wednesdaydata;
            }
            $wednesdaynew = implode('|', $wednesdaynew);


            $thrusday = $request->input('thrusday');
            foreach ($thrusday as $key => $thrusdaydata) {
                $thrusdaynew[] = $thrusdaydata;
            }
            $thrusdaynew = implode('|', $thrusdaynew);


            $friday = $request->input('friday');
            foreach ($friday as $key => $fridaydata) {
                $fridaynew[] = $fridaydata;
            }
            $fridaynew = implode('|', $fridaynew);


            $saturday = $request->input('saturday');
            foreach ($saturday as $key => $saturdaydata) {
                $saturdaynew[] = $saturdaydata;
            }
            $saturdaynew = implode('|', $saturdaynew);


            $sunday = $request->input('sunday');
            foreach ($sunday as $key => $sundaydata) {
                $sundaynew[] = $sundaydata;
            }
            $sundaynew = implode('|', $sundaynew);


            $main = $request->input('main');
            foreach ($main as $key => $maindata) {
                $maindatanew[] = $maindata;
            }
            $mainnew = implode('|', $maindatanew);

            $data = new interviewerModel();
            $data->employeeName = $employeeName;
            $data->intervieweremail = $intervieweremail;
            $data->intervieweremailpass = $intervieweremailpass;
            $data->monday = $mondaynew;
            $data->tuesday = $tuesdaynew;
            $data->wednesday = $wednesdaynew;
            $data->thrusday = $thrusdaynew;
            $data->friday = $fridaynew;
            $data->saturday = $saturdaynew;
            $data->sunday = $sundaynew;
            $data->main = $mainnew;
            $data->add_interview_token = $string;
            Session::flash('success', 'Successfully Created');
            $data->save();
            return redirect::back();
        } else {
            session::flash('rolesession', 'For Super Admin Only');
            return view('index');
        }
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

    public function view()
    {
        if (Auth::user()->role == "superadmin" || Auth::user()->role == "hr") {
            $interviewerData = interviewerModel::join('users', 'id', '=', 'employeeName')
            ->orderBy('addinterviewerid', 'DESC')->get();
            return view('view-interviewers', [ 'interviewerData' => $interviewerData]);
        } else {
            session::flash('rolesession', 'For Super Admin Only');
            return view('index');
        }
    }
    public function viewOne($id)
    {
        if (Auth::user()->role == "superadmin" || Auth::user()->role == "hr") {
            $employeeData = User::where('role', '!=', 'superadmin')->orderBy('id', 'DESC')->get();

            $selectemployeeData = [];
            foreach ($employeeData as $employeeDataShow) {
                $selectemployeeData[$employeeDataShow->id] = $employeeDataShow->fname ." ". $employeeDataShow->lname;
            }
            $interviewerData = interviewerModel::join('users', 'id', '=', 'employeeName')
        ->where('addinterviewerid', $id)
        ->orderBy('addinterviewerid', 'DESC')->get();
 
            foreach ($interviewerData as $interviewerDataview) {
                $token_get =  $interviewerDataview->add_interview_token;
            }

            $treeView2 = addinterviewer_jobpositions::with(['addinterviewer_jobpositions_steps'])
            ->where('add_interview_token', $token_get)
            ->orderBy('position_name', 'ASC')
            ->get();

            $treeViewAll = jobPositionModel::with(['jobPositionsStepModel'])
            ->orderBy('name', 'ASC')
            ->get();
          

            return view('view-interviewer', ['interviewerData' => $interviewerData,'treeView2' => $treeView2,'treeViewAll'=>$treeViewAll], compact('selectemployeeData'));
        } else {
            session::flash('rolesession', 'For Super Admin Only');
            return view('index');
        }
    }
    
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
        if (Auth::user()->role == "superadmin" || Auth::user()->role == "hr") {
            $employeeName = $request->input('employeeName');
            $intervieweremail = $request->input('intervieweremail');
            $intervieweremailpass = $request->input('intervieweremailpass');


            $position_name = $request->input('position_name');
            $position_token = $request->input('position_token');
            $job_positions_checks = $request->input('job_positions_checks');

            $job_position_main_id = $request->input('job_position_main_id');
           
            foreach ($position_name as $key => $position_name_data) {
                $position_name_new[] = $position_name_data;
            }

            foreach ($position_token as $key => $position_token_data) {
                $position_token_new[] = $position_token_data;
            }

            $job_position_count = count($position_name_new);


            $characters = '123456789';
            $pin = mt_rand(1000000, 9999999)
           . mt_rand(1000000, 9999999)
           . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);

            $characters2 = '123456789';
            $pin2 = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters2[rand(0, strlen($characters2) - 1)];
            $string2 = str_shuffle($pin2);

           

            foreach ($job_position_main_id as $key => $job_position_main_id_data) {
                $job_position_main_id_new[] = $job_position_main_id_data;
            }

            for ($i=0;$i<$job_position_count;$i++) {
                $data = new addinterviewer_jobpositions();
                $data->position_name = $position_name_new[$i];
                $data->job_position_main_id = $job_position_main_id_new[$i];
                $data->position_token = $position_token_new[$i];
                $data->add_interview_token = $string;
                $data->save();
            }

            $count = count($position_name_new);
            for ($i=1;$i<=$count;$i++) {
                $job_positions_checks[] = $request->input('job_positions_checks'.$i);
                $check_steps_name[] = $request->input('check_steps_name'.$i);
                $jobPositionStep_name[] = $request->input('jobPositionStep_name'.$i);
                $job_positions_checks_token[] = $request->input('job_positions_checks_token'.$i);
            }
           
            $count_checkes = count($job_positions_checks);
/* 
            for ($i2=0;$i2<$count_checkes;$i2++) {
                $data = new addinterviewer_jobpositions_steps();
                $data->jobPositionStep_name = $jobPositionStep_name_new[$i2];
                $data->check_steps_name = $check_steps_name_new[$i2];
                $data->checked_not = $job_positions_checks_new[$i2];
                $data->position_token = $job_positions_checks_token_new[$i2];
                $data->save();
            } */
            for ($i2=0;$i2<$count_checkes;$i2++) {
                if ($job_positions_checks[$i2] != null) {
                    $count_vals = count($job_positions_checks[$i2]);
                    for ($j=0;$j<$count_vals;$j++) {
                        $data = new addinterviewer_jobpositions_steps();
                        $data->check_steps_name = $check_steps_name[$i2][$j];
                        $data->jobPositionStep_name = $jobPositionStep_name[$i2][$j];
                        $data->checked_not = $job_positions_checks[$i2][$j];
                        $data->position_token = $job_positions_checks_token[$i2][$j];
                        $data->save();
                    }
                }
            }


            $monday = $request->input('monday');
            foreach ($monday as $key => $mondaydata) {
                $mondaynew[] = $mondaydata;
            }
            $mondaynew = implode('|', $mondaynew);

            $tuesday = $request->input('tuesday');
            foreach ($tuesday as $key => $tuesdaydata) {
                $tuesdaynew[] = $tuesdaydata;
            }
            $tuesdaynew = implode('|', $tuesdaynew);


            $wednesday = $request->input('wednesday');
            foreach ($wednesday as $key => $wednesdaydata) {
                $wednesdaynew[] = $wednesdaydata;
            }
            $wednesdaynew = implode('|', $wednesdaynew);


            $thrusday = $request->input('thrusday');
            foreach ($thrusday as $key => $thrusdaydata) {
                $thrusdaynew[] = $thrusdaydata;
            }
            $thrusdaynew = implode('|', $thrusdaynew);


            $friday = $request->input('friday');
            foreach ($friday as $key => $fridaydata){
                $fridaynew[] = $fridaydata;
            }
            $fridaynew = implode('|', $fridaynew);


            $saturday = $request->input('saturday');
            foreach ($saturday as $key => $saturdaydata) {
                $saturdaynew[] = $saturdaydata;
            }
            $saturdaynew = implode('|', $saturdaynew);


            $sunday = $request->input('sunday');
            foreach ($sunday as $key => $sundaydata) {
                $sundaynew[] = $sundaydata;
            }
            $sundaynew = implode('|', $sundaynew);


            $main = $request->input('main');
            foreach ($main as $key => $maindata) {
                $maindatanew[] = $maindata;
            }
            $mainnew = implode('|', $maindatanew);

            $data = interviewerModel::where('addinterviewerid', $id)->first();
            $data->employeeName = $employeeName;
            $data->intervieweremail = $intervieweremail;
            $data->intervieweremailpass = $intervieweremailpass;
            $data->monday = $mondaynew;
            $data->tuesday = $tuesdaynew;
            $data->wednesday = $wednesdaynew;
            $data->thrusday = $thrusdaynew;
            $data->friday = $fridaynew;
            $data->saturday = $saturdaynew;
            $data->sunday = $sundaynew;
            $data->main = $mainnew;
            $data->add_interview_token = $string;
            Session::flash('success', 'Successfully Updated');
            $data->save();
            return redirect::back();
        } else {
            session::flash('rolesession', 'For Super Admin Only');
            return view('index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function reserved($id)
    {
        $reservedtime = reserved_time_model::where('id', $id)
        ->orderBy('id', 'DESC')->paginate(10);
        return view('add-reserved-time', ['id'=>$id,'reservedtime'=>$reservedtime]);
    }

    public function reservedtime(Request $request)
    {
        $this->validate($request, [
            'parentid' => 'required|max:200',
            'from_date' => 'required|max:200',
            'to_date' => 'required|max:200',
            'reason' => 'required|max:200',
         ]);
        
        $parentid = $request->input('parentid');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');
        $reason = $request->input('reason');
        $data = new reserved_time_model();
        $data->interviewer_id = $parentid;
        $data->from_date = $from_date;
        $data->to_date = $to_date;
        $data->reason = $reason;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    
    public function deactivate($id)
    {
   
        $deactivate = interviewerModel::where('addinterviewerid', $id)->first();
        $deactivate->available_status = '0';
        $deactivate->save();
        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }

    public function activate($id)
    {
       
        $activate = interviewerModel::where('addinterviewerid', $id)->first();
        $activate->available_status = '1';
        $activate->save();
        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }

    public function destroy($id)
    {
        interviewerModel::where('addinterviewerid', $id)->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect::back();
    }

    public function destroyReservedTime($id)
    {
        reserved_time_model::where('id', $id)->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect::back();
    }
}
