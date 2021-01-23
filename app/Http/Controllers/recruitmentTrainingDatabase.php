<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recruitment_training_category_model;
use App\recruitment_training_database_model;
use Session;
use Redirect;
use File;
use Image;

class recruitmentTrainingDatabase extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $category = recruitment_training_database_model::join(
            'recruitment_training_category',
            'recruitment_training_category.recruitment_training_category_id',
            'recruitment_training.recruitment_training_category_id'
        )
        ->orderBy('recruitment_training.recruitment_training_category_id', 'DESC')->paginate(10);

        $recruitment_training_category = recruitment_training_category_model::orderBy('recruitment_training_category_id', 'DESC')->get();
        $selectrecruitment_training_category = [];
        foreach ($recruitment_training_category as $recruitment_training_category_show) {
            $selectrecruitment_training_category[$recruitment_training_category_show->recruitment_training_category_id] = $recruitment_training_category_show->category_name;
        }
        return view('add-recruitment-training', ['category'=>$category], compact('selectrecruitment_training_category'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'recruitment_training_category_id' => 'required|max:200',
            'title' => 'required|max:200',
            'duration' => 'required|max:200',
            'video' => 'required|max:200',
            'documents.*' => 'mimes:pdf,doc,docx,jpg,png,jpeg,zip|max:5048'
        ]);
       
        $recruitment_training_category_id = $request->input('recruitment_training_category_id');
        $title = $request->input('title');
        $duration = $request->input('duration');
        $video = $request->input('video');

        if ($request->file('documents')) {
            $file = $request->file('documents');
            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000).time();
            File::makeDirectory(public_path() . '/recruitment_training/' . $folder_name, 0777, true);
            $destinationPath = ('recruitment_training/' . $folder_name);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . time()
        . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $imagename = $string.'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
        }


        $formData = new recruitment_training_database_model();
        $formData->recruitment_training_category_id = $recruitment_training_category_id;
        $formData->title = $title;
        $formData->duration = $duration;
        $formData->video = $video;
        if ($request->file('documents')) {
            $formData->documents = $folder_name.'/'.$imagename;
        }
        $formData->save();

        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }
    public function edit($id)
    {
        $category = recruitment_training_database_model::join(
            'recruitment_training_category',
            'recruitment_training_category.recruitment_training_category_id',
            'recruitment_training.recruitment_training_category_id'
        )
        ->where('recruitment_training.recruitment_training_id', $id)
        ->orderBy('recruitment_training.recruitment_training_id', 'DESC')
        ->get();

        $recruitment_training_category = recruitment_training_category_model::orderBy('recruitment_training_category_id', 'DESC')->get();
        $selectrecruitment_training_category = [];
        foreach ($recruitment_training_category as $recruitment_training_category_show) {
            $selectrecruitment_training_category[$recruitment_training_category_show->recruitment_training_category_id] = $recruitment_training_category_show->category_name;
        }

        return view('edit-recruitment-training', ['category'=>$category], compact('selectrecruitment_training_category'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'recruitment_training_category_id' => 'required|max:200',
            'title' => 'required|max:200',
            'duration' => 'required|max:200',
            'video' => 'required|max:200',
            'documents.*' => 'mimes:pdf,doc,docx,jpg,png,jpeg,zip|max:5048'
        ]);

        $recruitment_training_category_id = $request->input('recruitment_training_category_id');
        $title = $request->input('title');
        $duration = $request->input('duration');
        $video = $request->input('video');

        if ($request->file('documents')) {
            $file = $request->file('documents');
            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000).time();
            File::makeDirectory(public_path() . '/recruitment_training/' . $folder_name, 0777, true);
            $destinationPath = ('recruitment_training/' . $folder_name);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . time()
            . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $imagename = $string.'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
        }


        $formData = recruitment_training_database_model::where('recruitment_training_id', $id)
        ->first();
        $formData->recruitment_training_category_id = $recruitment_training_category_id;
        $formData->title = $title;
        $formData->duration = $duration;
        $formData->video = $video;
        if ($request->file('documents')) {
            $formData->documents = $folder_name.'/'.$imagename;
        }
        $formData->save();

        Session::flash('success', 'Successfully Updated');
        return redirect::back();
    }


    
    public function mainpage()
    {
        $publications = recruitment_training_category_model::with('recruitment_training_database_model')
        ->get();


        return view('recruitment-training',['publications'=>$publications]);
    }
    public function destroy($id)
    {
        recruitment_training_database_model::where('recruitment_training_id', $id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }

}
