<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\email_skype_model;
use App\User;
use Auth;
use Session;
use Redirect;

class email_skype extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $emsky = User::where('id', Auth::user()->id)->get();
		$d = email_skype_model::where('id',Auth::user()->id)->first();
		if(!empty($d)){
		foreach ($d as $s){
			$ss = str_replace('</p>','',str_replace('<p>','',$d->descp));
		}
        return view("email-skype-info",["emsk"=>$emsky,'da'=> $ss]);
		}
		else{
			return view("email-skype-info",["emsk"=>$emsky,'da'=> '']);
		}
    }
    
    

    public function update(Request $request)
    {
        $this->validate(
            $request,
            [
            'descp' => 'required|max:2000'
            ]
        );
        
        $descp = $request->input('descp');
		
        $data = email_skype_model::where('id',Auth::user()->id)->first();
		
		if(!is_null($data)){
			$data->descp = $descp;
			Session::flash('success', 'Successfully Created');
		}
		else{
			$data = new email_skype_model();
			$data->id = Auth::user()->id;
			$data->descp = $descp;
			Session::flash('success', 'Successfully Created');
		}
        $data->save();
        return redirect::back();
    }
}
