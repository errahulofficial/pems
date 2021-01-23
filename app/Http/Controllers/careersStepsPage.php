<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\careerStepsPage;
use App\careersQuestionModel;
use Session;
use Redirect;
use App\jobPositionModel;

class careersStepsPage extends Controller
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
        $steps0 = careerStepsPage::where('step_id', '1')->get();
        $steps1 = careerStepsPage::where('step_id', '2')->get();
        $steps2 = careerStepsPage::where('step_id', '3')->get();
        $steps3 = careerStepsPage::where('step_id', '4')->get();
        $steps4 = careerStepsPage::where('step_id', '5')->get();
        $questions = careersQuestionModel::orderBy('questions_id', 'DESC')->paginate(10);


        return view('steps-page', [
            'steps0'=>$steps0,
            'steps1'=>$steps1,
            'steps2'=>$steps2,
            'steps3'=>$steps3,
            'steps4'=>$steps4,
            'questions'=>$questions
            ]);
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

    public function addSteps()
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')
        ->join('add_interviewer_jobpositions', 'job_position_main_id','=','jobPositionId')
        ->get();

        
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }
        return view('add-steps-page', compact('jobPositionsArray'));
    }

    
    public function viewStepsPage()
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')
        ->join('careers_steps_page','jobPositionId','job_position_id')
        ->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }
        return view('view-steps-page', ['jobPositions' => $jobPositions,'showdata' => '0' ], compact('jobPositionsArray'));
    }

    public function viewStepsPageByPosition($jobPositionId)
    {
        $jobPositions = jobPositionModel::orderBy('name', 'ASC')->get();
        $jobPositionsArray = [];
        foreach ($jobPositions as $jobPositionsView) {
            $jobPositionsArray[$jobPositionsView->jobPositionId] = $jobPositionsView->name;
        }


        $jobPositionsName = careerStepsPage::join('jobposition', 'jobPositionId', '=', 'job_position_id')
        ->where('jobPositionId', $jobPositionId)
        ->get();

        $datafetch = careerStepsPage::where('job_position_id', $jobPositionId)->get();
        foreach ($datafetch as $step5View) {
            $step5 = $step5View->step5;
        }
        $datafetch = careerStepsPage::where('job_position_id', $jobPositionId)->get();

        if(!empty($step5)){

            $question = careersQuestionModel::where('step5_token', $step5)->get();
            return view(
                'view-steps-page',
                [
                'jobPositions' => $jobPositions,
                'datafetch' => $datafetch,
                'question' => $question,
                'jobPositionsName' => $jobPositionsName,
                'showdata' => '1',
            ],
                compact('jobPositionsArray')
           );
        }

        else{
            return view(
                'view-steps-page',
                [
                'jobPositions' => $jobPositions,
                'datafetch' => $datafetch,
                'jobPositionsName' => $jobPositionsName,
                'showdata' => '1',
            ],
                compact('jobPositionsArray')
           );
        }
        
        
        
    }

    public function deactivate($id)
    {
   
        $deactivate = careerStepsPage::where('step_id', $id)->first();
        $deactivate->available_status = '0';
        $deactivate->save();
        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }

    public function activate($id)
    {
       
        $activate = careerStepsPage::where('step_id', $id)->first();
        $activate->available_status = '1';
        $activate->save();
        Session::flash('success', 'Successfully Saved');
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
        //
    }

  
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    public function storeAll(Request $request)
    {
        $this->validate($request, [
            'job_position_id' => 'required|max:200',
            'introduction' => 'required|max:2000',
            'question.*' => 'required|max:500',
        ]);

        $stepname = [];
        $stepcont = [];
        $steptype = [];
        
        $job_position_id = $request->input('job_position_id');

        if(careerStepsPage::where('job_position_id', $job_position_id)->exists()){
            $jobPositionsName = careerStepsPage::join('jobposition', 'jobPositionId', '=', 'job_position_id')
            ->where('jobPositionId', $job_position_id)
            ->get();

            foreach ($jobPositionsName as $jobPositionsView){
                $jobPositionName = $jobPositionsView->name;
            }
             Session::flash('exists', 'Data already exists of '.$jobPositionName);
        }
        else{
           for($i = 1; $i <= 10; $i++){
                if($request->input('stepname'.$i) != '' && $request->input('steptype'.$i) == 'video'){
                    $stepname[$i] = $request->input('stepname'.$i);
                    $stepcont[$i] = $request->input('step'.$i);
                    if (strpos($stepcont[$i], 'youtu') !== false) {
                        $stepcont[$i] = str_replace('https://www.youtube.com/watch?v=', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('https://', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('www.', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('youtube.com/', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('watch?v=', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('http://', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('youtu.be', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('/', '', $stepcont[$i]);
                        $steptype[$i] = 'youtube';
                    } elseif (strpos($stepcont[$i], 'vimeo') !== false) {
                        $stepcont[$i] = str_replace('https://vimeo.com/', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('https://', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('www.', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('vimeo.com/', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('http://', '', $stepcont[$i]);
                        $stepcont[$i] = str_replace('/', '', $stepcont[$i]);
                        $steptype[$i] = 'vimeo';
                    } else {
                        $stepcont[$i] = '';
                        $steptype[$i] = '';
                    }
                }
                elseif($request->input('stepname'.$i) != '' && $request->input('steptype'.$i) == 'text'){
                    $steptype[$i] = $request->input('steptype'.$i);
                    $stepname[$i] = $request->input('stepname'.$i);
                    $stepcont[$i] = $request->input('step'.$i);
                }
            }
            
            $random_token = time().mt_rand(1000000,9999999).time();
    
            $data = new careerStepsPage();
            $data->introduction = $request->input('introduction');
            $data->job_position_id = $job_position_id;
            if(array_key_exists('1', $stepname)){
                $data->step1name =  $stepname['1'];
                $data->step1Type = $steptype['1'];
                $data->step1 = $stepcont['1'];
            }
            if(array_key_exists('2', $stepname)){
                $data->step2name = $stepname['2'];
                $data->step2type = $steptype['2'];
                $data->step2 = $stepcont['2'];
            }
            if(array_key_exists('3', $stepname)){
                $data->step3name = $stepname['3'];
                $data->step3Type = $steptype['3'];
                $data->step3 = $stepcont['3'];
            }
            if(array_key_exists('4', $stepname)){
                $data->step4name = $stepname['4'];
                $data->step4type = $steptype['4'];
                $data->step4 = $stepcont['4'];
            }
            if(array_key_exists('5', $stepname)){
                $data->stepname5 = $stepname['5'];
                $data->steptype5 = $steptype['5'];
                $data->stepcont5 = $stepcont['5'];
            }
            if(array_key_exists('6', $stepname)){
                $data->stepname6 = $stepname['6'];
                $data->steptype6 = $steptype['6'];
                $data->stepcont6 = $stepcont['6'];
            }
            if(array_key_exists('7', $stepname)){
                $data->stepname7 = $stepname['7'];
                $data->steptype7 = $steptype['7'];
                $data->stepcont7 = $stepcont['7'];
            }
            if(array_key_exists('8', $stepname)){
                $data->stepname8 = $stepname['8'];
                $data->steptype8 = $steptype['8'];
                $data->stepcont8 = $stepcont['8'];
            }
            if(array_key_exists('9', $stepname)){
                $data->stepname9 = $stepname['9'];
                $data->steptype9 = $steptype['9'];
                $data->stepcont9 = $stepcont['9'];
            }
            if(array_key_exists('10', $stepname)){
                $data->stepname10 = $stepname['10'];
                $data->steptype10 = $steptype['10'];
                $data->stepcont10 = $stepcont['10'];           
            }
            $data->step5 = $request->input('step5');
            $data->step5_header = $request->input('header_text');
            $data->step5_footer = $request->input('footer_text');
            $data->random_token = $random_token;
            $data->save();
    
            $question = $request->input('question');
    
            foreach ($question as $question_fetch) {
                $question_all = $question_fetch;
                $data = new careersQuestionModel();
                $data->question = $question_all;
                $data->step5_token = $request->input('step5');
                $data->save();
            }
           Session::flash('success', 'Successfully Saved');
        }
       return redirect::back();
    }



    public function updatestepsall(Request $request,$step_id)
    {
        $this->validate($request, [
            'job_position_id' => 'required|max:200',
            'introduction' => 'required|max:2000',
        ]);
        $job_position_id = $request->input('job_position_id');

        $stepname = [];
        $stepcont = [];
        $steptype = [];
        for($i = 1; $i <= 10; $i++){
            if($request->input('stepname'.$i) != '' && $request->input('steptype'.$i) == 'video'){
                $stepname[$i] = $request->input('stepname'.$i);
                $stepcont[$i] = $request->input('step'.$i);
                if (strpos($stepcont[$i], 'youtu') !== false) {
                    $stepcont[$i] = str_replace('https://www.youtube.com/watch?v=', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('https://', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('www.', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('youtube.com/', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('watch?v=', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('http://', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('youtu.be', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('/', '', $stepcont[$i]);
                    $steptype[$i] = 'youtube';
                } elseif (strpos($stepcont[$i], 'vimeo') !== false) {
                    $stepcont[$i] = str_replace('https://vimeo.com/', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('https://', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('www.', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('vimeo.com/', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('http://', '', $stepcont[$i]);
                    $stepcont[$i] = str_replace('/', '', $stepcont[$i]);
                    $steptype[$i] = 'vimeo';
                } else {
                    $stepcont[$i] = '';
                    $steptype[$i] = '';
                }
            }
            elseif($request->input('stepname'.$i) != '' && $request->input('steptype'.$i) == 'text'){
                $steptype[$i] = $request->input('steptype'.$i);
                $stepname[$i] = $request->input('stepname'.$i);
                $stepcont[$i] = $request->input('step'.$i);
            }
        }
        
        
        $data = careerStepsPage::where('step_id', $step_id)->first();
        $data->introduction = $request->input('introduction');
        $data->job_position_id = $job_position_id;

        if(array_key_exists('1', $stepname)){
                $data->step1name =  $stepname['1'];
                $data->step1Type = $steptype['1'];
                $data->step1 = $stepcont['1'];
            }
            if(array_key_exists('2', $stepname)){
                $data->step2name = $stepname['2'];
                $data->step2type = $steptype['2'];
                $data->step2 = $stepcont['2'];
            }
            if(array_key_exists('3', $stepname)){
                $data->step3name = $stepname['3'];
                $data->step3Type = $steptype['3'];
                $data->step3 = $stepcont['3'];
            }
            if(array_key_exists('4', $stepname)){
                $data->step4name = $stepname['4'];
                $data->step4type = $steptype['4'];
                $data->step4 = $stepcont['4'];
            }
            if(array_key_exists('5', $stepname)){
                $data->stepname5 = $stepname['5'];
                $data->steptype5 = $steptype['5'];
                $data->stepcont5 = $stepcont['5'];
            }
            if(array_key_exists('6', $stepname)){
                $data->stepname6 = $stepname['6'];
                $data->steptype6 = $steptype['6'];
                $data->stepcont6 = $stepcont['6'];
            }
            if(array_key_exists('7', $stepname)){
                $data->stepname7 = $stepname['7'];
                $data->steptype7 = $steptype['7'];
                $data->stepcont7 = $stepcont['7'];
            }
            if(array_key_exists('8', $stepname)){
                $data->stepname8 = $stepname['8'];
                $data->steptype8 = $steptype['8'];
                $data->stepcont8 = $stepcont['8'];
            }
            if(array_key_exists('9', $stepname)){
                $data->stepname9 = $stepname['9'];
                $data->steptype9 = $steptype['9'];
                $data->stepcont9 = $stepcont['9'];
            }
            if(array_key_exists('10', $stepname)){
                $data->stepname10 = $stepname['10'];
                $data->steptype10 = $steptype['10'];
                $data->stepcont10 = $stepcont['10'];           
            }
            $data->step5_header = $request->input('header_text');
            $data->step5_footer = $request->input('footer_text');
            $data->save();

        if(count($request->input('question')) < 0 ){
            $question = $request->input('question');

            foreach ($question as $question_fetch) {
                $question_all = $question_fetch;
                $data = new careersQuestionModel();
                $data->question = $question_all;
                $data->step5_token = $request->input('step5');
                $data->save();
            }
        }
        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }


    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($step_id,$token)
    {
        careerStepsPage::where('step_id', $step_id)->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect::back();
    }
}
