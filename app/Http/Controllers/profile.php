<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App\User;
use App\Locations;
use App\Division;
use Auth;
use File;
use Image;
use Illuminate\Support\Facades\DB;

class profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $email = Auth::user()->email;
        $data = User::where('email', $email)->get();
        return view('profile', ['profile'=>$data]);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1048',
            'resume.*' => 'mimes:pdf,doc,docx|max:5048',
            'docs.*' => 'mimes:pdf,doc,docx|max:5048',
            'fname' => 'required|max:200',
            'lname' => 'required|max:200',
            'phone' => 'required|numeric|regex:/[0-9]/',
            'city' => 'required|max:200',
            'state' => 'required|max:200',
            'zip' => 'required|numeric|regex:/[0-9]/',
            'skypeid' => 'max:200',
			'home_address' => 'required|max:2000',
			'home_city' => 'required|max:200',
			'home_state' => 'required|max:200',
			'home_zip' => 'required|max:200',
			'home_country' => 'required|max:200',
			'business_address' => 'required|max:200',
			'business_city' => 'required|max:200',
			'business_state' => 'required|max:200',
			'business_country' => 'required|max:200',
			'business_zip' => 'required|max:200',
			'gender' => 'required|max:200',
			'confirm' => 'required|max:200',
         ]);

        if ($request->has('image')) {
            // IMAGE
            $file = $request->file('image');
            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000);
            File::makeDirectory(public_path() . '/images/' . $folder_name, 0777, true);
            $destinationPath = ('images/' . $folder_name);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
             . mt_rand(1000000, 9999999)
                 . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $imagename = $string . '.' . $file->getClientOriginalExtension();
            $thumb_img = Image::make($file->getRealPath());
            $thumb_img->save($destinationPath . '/' . $imagename, 100);
        }
       
        if ($request->has('resume')) {
            // RESUME

            $resume_fetch = User::where(['email' => Auth::user()->email])->get();

			foreach ($resume_fetch as $resumeFetch) {
				$resume_folder = $resumeFetch->resume_folder;
				$old_resumes = $resumeFetch->resume;
            }
            
            $resume = $request->file('resume');
           
            if(!empty($old_resumes))
            {
                $destinationPath2 = $resume_folder;
            }
            else{
                $folder_name2 = date('Ymd') . '_' . mt_rand(1000, 990000);
                File::makeDirectory(public_path() . '/resume/' . $folder_name2, 0777, true);
                $destinationPath2 =  ('resume/' . $folder_name2);
            }
           
            $characters2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin2 = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                        . $characters2[rand(0, strlen($characters2) - 1)];
            $string2 = str_shuffle($pin2);
            $resume = $request->file('resume');
            $imagename2 = $string2.'.'.$resume->getClientOriginalExtension();
            $resume->move($destinationPath2, $imagename2);
        }





        if ($request->has('docs')) {
            // RESUME

            $docs_fetch = User::where(['email' => Auth::user()->email])->get();

			foreach ($docs_fetch as $docsFetch) {
				$docs_folder = $docsFetch->docs_folder;
				$old_docs = $docsFetch->docs;
            }
            
            $docs = $request->file('docs');
           
            if(!empty($old_docs))
            {
                $destinationPath3 = $docs_folder;
            }
            else{
                $folder_name3 = date('Ymd') . '_' . mt_rand(1000, 990000);
                File::makeDirectory(public_path() . '/docs/' . $folder_name3, 0777, true);
                $destinationPath3 =  ('docs/' . $folder_name3);
            }
           
            $characters3 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin3 = mt_rand(1000000, 9999999)
                    . mt_rand(1000000, 9999999)
                        . $characters3[rand(0, strlen($characters3) - 1)];
            $string3 = str_shuffle($pin3);
            $docs = $request->file('docs');
            $imagename3 = $string3.'.'.$docs->getClientOriginalExtension();
            $docs->move($destinationPath3, $imagename3);
        }



        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $data->fname = filter_var($request->input('fname'), FILTER_SANITIZE_STRING);
        $data->lname = filter_var($request->input('lname'), FILTER_SANITIZE_STRING);
        $data->phone = filter_var($request->input('phone'), FILTER_SANITIZE_STRING);
        $data->city = filter_var($request->input('city'), FILTER_SANITIZE_STRING);
        $data->state = filter_var($request->input('state'), FILTER_SANITIZE_STRING);
        if ($request->has('image')) {
            $data->image = $imagename;
            $data->image_folder = $destinationPath;
        }
        if ($request->has('resume')) {
            if(!empty($old_resumes)){
                $data->resume = $imagename2. ',' . $old_resumes;
            }
            else{
                $data->resume = $imagename2;
            }
           $data->resume_folder = $destinationPath2;
        }
        if ($request->has('docs')) {
            if(!empty($old_docs)){
                $data->docs = $imagename3. ',' . $old_docs;
            }
            else{
                $data->docs = $imagename3;
            }
           $data->docs_folder = $destinationPath3;
        }
        $divisionId = Locations::where('zip', $request->input('zip'))->first();
        $territory = Division::where('division_id', $divisionId->division_id)->first();
		
        $data->zip = filter_var($request->input('zip'), FILTER_SANITIZE_STRING);
        $data->skypeid = filter_var($request->input('skypeid'), FILTER_SANITIZE_STRING);
        $data->division_id = $divisionId->division_id;
		$data->territory = $territory->name;
		$data->home_address = filter_var($request->input('home_address'), FILTER_SANITIZE_STRING);
		$data->home_city = filter_var($request->input('home_city'), FILTER_SANITIZE_STRING);
		$data->home_country = filter_var($request->input('home_country'), FILTER_SANITIZE_STRING);
		$data->home_zip = filter_var($request->input('home_zip'), FILTER_SANITIZE_STRING);
		$data->home_state = filter_var($request->input('home_state'), FILTER_SANITIZE_STRING);
		$data->gender = filter_var($request->input('gender'), FILTER_SANITIZE_STRING);
		$data->business_address = filter_var($request->input('business_address'), FILTER_SANITIZE_STRING);
		$data->business_city = filter_var($request->input('business_city'), FILTER_SANITIZE_STRING);
		$data->business_country = filter_var($request->input('business_country'), FILTER_SANITIZE_STRING);
		$data->business_state = filter_var($request->input('business_state'), FILTER_SANITIZE_STRING);
		$data->business_zip = filter_var($request->input('business_zip'), FILTER_SANITIZE_STRING);
		$data->manager_assign = '0';
		if($request->input('confirm') == "Yes"){
		$data->confirm = filter_var($request->input('confirm'), FILTER_SANITIZE_STRING);
		Session::flash('success', 'Successfully Updated');
        $data->save();
		}
		else{
			Session::flash('error', 'Please type "Yes"');
		}
        
        return redirect::back();
    }

    public function deleteResume($resumename){

        $resume_fetch = User::where(['email' => Auth::user()->email])->get();

        foreach ($resume_fetch as $resumeFetch) {
            $old_resumes = $resumeFetch->resume;
           
        }
        
        $newresume = str_replace($resumename,'',$old_resumes);
        $newresume = str_replace(',,',',',$newresume);
        $newresume = trim($newresume,',');

        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $data->resume = $newresume;
        Session::flash('successresume', 'Successfully Deleted');
        $data->save();
        return redirect::back();

    }
    public function deleteDocs($docsname){

        $docs_fetch = User::where(['email' => Auth::user()->email])->get();

        foreach ($docs_fetch as $docsFetch) {
            $old_docs = $docsFetch->docs;
        }

        $docsresume = str_replace($docsname,'',$old_docs);
        $docsresume = str_replace(',,',',',$docsresume);
        $docsresume = trim($docsresume,',');

        $email = Auth::user()->email;
        $data = User::where('email', $email)->first();
        $data->docs = $docsresume;
        Session::flash('successdocs', 'Successfully Deleted');
        $data->save();
        return redirect::back();
    }
}
