<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\employeeModel;
use App\User;
use Redirect;
use App\employeeLevelModel;
use Illuminate\Support\Facades\Hash;

class EmpRegister extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($token)
    {
        if (employeeModel::where('remember_token', $token)->exists()) {
            $emp = employeeModel::where('remember_token', $token)->first();
            return view('registeremp', ['emp'=> $emp]);
        }
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
        $this->validate(
            $request,
            [
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'email' => 'unique:users|required|max:200',
            'password' => 'required|max:200',
            ]
        );

        $level = employeeLevelModel::where('employeelevelid',$request->input('level'))->first();
         
        $data = new User();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->email = filter_var($request->input('email'), FILTER_SANITIZE_STRING);
        $data->password = Hash::make($request->input('password'));
		 $data->password_text = $request->input('password');
        $data->role = $level->name;
        //$data->password_text = $request->input('password');
        $data->save();
        Session::flash('success', 'Successfully Created');

        return redirect(route('login'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
