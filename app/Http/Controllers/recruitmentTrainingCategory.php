<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\recruitment_training_category_model;
use Session;
use Redirect;

class recruitmentTrainingCategory extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $category = recruitment_training_category_model::orderBy('recruitment_training_category_id','DESC')
        ->paginate(10);
        return view('recruitment-training-category',['category'=>$category]);
    }
    public function create(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:200',
            'category_title' => 'required|max:200',
         ]);
       
        $category_name = $request->input('category_name');
        $category_title = $request->input('category_title');

        $formData = new recruitment_training_category_model();
        $formData->category_name = $category_name;
        $formData->category_title = $category_title;
        $formData->save();

        Session::flash('success', 'Successfully Saved');
        return redirect::back();
    }
    public function edit($id)
    {
        $category = recruitment_training_category_model::where('recruitment_training_category_id',$id)->get();
        return view('recruitment-training-category-edit',['category'=>$category]);
    }
    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'category_name' => 'required|max:200',
            'category_title' => 'required|max:200',
         ]);
       
        $category_name = $request->input('category_name');
        $category_title = $request->input('category_title');

        $formData = recruitment_training_category_model::where('recruitment_training_category_id',$id)->first();
        $formData->category_name = $category_name;
        $formData->category_title = $category_title;
        $formData->save();

        Session::flash('success', 'Successfully Updated');
        return redirect::back();
    }
    public function destroy($id)
    {
        recruitment_training_category_model::where('recruitment_training_category_id',$id)->delete();
        Session::flash('success', 'Successfully Deleted');
        return redirect::back();
    }
  
}
