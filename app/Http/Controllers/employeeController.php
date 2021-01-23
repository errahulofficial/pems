<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use Auth;
use App\User;
use DB;
use App\employeeModel;
use App\employeeLevelModel;
use App\Division;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Mail\CareersFirstMailSend;
use Illuminate\Support\Facades\Mail;
use App\interviewStatusModel;

class employeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = employeeModel::join('divisions', 'division', '=', 'division_id')
        ->join('employeelevel', 'level', '=', 'employeelevelid')
        ->select(
            'employeeid',
            'fname',
            'lname',
            'employee.email',
			'employee.created_at',
            'level',
            'division',
            'divisions.name as employeedivisionName',
            'employeelevel.name as employeelevelname'
            )
        ->orderBy('employeeid', 'DESC')
        ->paginate(10);
        $employeelevel = employeeLevelModel::orderBy('employeelevelid', 'DESC')->get();
        $selectEmployeelevel = [];
        foreach ($employeelevel as $employeelevelShow) {
            $selectEmployeelevel[$employeelevelShow->employeelevelid] = $employeelevelShow->name;
        }
        $employeedivision = Division::orderBy('division_id', 'DESC')->get();
        $selectEmployeedivision = [];
        foreach ($employeedivision as $employeedivisionShow) {
            $selectEmployeedivision[$employeedivisionShow->division_id] = $employeedivisionShow->name;
        }
        return view('employee', ['employee'=>$data], compact('selectEmployeelevel', 'selectEmployeedivision'));
    }
	
	public function listemp(){
		$empcount = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->get();
		$listemp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone','!=', '')->orWhere('city','!=', '')->orWhere('state','!=', '')->orWhere('zip','!=', '')->orWhere('gender','!=', '')->orWhere('home_address','!=', '');})->paginate(20);
		
		
		$notcomp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone', '')->orWhere('city', '')->orWhere('state', '')->orWhere('zip', '')->orWhere('gender', '')->orWhere('home_address', '');})->get();
		return view('list-emp', ['employee'=>$listemp],compact('empcount','notcomp'));
	} 
	public function notcomp(){
		$empcount = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->get();
		$listemp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone','')->orWhere('city','')->orWhere('state', '')->orWhere('zip','')->orWhere('gender', '')->orWhere('home_address', '');})->paginate(20);
		
		$notcomp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone', '')->orWhere('city','')->orWhere('state', '')->orWhere('zip','')->orWhere('gender','')->orWhere('home_address', '');})->get();
		return view('list-emp', ['employee'=>$listemp],compact('empcount','notcomp'));
	} 
	public function notreg(){
		//
	} 
	
	public function withoutemail(){
		$empcount = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->get();
		$listemp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where('email','')->paginate(10);
		$notcomp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone','')->orWhere('city','')->orWhere('state','')->orWhere('zip','')->orWhere('gender','')->orWhere('home_address', '');})->get();
		return view('list-emp', ['employee'=>$listemp],compact('empcount','notcomp'));
	} 
	
	public function withoutskype(){
		$empcount = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->get();
		$listemp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where('skypeid','')->paginate(10);
		$notcomp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone','')->orWhere('city', '')->orWhere('state','')->orWhere('zip','')->orWhere('gender','')->orWhere('home_address', '');})->get();
		return view('list-emp', ['employee'=>$listemp],compact('empcount','notcomp'));
	} 
	
	public function withoutcard(){
		$empcount = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->get();
		$listemp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where('resume','')->paginate(10);
		$notcomp = User::where('id', '!=', Auth::user()->id)->where('role', '!=','superadmin')->where(function($query) {
        $query->where('phone', '')->orWhere('city', '')->orWhere('state', '')->orWhere('zip','')->orWhere('gender','')->orWhere('home_address','');})->get();
		return view('list-emp', ['employee'=>$listemp],compact('empcount','notcomp'));
	} 
	
	
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'email' => 'unique:employee|required|max:200',
            'level' => 'required|max:200',
            'division' => 'required|max:200',
            ]
        );
        //$divisionId = DB::table('locations')->select('division_id')->where('zip', $zipcode)->first();

        $data = new employeeModel();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $data->level = filter_var($request->input('level'), FILTER_SANITIZE_STRING);
        $data->division = filter_var($request->input('division'), FILTER_SANITIZE_STRING);
        $data->remember_token = filter_var($request->input('_token'), FILTER_SANITIZE_STRING);
        $data->apptcond = file_get_contents(resource_path('views/ApptCond.txt'));
        //$data->division_id = $divisionId->division_id;
            $emailSubject = "Register to Appointment letter";
            $EmailFromAddress = "gmail@gmail.com";
            $EmailFromAddressPass = "fdgkjfdgkl";
            $EmailFromName = "PEMS Demo";
            $HTMLMessage = file_get_contents(resource_path('views/registerEmail.txt'));
       
		$level = employeelevelModel::where('employeelevelid', $data->level)->first();
        $data_base[0]['body'] = $HTMLMessage;
                $vars = array(
                    '{first_name}'       =>   $data->fname,
                    '{last_name}'        =>  $data->lname,
                    '{from_name}'        =>  $EmailFromName,
                    '{login_link}'       =>  url('register/'.$data->remember_token),
                    '{job_position}'     =>  $level->name,
                    );
					
                $mailBodyData =  strtr($data_base[0]['body'], $vars);
				
        $iterviewerTestMail = new \stdClass();
                $iterviewerTestMail->emailSubject = $emailSubject;
                $iterviewerTestMail->mailBodyData = $mailBodyData;
        Session::flash('success', 'Successfully Created');
        Mail::to($data->email)
        ->send(new CareersFirstMailSend($iterviewerTestMail));
        $data->save();
        return redirect::back();
    }
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'fname' => 'required|max:200',
                'lname' => 'required|max:200',
                'email' => 'required|max:200',
                'level' => 'required|max:200',
                'division' => 'required|max:200',
         ]
       );
        $data = employeeModel::where('employeeid', $id)->first();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $data->level = filter_var($request->input('level'), FILTER_SANITIZE_STRING);
        $data->division = filter_var($request->input('division'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id)
    {
        $data = employeeModel::where('employeeid', $id)
        ->join('employeedivision', 'division', '=', 'employeedivisionid')
        ->join('employeelevel', 'level', '=', 'employeelevelid')
        ->select(
            'employeeid',
            'fname',
            'lname',
            'email',
            'level',
            'division',
            'employeedivision.name as employeedivisionName',
            'employeelevel.name as employeelevelname'
            )
        ->orderBy('employeeid', 'DESC')
        ->get();
        $employeelevel = employeeLevelModel::orderBy('employeelevelid', 'DESC')->get();
        $selectEmployeelevel = [];
        foreach ($employeelevel as $employeelevelShow) {
            $selectEmployeelevel[$employeelevelShow->employeelevelid] = $employeelevelShow->name;
        }
        $employeedivision = employeeDivisionModel::orderBy('employeedivisionid', 'DESC')->get();
        $selectEmployeedivision = [];
        foreach ($employeedivision as $employeedivisionShow) {
            $selectEmployeedivision[$employeedivisionShow->employeedivisionid] = $employeedivisionShow->name;
        }
        return view('employee-edit', ['employee'=>$data], compact('selectEmployeelevel', 'selectEmployeedivision'));
    }
	
    public function delete($id)
    {
        employeeModel::where('employeeid', $id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
	public function del($id)
    {
        User::where('id', $id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
