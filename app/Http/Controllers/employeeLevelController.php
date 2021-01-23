<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\employeeLevelModel;

class employeeLevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = employeeLevelModel::orderBy('employeelevelid','DESC')->paginate(10);
        return view('employee-level',['employeelevel'=>$data]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            
        ]);
        $data = new employeeLevelModel();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            
        ]);
        $data = employeeLevelModel::where('employeelevelid',$id)->first();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id)
    {
        $data = employeeLevelModel::where('employeelevelid',$id)->get();
        return view('employee-level-edit',['employeelevel'=>$data]);
    }
    public function delete($id)
    {
        employeeLevelModel::where('employeelevelid',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
    
}
