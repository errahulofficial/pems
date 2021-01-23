<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\careersQuestionModel;
use App\careerStepsPage;
use App\careers_users_model;
use App\blackListModel;
use App\Locations;
use App\Portal;
use Session;
use Redirect;
use File;
use Auth;
use App\jobPositionModel;
use App\interviewerModel;
use App\addinterviewer_jobpositions;
use App\employeeModel;
use App\jobPositionsStepModel;
use App\addinterviewer_jobpositions_steps;
use App\interviewStatusModel;
use DateTime;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Hash;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Mail\CareersFirstMailSend;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class careers_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
	
   
    public function index()
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')
        ->join('careers_steps_page', 'jobPositionId', 'job_position_id')
        ->where('available_status', '1')
        ->get();
        session()->forget([
            'timer',
            'session_token',
            'steptimer'.
            'fname',
            'lname',
            'email',
            'phone',
            'zipcode',
            'city',
            'state',
            'resume',
            'time_on_steps_page',
            'time_on_survey_page',
            'survey_questions_correct',
            'survey_questions_wrong',
            'interview_date',
            'day',
            'employee_id',
            'job_position',
            'job_position_step',
            'interview_time_select',
            'note_for_interviewer',
            'interview_status_id'
            ]);
        return view('careers_views/index', ['jobPositions' => $jobPositions]);
    }
    public function survey($id, $random_token, $steptimer, $session_token)
    {
        // if (careers_users_model::where('session_token', $session_token)->exists()) {
        if ($session_token) {
            $step5Get = careerStepsPage::where('random_token', $random_token)
            ->where('job_position_id', $id)
            ->get();
            $headfoot = careerStepsPage::where('random_token', $random_token)
            ->where('job_position_id', $id)
            ->first();
    
            foreach ($step5Get as $step5GetView) {
                $step5GetViewNew[] = $step5GetView->step5;
            }
    
            $questions = careersQuestionModel::where('step5_token', $step5GetViewNew)
            ->orderBy('questions_id', 'DESC')->get();
    
            $steps = careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->get();
    
            Session::put('timer', date("h:i:s"));
    
            foreach ($steps as $steps_show) {
                $steps_new = $steps_show->step5;
            }

            $timeInMinutes3 = (new Carbon($steptimer))->diff(new Carbon(date("h:i:s")))->format('%I:%s');
    
            // $data = careers_users_model::where('session_token', $session_token)->first();
            // $data->time_on_steps_page = $timeInMinutes3;
            // $data->save();

            Session::put('time_on_steps_page', $timeInMinutes3);
    
            return view(
                'careers_views/survey',
                [
        'questions'=>$questions,'step5'=>$steps_new, 'headfoot'=>$headfoot
    ]
            )
    ->with(['id'=>$id,'random_token'=>$random_token,'session_token' => $session_token]);
        } else {
            return abort(404);
        }
    }

    public function showsteps($id, $random_token)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            $steps = careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->get();
            return view('careers_views/steps-page', ['steps'=>$steps])->with(['id'=>$id,'random_token'=>$random_token]);
        } else {
            return abort(404);
        }
    }
    public function formPage($id, $random_token)
    {
		if(isset($_GET['s'])){
			$var = $_GET['s'];
			$visit = Portal::where('shortcode',$var)->first();
			$visit->counts += 1;
			$visit->save();
		}
		else {
			$var = '';
		}
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            return view('careers_views/formPage')->with(['id' => $id,'random_token' => $random_token,'refer'=>$var]);
        } else {
            return abort(404);
        }
    }

    public function continue(Request $request, $id, $random_token)
    {
        $this->validate($request, [
            'resume' => 'required|mimes:pdf,doc,docx|max:5048',
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'email' => 'required|max:200',
            'phone' => 'required|numeric|regex:/[0-9]/',
            'zipcode' => 'required|numeric|regex:/[0-9]/',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
         ]);

        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            $fname = $request->input('fname');
            $lname = $request->input('lname');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $zipcode = $request->input('zipcode');
            $city = $request->input('city');
            $state = $request->input('state');
			if($request->input('refer') != ''){
				$refer = $request->input('refer');
			}
			else
			{
			$refer = "";
			}
            $divisionId = Locations::where('zip', $zipcode)->first();
            if (blackListModel::where('email', $email)->exists() || blackListModel::where('phone', $phone)->exists()) {
                // dd('honsla');
                Session::flash('blacklisted', 'Sorry! You are black listed.');
                return redirect('careers/'.$id.'/'.$random_token)->with(['id' => $id,'random_token' => $random_token]);
            } else {
                // RESUME
                if (careers_users_model::where('email', $email)->exists() || blackListModel::where('phone', $phone)->exists()) {
                    Session::flash('userexists', 'User already registered!');
                    return redirect('careers/'.$id.'/'.$random_token)->with(['id' => $id,'random_token' => $random_token]);
                } else if ($divisionId != null && User::where('division_id', $divisionId->division_id)->exists()) {
                    $file = $request->file('resume');
                    $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000).time();
                    File::makeDirectory(public_path() . '/careers_data/' . $folder_name, 0777, true);
                    $destinationPath = ('careers_data/' . $folder_name);
                    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $pin = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . time()
                . $characters[rand(0, strlen($characters) - 1)];
                    $string = str_shuffle($pin);
                    $imagename = $string.'.'.$file->getClientOriginalExtension();
                    $file->move($destinationPath, $imagename);

                    // token generate for user session
                    $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $pin2 = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . time()
                . $characters2[rand(0, strlen($characters2) - 1)];
                    $string2 = str_shuffle($pin2);
                   
                    Session::put('steptimer', date("h:i:s"));
                    
                    // token generate for user session

                    Session::put('fname', $fname);
                    Session::put('lname', $lname);
                    Session::put('email', $email);
                    Session::put('phone', $phone);
                    Session::put('zipcode', $zipcode);
                    Session::put('city', $city);
                    Session::put('state', $state);
                    Session::put('resume', $folder_name.'/'.$imagename);
                    Session::put('session_token', $string2);
					if($refer != ''){
						Session::put('refer', $refer);
					}
                    

        
                    // $data = new careers_users_model();
                    // $data->fname = $fname;
                    // $data->lname = $lname;
                    // $data->email = $email;
                    // $data->phone = $phone;
                    // $data->zipcode = $zipcode;
                    // $data->city = $city;
                    // $data->state = $state;
                    // $data->resume = $folder_name.'/'.$imagename;
                    // $data->session_token = $string2;
                    // $data->save();

                    return redirect('careers/steps/'.$id.'/'.$random_token);
                }
                else {
                    Session::flash('blacklisted', 'Position Filled');
                return redirect('careers/'.$id.'/'.$random_token)->with(['id' => $id,'random_token' => $random_token]);
                }
            }
        } else {
            return abort(404);
        }
    }
    
    public function questionsSubmit(Request $request, $id, $random_token)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            $sma = $request->input('sma');
            $token = $request->input('token');
            $s_token = $request->input('s_token');

        
            $questions = careersQuestionModel::where('step5_token', $token)->get();
      
            $i = 1;
            foreach ($questions as $questions_loop) {
                $survey = $request->input('survey'.$i);
                if($survey != ''){
                foreach ($survey as $survey_yes_view) {
                    $survey_yes_new[] = $survey_yes_view;
                }
            }
            else{
                $survey_yes_new[] = '0';
            }
                $i++;
            }

            $data  = implode('|', $survey_yes_new);
            $survey_questions_correct = substr_count($data, 1);
            $survey_questions_wrong = substr_count($data, 0);

            $timeInMinutes3 = (new Carbon($sma))->diff(new Carbon(date("h:i:s")))->format('%I:%s');

            // where user session

             
            Session::put('time_on_survey_page', $timeInMinutes3);
            Session::put('survey_questions_correct', $survey_questions_correct);
            Session::put('survey_questions_wrong', count($questions) - $survey_questions_correct);

            // $data = careers_users_model::where('session_token', $s_token)->first();
            // $data->time_on_survey_page = $timeInMinutes3;
            // $data->survey_questions_correct = $survey_questions_correct;
            // $data->survey_questions_wrong = count($questions) - $survey_questions_correct;
            // $data->save();

            return redirect('careers/schedule-interview/'.$id.'/'. $random_token.'/'.$s_token);
        // dd($survey_questions_correct .' - '.$survey_questions_wrong.' - '.$timeInMinutes.' - '.count($questions).' - ' .$s_token);
        } else {
            return abort(404);
        }
    }
    
    public function scheduleInterview($id, $random_token, $s_token)
    {
        // if (careers_users_model::where('session_token', $s_token)->exists()) {
        if ($s_token) {
            if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
				if(Auth::guard('applicant')->user()){
					$applicant = careers_users_model::where('email', Auth::guard('applicant')->user()->email)->first();
					$score = DB::table('score')->where('applicant_id', Auth::guard('applicant')->user()->id)->first();
					return view('careers_views/schedule-interview')->with(['id' => $id,'random_token' => $random_token,'s_token' => $s_token,'applicant'=> $applicant,'score'=> $score]);
				}
				else{
					
					$appl = '{"job_position_step":"1"}';
					$applicant = json_decode($appl);
					return view('careers_views/schedule-interview')->with(['id' => $id,'random_token' => $random_token,'s_token' => $s_token,'applicant'=> $applicant]);
				}
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function datepick($id, $random_token, $session_token, $date, $day)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            // if (careers_users_model::where('session_token', $session_token)->exists()) {
            if ($session_token) {
                $date = (Carbon::parse($date)->format('Y-m-d'));

                Session::put('interview_date', $date);

                // $data = careers_users_model::where('session_token', $session_token)->first();
                // $data->interview_date = $date;
                // $data->save();

                return redirect('careers/schedule-time/'.$id.'/'. $random_token.'/'.$session_token.'/'.$date.'/'.$day);
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }
    public function scheduleTime($id, $random_token, $s_token, $date, $day)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
			
            $divisionId = Locations::where('zip', Session::get('zipcode'))->first();
            // if (careers_users_model::where('session_token', $s_token)->exists()) {
            if ($s_token) {
                $jobPositionsGet_interviewer = addinterviewer_jobpositions::where('job_position_main_id', $id)
                ->orderBy('id', 'DESC')
                ->limit(1)
                ->get();

                foreach ($jobPositionsGet_interviewer as $jobPositionsGetView) {
                    $InterviewToken = $jobPositionsGetView->add_interview_token;
                    $positionToken = $jobPositionsGetView->position_token;
                }
                
      

                $interviewerGet = interviewerModel::where([
                    'add_interview_token' => $InterviewToken,
                    'available_status' => '1'
                ])->get();
               
                if (interviewerModel::where([
                    'add_interview_token' => $InterviewToken,
                    'available_status' => '1'
                ])->exists()) {
                    foreach ($interviewerGet as $interviewerGetView) {
                        $employeeid[] = $interviewerGetView->employeeName;
                    }
                    $employeeGet = User::where('id', $employeeid)->get();

                    $jobStepGet = jobPositionsStepModel::where('jobPositionId', $id)->get();

                    $jobPositionsGet = jobPositionModel::where('jobPositionId', $id)->get();
                    //   dd($InterviewToken);

                    $interviewStepsGet = addinterviewer_jobpositions_steps::where('position_token', $positionToken)
               ->join('jobpositionstep', 'jobPositionStepId', 'jobPositionStep_name')
               ->where('checked_not', '1')
               ->get();
      
               if(!empty($interviewStepsGet)){
                $interviewStepsGet = addinterviewer_jobpositions_steps::where('jobPositionStep_name', '1')
                ->join('jobpositionstep', 'jobPositionStepId', 'jobPositionStep_name')
                ->where('checked_not', '1')
                ->limit(1)
                ->get();
               }
                    return view('careers_views/schedule-time')->with(
                [
           'id' => $id,
           'random_token' => $random_token,
           's_token' => $s_token,
           'date' => $date,
           'interviewerGet' => $interviewerGet,
           'employeeGet' => $employeeGet,
           'jobStepGet' => $jobStepGet,
           'jobPositionsGet' => $jobPositionsGet,
           'interviewStepsGet' => $interviewStepsGet,
           'day' => $day,
           
           ]
            );
                } else {
                    return abort(7769);
                }
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }


    public function timeSubmit(Request $request, $id, $random_token, $s_token, $date, $day)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            // if (careers_users_model::where('session_token', $s_token)->exists()) {
            if ($s_token) {
                $weekday = $request->input('day');
                $employee_id = $request->input('employee_id');
                $jobPositionId = $request->input('jobPositionId');
                $id_steps = $request->input('id_steps');
                $timevalue = $request->input('timevalue');
                $descp = $request->input('descp');

                
                $statusFetch = interviewStatusModel::where('jobPositionId', $id)
                ->orderBy('interviewstatusid', 'ASC')
                ->limit(1)
                ->get();

                foreach ($statusFetch as $statusFetchView) {
                    $statusId = $statusFetchView->interviewstatusid;
                }
                
                Session::put('day', $weekday);
                Session::put('employee_id', $employee_id);
                Session::put('job_position', $jobPositionId);
                Session::put('job_position_step', $id_steps);
                Session::put('interview_time_select', $timevalue);
                Session::put('note_for_interviewer', $descp);
                Session::put('interview_status_id', $statusId);
                

                // $data = careers_users_model::where('session_token', $s_token)->first();
                // $data->day = $weekday;
                // $data->employee_id = $employee_id;
                // $data->job_position = $jobPositionId;
                // $data->job_position_step = $id_steps;
                // $data->interview_time_select = $timevalue;
                // $data->note_for_interviewer = $descp;
                // $data->interview_status_id = $statusId;
                // $data->save();


                return redirect('careers/scheduled/'.$id.'/'. $random_token.'/'.$s_token.'/'.$date.'/'.$day.'/'.$weekday.'/'.$timevalue);
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function finalRedirect($id, $random_token, $s_token, $date, $day, $weekday, $timevalue)
    {
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            // if (careers_users_model::where('session_token', $s_token)->exists()) {
            if ($s_token) {
                $jobPositionsGet_interviewer = addinterviewer_jobpositions::where('job_position_main_id', $id)->get();

                foreach ($jobPositionsGet_interviewer as $jobPositionsGetView) {
                    $InterviewToken = $jobPositionsGetView->add_interview_token;
                    $positionToken = $jobPositionsGetView->position_token;
                }

                $interviewStepsGet = addinterviewer_jobpositions_steps::where('position_token', $positionToken)
    ->join('jobpositionstep', 'jobPositionStepId', 'jobPositionStep_name')
    ->where('checked_not', '1')
    ->get();

                $jobPositionsGet = jobPositionModel::where('jobPositionId', $id)->get();

                return view('careers_views/scheduled')->with(
                    [
            'id' => $id,
            'random_token' => $random_token,
            's_token' => $s_token,
            'day' => $day,
            'date' => $date,
            'jobPositionsGet' => $jobPositionsGet,
            'interviewStepsGet' => $interviewStepsGet,
            'timevalue' => $timevalue
        ]
                );
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }


    public function redirectToLandingPage($id, $random_token, $s_token)
    {
        if(Session::get('interview_date') == ''){
            return view('session-expired');
        }
        if (careerStepsPage::where('job_position_id', $id)->where('random_token', $random_token)->exists()) {
            // if (careers_users_model::where('session_token', $s_token)->exists()) {
				
            if ($s_token) {
                
				if(Session::get('session_token') == null){
					$applicant_data_submit = careers_users_model::where('session_token',$s_token)->first();
					
					$applicant_data_submit->interview_date = Session::get('interview_date');
					$applicant_data_submit->day = Session::get('day');
					$applicant_data_submit->employee_id = Session::get('employee_id');
					$applicant_data_submit->job_position = Session::get('job_position');
					$applicant_data_submit->job_position_step = Session::get('job_position_step');
					$applicant_data_submit->interview_time_select = Session::get('interview_time_select');
					$applicant_data_submit->note_for_interviewer = Session::get('note_for_interviewer');
					$applicant_data_submit->interview_status_id = Session::get('interview_status_id');
				  
					$applicant_data_submit->save();
				}
				else {
					$applicant_data_submit = new careers_users_model();
					$applicant_data_submit->fname = Session::get('fname');
					$applicant_data_submit->lname = Session::get('lname');
					$applicant_data_submit->email = Session::get('email');
					$applicant_data_submit->phone = Session::get('phone');
					$applicant_data_submit->zipcode = Session::get('zipcode');
					$applicant_data_submit->city = Session::get('city');
					$applicant_data_submit->state = Session::get('state');
					$applicant_data_submit->resume = Session::get('resume');

					$applicant_data_submit->time_on_steps_page = Session::get('time_on_steps_page');
					$applicant_data_submit->time_on_survey_page = Session::get('time_on_survey_page');
					$applicant_data_submit->survey_questions_correct = Session::get('survey_questions_correct');
					$applicant_data_submit->survey_questions_wrong = Session::get('survey_questions_wrong');

					$applicant_data_submit->session_token = Session::get('session_token');


					$applicant_data_submit->interview_date = Session::get('interview_date');
					$applicant_data_submit->day = Session::get('day');
					$applicant_data_submit->employee_id = Session::get('employee_id');
					$applicant_data_submit->job_position = Session::get('job_position');
					$applicant_data_submit->job_position_step = Session::get('job_position_step');
					$applicant_data_submit->interview_time_select = Session::get('interview_time_select');
					$applicant_data_submit->note_for_interviewer = Session::get('note_for_interviewer');
					$applicant_data_submit->interview_status_id = Session::get('interview_status_id');
					$applicant_data_submit->password = Hash::make('admin746#');
					if(Session::get('refer') != ''){
						$applicant_data_submit->refer_id = Session::get('refer');
					}
					$applicant_data_submit->save();
					
				}


                $createUser = careers_users_model::where('session_token', $s_token)->get();

                foreach ($createUser as $createUserView) {
                    $careersUserId = $createUserView->id;
                    $fname = $createUserView->fname;
                    $lname = $createUserView->lname;
                    $email = $createUserView->email;
                    $phone = $createUserView->phone;
                    $zipcode = $createUserView->zipcode;
                    $city = $createUserView->city;
                    $state = $createUserView->state;
                }
  

                // Mail Sending
                $emailData = careers_users_model::where('id', $careersUserId)->get();
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
                    '{login_password}'   =>  'admin746#',
                    '{job_position}'     =>  $jobPositionNameMain,
                    '{interview_time}'   =>  $interviewTimespan.' Minutes',
                    );



                $mailBodyData =  strtr($data_base[0]['body'], $vars);

                $iterviewerTestMail = new \stdClass();
                $iterviewerTestMail->emailSubject = $emailSubject;
                $iterviewerTestMail->mailBodyData = $mailBodyData;
         
                Mail::to($email)
                ->send(new CareersFirstMailSend($iterviewerTestMail));

                // token generate for user session
                $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $pin2 = mt_rand(1000000, 9999999)
                . mt_rand(1000000, 9999999)
                . time()
                . $characters2[rand(0, strlen($characters2) - 1)];
                $string2 = str_shuffle($pin2);
                // token generate for user session

                $data = careers_users_model::where('session_token', $s_token)->first();
                $data->session_token = $string2;
                //$data->password_text = 'admin746#';
                $data->save();


              
                session()->forget(['timer','session_token','steptimer']);
				Session::flash('scheduled', 'Successfully Scheduled!');
				
				$details = careers_users_model::where('id', $careersUserId)->get();
                return view('careers_views.detail')->with(['details'=> $details]);
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public function cancelInterview($id, $random_token, $s_token)
    {
        session()->forget([
                    'timer',
                    'session_token',
                    'steptimer'.
                    'fname',
                    'lname',
                    'email',
                    'phone',
                    'zipcode',
                    'city',
                    'state',
                    'resume',
                    'time_on_steps_page',
                    'time_on_survey_page',
                    'survey_questions_correct',
                    'survey_questions_wrong',
                    'interview_date',
                    'day',
                    'employee_id',
                    'job_position',
                    'job_position_step',
                    'interview_time_select',
                    'note_for_interviewer',
                    'interview_status_id'
                    ]);

        return redirect('careers');
    }

    public function deleteApplicant($id)
    {
        careers_users_model::where('id', $id)->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect::back();
    }
}
