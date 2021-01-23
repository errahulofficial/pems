<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\SalesManagerModel;
use App\counties;
use App\Division;
use Auth;
use App\User;
use App\careers_users_model;
use Redirect;
use App\employeeLevelModel;
use Illuminate\Support\Facades\Hash;

class SalesManagerController extends Controller
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
    public function myteam()
    {
        $data = SalesManagerModel::where('assigned_manager_id', Auth::user()->id)->orderBy('teamid','DESC')->paginate(10);
        return view('sales-myteam',['salesteam'=>$data]);
    }
	
	 public function myterritory()
    {
        $counties = counties::where('division_id', Auth::user()->division_id)->paginate(200);
		$territory = Division::where('division_id', Auth::user()->division_id)->first();
        return view('myterritory',['counties'=> $counties, 'territory' => $territory]);
    }
	
	public function index()
    {
        $sm = User::join('divisions', 'users.division_id', '=', 'divisions.division_id')->get();
		$territory = Division::get();

        return view('sales-team',compact('sm','territory'));
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
            'manager_assign' => 'required',
            ]
        );

        $salesp = User::where('id',$request->input('salesperson'))->first();
         $salper = SalesManagerModel::where('sales_person_id',$request->input('salesperson'))->first();
		 if(!$salper){
        $data = new SalesManagerModel();
		 }
		 else{
			 $data = SalesManagerModel::where('sales_person_id',$request->input('salesperson'))->first();
		 }
        $data->sales_person_id = filter_var($request->input('salesperson'), FILTER_SANITIZE_STRING);
        $data->sales_person_name = $salesp->fname .' '. $salesp->lname;
        $data->sales_person_email = $salesp->email;
        $data->sales_person_skype = $salesp->skypeid;
		$data->sales_person_phone = $salesp->phone;
        $data->assigned_manager_id = filter_var($request->input('manager_assign'), FILTER_SANITIZE_STRING);
		 
        $data->save();
		
		$salesp->manager_assign = filter_var($request->input('manager_assign'), FILTER_SANITIZE_STRING);
		$salesp->save();
		
        Session::flash('success', 'Successfully Created');

        return redirect::back();
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
