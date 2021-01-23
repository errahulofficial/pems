<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cookie;
use Redirect;
use Auth;
use Illuminate\Support\Facades\DB;
use App\careers_users_model;
use App\jobPositionModel;
use App\Portal;
use App\blackListModel;
class ApplicantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = careers_users_model::orderBy('id','DESC')->paginate(15);
		$job = jobPositionModel::pluck('name','jobPositionId');
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
		
		$refer = Portal::join('portal_names','portal_names.id','=','portals.portal')->select(
		'shortcode',
		'portal_name',
		'portal'
		)->get();
        return view('applicants',['applicant'=>$data, 'notes' => $notes , 'scores'=> $score,'refer'=>$refer,'job'=>$job]);
    }

    public function updateblacklist($id)
    {
        $data = careers_users_model::where('id',$id)->first();
        $data->blacklisted = true;
        Session::flash('success', 'Successfully Updated');
        $data->save();
        $bdata = new blackListModel();
        $bdata->blacklistid = $data->id;
        $bdata->fname = $data->fname;
        $bdata->lname = $data->lname;
        $bdata->email = $data->email;
        $bdata->phone = $data->phone;
        $bdata->city = $data->city;
        $bdata->state = $data->state;
        $bdata->zip = $data->zipcode;
        $bdata->resume = $data->resume;
        $bdata->save();
        return redirect::back();
    }
	
	public function submitNotes(Request $request)
    {
       $this->validate($request, [
            'title' => 'required|max:200',
            'description' => 'required|max:200',
            
         ]);
		 DB::table('interviewer_notes')->insert([
				'title' => $request->input('title'),
				'description' => $request->input('description'),
				'applicant_id' => $request->input('careers_user'),
				'interviewer_id' => Auth::user()->id,
				'created_at' => new \DateTime(),
				]);
		 
		 Session::flash('success', 'Successfully Updated');
		 return redirect::back();
    }
	
	public function scoreSave(Request $request)
    {
		$applicant = $request->input('careers_user');
		
		$score = $request->input($applicant.'que1').','. $request->input($applicant.'que2').','. $request->input($applicant.'que3').','. $request->input($applicant.'que4').','. $request->input($applicant.'que5').','. $request->input($applicant.'que6').','. $request->input($applicant.'que7').','. $request->input($applicant.'que8');
		
		if(DB::table('score')->where('applicant_id',$applicant)->exists()){
		 DB::table('score')->where('applicant_id',$applicant)->update([
				'score' => $score,
				]);
		}
		else {
			DB::table('score')->insert([
				'score' => $score,
				'applicant_id' => $applicant,
				'scored_by' => Auth::user()->id,
				'created_at' => new \DateTime()
				]);
		}
		 Session::flash('success', 'Successfully Updated');
		 return redirect::back();
    }
	
	
	public function scoreupdate(Request $request)
    {
		$applicant = Auth::guard('applicant')->user()->id;
		
		if(DB::table('score')->where('applicant_id',$applicant)->exists()){
		 DB::table('score')->where('applicant_id',$applicant)->update([
				'int_ques1' => $request->que1,
				'int_ques2' => $request->que2,
				'int_ques3' => $request->que3,
				'int_ques4' => $request->que4,
				'int_ques5' => $request->que5,
				'int_ques6' => $request->que6,
				'int_ques7' => $request->que7,
				'int_ques8' => $request->que8,
				'int_ques9' => $request->que9,
				'int_ques10' => $request->que10,
				'int_ques11' => $request->que11,
				'int_ques12' => $request->que12,
				'int_ques13' => $request->que13,
				'int_ques14' => $request->que14,
				'int_ques15' => $request->que15,
				'int_ques16' => $request->que16,
				'int_ques17' => $request->que17,
				'int_ques18' => $request->que18,
				'int_ques19' => $request->que19,
				'int_ques20' => $request->que20,
				'int_ques21' => $request->que21,
				'int_ques22' => $request->que22,
				'int_ques23' => $request->que23,
				'int_ques24' => $request->que24,
				'int_ques25' => $request->que25,
				
				]);
		}
		
		 Session::flash('success', 'Successfully Updated');
		
    }
  
    public function delete($id)
    {
        careers_users_model::where('employeedivisionid',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
