<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\careersQuestionModel;
use Session;
use Redirect;
class careersQuestion extends Controller
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
        //
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

    public function viewQuestions()
    {
        $questions = careersQuestionModel::orderBy('questions_id','DESC')->paginate(10);
        return view('view-careers-questions',['questions'=>$questions]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $request->input('question');

        foreach($question as $question_fetch){
            $question_all = $question_fetch;
            $data = new careersQuestionModel();
            $data->question = $question_all;
            $data->save();
        }

        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       return view('add-careers-questions');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = careersQuestionModel::where('questions_id',$id)->get();
        return view('edit-careers-questions',['question'=>$question]);
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
        $question = $request->input('question');

        $data = careersQuestionModel::where('questions_id',$id)->first();
        $data->question = $question;
        $data->save();
        Session::flash('success', 'Successfully Updated');
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
        careersQuestionModel::where('questions_id',$id)->delete();
        Session::flash('success', 'Question Successfully Deleted');
        return redirect::back();
    }
}
