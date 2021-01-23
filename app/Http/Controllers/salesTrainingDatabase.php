<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sales_training_category_model;
use App\sales_training_database_model;
use Session;
use Redirect;
use File;
use Image;

class salesTrainingDatabase extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $category = sales_training_database_model::join(
            'sales_training_category',
            'sales_training_category.sales_training_category_id',
            'sales_training.sales_training_category_id'
        )
        ->orderBy('sales_training.sales_training_category_id', 'DESC')->paginate(10);

        $sales_training_category = sales_training_category_model::orderBy('sales_training_category_id', 'DESC')->get();
        $selectSales_training_category = [];
        foreach ($sales_training_category as $sales_training_category_show) {
            $selectSales_training_category[$sales_training_category_show->sales_training_category_id] = $sales_training_category_show->category_name;
        }
        return view('add-sales-training', ['category'=>$category], compact('selectSales_training_category'));
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'sales_training_category_id' => 'required|max:200',
            'title' => 'required|max:200',
            'duration' => 'required|max:200',
            'video' => 'required|max:200',
            'documents.*' => 'mimes:pdf,doc,docx,jpg,png,jpeg,zip|max:5048'
        ]);
       
        $sales_training_category_id = $request->input('sales_training_category_id');
        $title = $request->input('title');
        $duration = $request->input('duration');
        $video = $request->input('video');

        if (!empty($request->file('documents'))) {
            $file = $request->file('documents');
            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000).time();
            File::makeDirectory(public_path() . '/sales_training/' . $folder_name, 0777, true);
            $destinationPath = ('sales_training/' . $folder_name);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
        . mt_rand(1000000, 9999999)
        . time()
        . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $imagename = $string.'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
        }


        $formData = new sales_training_database_model();
        $formData->sales_training_category_id = $sales_training_category_id;
        $formData->title = $title;
        $formData->duration = $duration;
        $formData->video = $video;
        if (!empty($request->file('documents'))) {
            $formData->documents = $folder_name.'/'.$imagename;
        }
        $formData->save();

        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }
    public function edit($id)
    {
        $category = sales_training_database_model::join(
            'sales_training_category',
            'sales_training_category.sales_training_category_id',
            'sales_training.sales_training_category_id'
        )
        ->where('sales_training.sales_training_id', $id)
        ->orderBy('sales_training.sales_training_id', 'DESC')
        ->get();

        $sales_training_category = sales_training_category_model::orderBy('sales_training_category_id', 'DESC')->get();
        $selectSales_training_category = [];
        foreach ($sales_training_category as $sales_training_category_show) {
            $selectSales_training_category[$sales_training_category_show->sales_training_category_id] = $sales_training_category_show->category_name;
        }

        return view('edit-sales-training', ['category'=>$category], compact('selectSales_training_category'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sales_training_category_id' => 'required|max:200',
            'title' => 'required|max:200',
            'duration' => 'required|max:200',
            'video' => 'required|max:200',
            'documents.*' => 'mimes:pdf,doc,docx,jpg,png,jpeg,zip|max:5048'
        ]);

        $sales_training_category_id = $request->input('sales_training_category_id');
        $title = $request->input('title');
        $duration = $request->input('duration');
        $video = $request->input('video');

        if ($request->file('documents')) {
            $file = $request->file('documents');
            $folder_name = date('Ymd') . '_' . mt_rand(1000, 990000).time();
            File::makeDirectory(public_path() . '/sales_training/' . $folder_name, 0777, true);
            $destinationPath = ('sales_training/' . $folder_name);
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . time()
            . $characters[rand(0, strlen($characters) - 1)];
            $string = str_shuffle($pin);
            $imagename = $string.'.'.$file->getClientOriginalExtension();
            $file->move($destinationPath, $imagename);
        }


        $formData = sales_training_database_model::where('sales_training_id', $id)
        ->first();
        $formData->sales_training_category_id = $sales_training_category_id;
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
        $publications = sales_training_category_model::with('sales_training_database_model')
        ->get();


        return view('sales-training',['publications'=>$publications]);
    }
    public function destroy($id)
    {
        sales_training_database_model::where('sales_training_id', $id)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }

}
