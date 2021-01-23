<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\employeeDivisionModel;

class employeeDivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $data = employeeDivisionModel::orderBy('employeedivisionid','DESC')->paginate(10);
        return view('employee-division',['employeedivision'=>$data]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:200',
            
        ]);
        $data = new employeeDivisionModel();
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
        $data = employeeDivisionModel::where('employeedivisionid',$id)->first();
        $data->name = filter_var($request->input('name'), FILTER_SANITIZE_STRING);
        Session::flash('success', 'Successfully Updated');
        $data->save();
        return redirect::back();
    }
    public function edit($id)
    {
        $data = employeeDivisionModel::where('employeedivisionid',$id)->get();
        return view('employee-division-edit',['employeedivision'=>$data]);
    }
    public function delete($id)
    {
        employeeDivisionModel::where('employeedivisionid',$id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
