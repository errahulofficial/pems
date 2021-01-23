<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\SMBlog;
use Auth;
use App\blog_model;
class HomeController extends Controller {
/**
 * Create a new controller instance.
 *
 * @return void
 */ 
	public function __construct() {
	 $this->middleware('auth'); 
	}
/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
	public function index() {
	
		$data = User::where('id', Auth::user()->id)->first();
		if($data->division_id == "" || $data->home_address == "" || $data->home_city == "" || $data->home_country == "" || $data->home_zip == "" || $data->business_address == "" || $data->business_city == "" || $data->business_country == "" || $data->home_state == "" || $data->business_zip == "" || $data->business_state == ""){
			return redirect('profile');
		}
		else {
			$blog = blog_model::orderBy('id','DESC')->paginate(2);
			$smblog = SMBlog::orderBy('id','DESC')->paginate(2);
			return view('index', compact('blog','smblog'));
		}
	}
}