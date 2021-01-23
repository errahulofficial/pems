<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use DB;
use App\careers_users_model;
use App\blackListModel;

class blackListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = blackListModel::orderBy('blacklistid','DESC')->paginate(10);
        return view('blacklist',['blacklist'=>$data]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'email' => 'required|unique:blacklist|max:200',
            'phone' => 'required|numeric|unique:blacklist|regex:/[0-9]/',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
            'zip' => 'required|numeric|regex:/[0-9]/',
            'note' => 'required|max:1000',
        ]);

        $email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $phone = filter_var($request->input('phone'), FILTER_SANITIZE_STRING);
        $userDataGet =  careers_users_model::where('email',$email)->get();
        $userDataGet2 =  careers_users_model::where('phone',$phone)->get();
		
        if(!empty($userDataGet)){
            foreach($userDataGet as $userDataGetChak){
                $resume = $userDataGetChak->resume;
               
            }
        }
        if(!empty($userDataGet2)){
            foreach($userDataGet2 as $userDataGetChak2){
                $resume = $userDataGetChak2->resume;                  
            }
        }

        $data = new blackListModel();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $data->phone = filter_var($request->input('phone'), FILTER_SANITIZE_STRING);
        $data->city = filter_var($request->input('city'), FILTER_SANITIZE_STRING);
        $data->state = filter_var($request->input('state'), FILTER_SANITIZE_STRING);
        $data->zip = filter_var($request->input('zip'), FILTER_SANITIZE_STRING);
        $data->note = filter_var($request->input('note'), FILTER_SANITIZE_STRING);
        if (!empty($resume)) {
           $data->resume = $resume;
           $data->resume_folder = 'careers_data' ;
                   }
        else {
            $data->resume = '';
            $data->resume_folder = '' ;
          }
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'email' => 'required|max:200',
            'phone' => 'required|numeric|regex:/[0-9]/',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
            'zip' => 'required|numeric|regex:/[0-9]/',
            'note' => 'required|max:1000',
        ]);
        $data = blackListModel::where('blacklistid',$id)->first();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $data->phone = filter_var($request->input('phone'), FILTER_SANITIZE_STRING);
        $data->city = filter_var($request->input('city'), FILTER_SANITIZE_STRING);
        $data->state = filter_var($request->input('state'), FILTER_SANITIZE_STRING);
        $data->zip = filter_var($request->input('zip'), FILTER_SANITIZE_STRING);
        $data->note = filter_var($request->input('note'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id)
    {
        $data = blackListModel::where('blacklistid',$id)->get();
        return view('blacklist-edit',['blacklist'=>$data]);
    }
    public function delete($id)
    {
        blackListModel::where('blacklistid',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
