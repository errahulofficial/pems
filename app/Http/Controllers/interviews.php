<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\jobPositionModel;
use App\careers_users_model;
use Illuminate\Support\Facades\DB;
use App\interviewerModel;
use App\interviewStatusModel;
use App\addinterviewer_jobpositions;
use App\employeeModel;
use App\jobPositionsStepModel;
use App\addinterviewer_jobpositions_steps;
use Carbon\Carbon;
use DateTime;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\User;
use App\Mail\applicantMailSent;
use Illuminate\Support\Facades\Mail;

class interviews extends Controller
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
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }
        return view('interviews', compact('jobPositionsArray'));
    }

    
    public function getInterviews(Request $request)
    {
        $this->validate($request, [
            'jobposition' => 'required|max:200',
            'status' => 'required|max:200',
            'interviewer' => 'required|max:200',
            'from_date' => 'required|max:200',
            'to_date' => 'required|max:200'
         ]);


        $jobposition = $request->input('jobposition');
        $status = $request->input('status');
        $interviewer = $request->input('interviewer');
        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        return redirect('interviews/view/'.$jobposition.'/'.$status.'/'.$interviewer.'/'.$from_date.'/'.$to_date);
    }
    public function viewInterviewsPage($jobposition, $status, $interviewer, $from_date, $to_date)
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }

        $addinterviewer = interviewerModel::orderBy('addinterviewerid', 'ASC')
        ->join('employee', 'employeeid', '=', 'employeeName')
        ->get();
        $addinterviewerArray = [];
        foreach ($addinterviewer as $addinterviewerView) {
            $addinterviewerArray[$addinterviewerView->employeeid] = $addinterviewerView->fname.' '.$addinterviewerView->lname;
        }


        $interviewStatus = interviewStatusModel::where('interviewstatus.jobPositionId', $jobposition)
        ->orderBy('interviewstatus.interviewstatusid', 'ASC')
        ->join('jobpositionstep', 'jobpositionstep.jobPositionStepId', '=', 'interviewstatus.jobPositionStepid')
        ->get();

        $interviewStatusArray = [];
        foreach ($interviewStatus as $interviewStatusView) {
            $interviewStatusArray[$interviewStatusView->interviewstatusid] = $interviewStatusView->stepname.' - '.$interviewStatusView->name;
        }


        $query = careers_users_model::where('careers_users.job_position', $jobposition);

        if ($status != 'any') {
            $query = $query->where(['careers_users.interview_status_id' => $status]);
        }

        if ($interviewer != 'any') {
            $query = $query->where(['careers_users.employee_id'=> $interviewer]);
        }

        $from_date2 = (Carbon::parse($from_date)->format('Y-m-d'));
        $to_date2 = (Carbon::parse($to_date)->format('Y-m-d'));

      
        $query = $query
       ->whereDate('careers_users.interview_date', '>=', $from_date2)
       ->whereDate('careers_users.interview_date', '<=', $to_date2)
        // ->whereBetween('careers_users.interview_date', [$from_date2,$to_date2])
        ->join('jobposition', 'jobposition.jobPositionId', '=', 'careers_users.job_position')
        ->join('interviewstatus', 'interviewstatus.interviewstatusid', '=', 'careers_users.interview_status_id')
        ->join('users', 'users.id', '=', 'careers_users.employee_id')
        ->join('add_interviewer_jobpositions_steps', 'add_interviewer_jobpositions_steps.id_steps', '=', 'careers_users.job_position_step')
        ->select(
            'careers_users.id as careers_usersId',
            'careers_users.email as careers_usersemail',
            'careers_users.phone as careers_usersphone',
            'careers_users.zipcode as careers_userszipcode',
            'interview_status_id',
            'careers_users.survey_questions_correct as careers_userssurvey_questions_correct',
            'careers_users.survey_questions_wrong as careers_userssurvey_questions_wrong',
            'careers_users.city as careers_userscity',
            'careers_users.state as careers_usersstate',
            'careers_users.resume as careers_usersresume',
            'careers_users.note_for_interviewer as careers_usersnote_for_interviewer',
            'careers_users.created_at as careers_userscreated_at',
            'jobposition.name as jobpositionNameGet',
            'careers_users.fname as careers_usersFname',
            'careers_users.lname as careers_usersLname',
            'users.city as city',
            'time_on_steps_page',
            'time_on_survey_page',
            'careers_users.employee_id as careers_usersemployee_id',
            'day',
            'interview_date',
            'colorcode',
            'interviewstatus.name as interviewstatusName',
            'users.fname as employeeFname',
            'users.lname as employeeNname',
            'careers_users.interview_time_select as careers_usersInterview_time_select',
            'add_interviewer_jobpositions_steps.check_steps_name as add_interviewer_jobpositions_stepsCheck_steps_name'
            )
        ->orderBy('careers_users.id', 'ASC')
        ->get();


		$notes = DB::table('interviewer_notes')->join('users','users.id','=','interviewer_id')->join('careers_users','careers_users.id','=','applicant_id')->select(
		'users.fname as interviewer_fname',
		'users.lname as interviewer_lname',
		'interviewer_notes.title as title',
		'interviewer_notes.description as descp',
		'interviewer_notes.created_at as created_at',
		'interviewer_notes.id as noteid',
		'careers_users.id as applicant_id')->orderBy('interviewer_notes.id', 'DESC')->get();
		
			
		$score = DB::table('score')->join('users','users.id','=','scored_by')->join('careers_users','careers_users.id','=','applicant_id')->select(
		'score','int_ques1','int_ques2','int_ques3','int_ques4','int_ques5','int_ques6','int_ques7','int_ques8','int_ques9','int_ques10','int_ques11','int_ques12','int_ques13','int_ques14','int_ques15','int_ques16','int_ques17','int_ques18','int_ques19','int_ques20','int_ques21','int_ques22','int_ques23','int_ques24','int_ques25',
		'users.id as interviewer',
		'careers_users.id as applicant')->orderBy('score.id', 'DESC')->get();

        return view(
            'interviews-views',
            ['applicants'=>$query],
            compact('jobPositionsArray', 'addinterviewerArray', 'interviewStatusArray','notes')
        )->with([
            'jobposition' => $jobposition,
            'status' => $status,
            'interviewer' => $interviewer,
            'from_date' => $from_date,
            'to_date' => $to_date,
			'scores' => $score
        ]);
    }
    

    public function changeInterviewer(Request $request, $careers_usersId)
    {
        $data = careers_users_model::where('id', $careers_usersId)->first();
        $data->employee_id = $request->input('interviewer');
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function changeStatus(Request $request, $careers_usersId)
    {
        $data = careers_users_model::where('id', $careers_usersId)->first();
        $data->interview_status_id = $request->input('status');
		 $data->job_position_step = $request->input('status');
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }

    public function reschedule($careers_usersId, $jobposition, $status, $interviewer, $from_date, $to_date)
    {
        return view('interview-reschedule')
        ->with([
            'jobposition' => $jobposition,
            'status' => $status,
            'interviewer' => $interviewer,
            'from_date' => $from_date,
            'to_date' => $to_date,
            'careers_usersId' => $careers_usersId
        ]);
    }
    public function rescheduleDate($careers_usersId, $jobposition, $status, $interviewer, $from_date, $to_date, $dateselected, $dayselected)
    {
        $dateselected = (Carbon::parse($dateselected)->format('Y-m-d'));
        $data = careers_users_model::where('id', $careers_usersId)->first();
        $data->interview_date = $dateselected;
        $data->day = $dayselected;
        $data->save();


        $jobPositionsGet_interviewer = addinterviewer_jobpositions::where('job_position_main_id', $jobposition)->get();

        foreach ($jobPositionsGet_interviewer as $jobPositionsGetView) {
            $InterviewToken = $jobPositionsGetView->add_interview_token;
            $positionToken = $jobPositionsGetView->position_token;
        }

      

        $interviewerGet = interviewerModel::where('employeeName', $interviewer)->get();

        foreach ($interviewerGet as $interviewerGetView) {
            $employeeid[] = $interviewerGetView->employeeName;
        }



        $employeeGet = employeeModel::where('employeeid', $interviewer)->get();

        $jobStepGet = jobPositionsStepModel::where('jobPositionId', $jobposition)->get();

        $jobPositionsGet = jobPositionModel::where('jobPositionId', $jobposition)->get();
        //   dd($InterviewToken);

        $interviewStepsGet = addinterviewer_jobpositions_steps::where('position_token', $positionToken)
      ->join('jobpositionstep', 'jobPositionStepId', 'jobPositionStep_name')
      ->where('checked_not', '1')
      ->get();
      
      

        return view('interview-reschedule-time')->with(
            [
           'id' => $jobposition,
           'status' => $status,
           'date' => $dateselected,
           'interviewerGet' => $interviewerGet,
           'interviewer' => $interviewer,
           'employeeGet' => $employeeGet,
           'jobStepGet' => $jobStepGet,
           'from_date' => $from_date,
           'to_date' => $to_date,
           'jobPositionsGet' => $jobPositionsGet,
           'interviewStepsGet' => $interviewStepsGet,
           'day' => $dayselected,
           'dayselected' => $dayselected,
           'careers_usersId' => $careers_usersId,
           'jobposition' => $jobposition,
           'dateselected' => $dateselected,
           
           ]
       );
    }

    public function rescheduleTime($careers_usersId, $jobposition, $status, $interviewer, $from_date, $to_date, $dateselected, $dayselected, $timeselected)
    {
        $data = careers_users_model::where('id', $careers_usersId)->first();
        $data->interview_time_select = $timeselected;
        $data->save();

        Session::flash('success', 'Successfully Updated');

        return redirect('interviews/view/'.$jobposition.'/any/any/'.$from_date.'/'.$to_date);
    }


    public function soloEmailSend($careers_usersId)
    {
        $emailData = careers_users_model::where('id', $careers_usersId)->get();
        foreach ($emailData as $emailDataView) {
            $careersUserId = $emailDataView->id;
            $interviewerId = $emailDataView->interview_status_id;
            $fname = $emailDataView->fname;
            $lname = $emailDataView->lname;
            $email = $emailDataView->email;
            $phone = $emailDataView->phone;
            $zipcode = $emailDataView->zipcode;
            $interview_date = $emailDataView->interview_date;
            $employee_id = $emailDataView->employee_id;
            $job_position = $emailDataView->job_position;
            $job_position_step = $emailDataView->job_position_step;
            $password_text = $emailDataView->password_text;
        }

        $InterviewStatus = interviewStatusModel::where('interviewstatusid', $interviewerId)->get();
        foreach ($InterviewStatus as $InterviewStatusView) {
            $emailSubject = $InterviewStatusView->emailSubject;
            $useInterviewerData = $InterviewStatusView->useInterviewerData;
            $EmailFromAddress = $InterviewStatusView->EmailFromAddress;
            $EmailFromAddressPass = $InterviewStatusView->EmailFromAddressPass;
            $EmailFromName = $InterviewStatusView->EmailFromName;
            $HTMLMessage = $InterviewStatusView->HTMLMessage;
            $TextMessage = $InterviewStatusView->TextMessage;
        }


        $jobPosition = jobPositionModel::where('jobPositionId', $job_position)->get();
        foreach ($jobPosition as $jobPositionView) {
            $jobPositionNameMain = $jobPositionView->name;
        }

        $addinterviewerJobpositionsSteps = addinterviewer_jobpositions_steps::where('id_steps', $job_position_step)->get();
        foreach ($addinterviewerJobpositionsSteps as $addinterviewerJobpositionsStepsView) {
            $jobPositionStepIdGet = $addinterviewerJobpositionsStepsView->jobPositionStep_name;
        }

        $jobPositionsStepModel = jobPositionsStepModel::where('jobPositionStepId', $jobPositionStepIdGet)->get();
        foreach ($jobPositionsStepModel as $jobPositionsStepModelView) {
            $interviewTimespan = $jobPositionsStepModelView->timespan;
        }

        $jobPositionsStepModel = jobPositionsStepModel::where('jobPositionStepId', $jobPositionStepIdGet)->get();
        foreach ($jobPositionsStepModel as $jobPositionsStepModelView) {
            $interviewTimespan = $jobPositionsStepModelView->timespan;
        }


        if ($useInterviewerData == '1') {
            $interviewerGet = interviewerModel::where('employeeName', $employee_id)->get();
            foreach ($interviewerGet as $interviewerGetView) {
                $EmailFromAddress = $interviewerGetView->intervieweremail;
                $EmailFromAddressPass = $interviewerGetView->intervieweremailpass;
            }
        }

        $data_base[0]['body'] = $HTMLMessage;
        $vars = array(
        '{first_name}'       =>  $fname,
        '{last_name}'        =>  $lname,
        '{from_name}'        =>  $EmailFromName,
        '{login_link}'       =>  url('login'),
        '{login_username}'   =>  $email,
        '{login_password}'   =>  $password_text,
        '{job_position}'     =>  $jobPositionNameMain,
        '{interview_time}'   =>  $interviewTimespan.' Minutes',
        );

       $mailBodyData =  strtr($data_base[0]['body'], $vars);

       $iterviewerTestMail = new \stdClass();
       $iterviewerTestMail->emailSubject = $emailSubject;
       $iterviewerTestMail->mailBodyData = $mailBodyData;

       Mail::to($email)
       ->send(new applicantMailSent($iterviewerTestMail));
        
        // $mail = new PHPMailer;
        // try {
        //     $mail->isSMTP();
        //     $mail->CharSet = "utf-8";
        //     $mail->SMTPAuth = true;
        //     $mail->SMTPSecure = "tls";
        //     $mail->Host = "smtp.gmail.com";
        //     $mail->Port = 587;
        //     $mail->Username = "daratest746@gmail.com";
        //     $mail->Password = "admin746#";
        //     $mail->setFrom($EmailFromAddress, $EmailFromName);
        //     $mail->Subject = $emailSubject;
        //     $mail->MsgHTML($mailBodyData);
        //     $mail->addAddress($email, $fname.' '.$lname);
        //     $mail->send();
        // } catch (phpmailerException $e) {
        //     dd($e);
        // } catch (Exception $e) {
        //     dd($e);
        // }

        Session::flash('success', 'Mail Sent Successfully');
       
        return redirect::back();
    }
}
