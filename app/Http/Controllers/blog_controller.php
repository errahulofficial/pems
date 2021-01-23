<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog_model;
use Session;
use Redirect;

class blog_controller extends Controller
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
    public function index()
    {
        return view('add-blog');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view()
    {
        $blog_posts = blog_model::paginate(10);
        return view('view-blog',['blog_posts'=>$blog_posts]);
    }

    public function edit($id)
    {
        $blog_posts = blog_model::where('id',$id)->get();
        return view('blog-edit',['blog_posts'=>$blog_posts]);
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
            'title' => 'required|max:200',
            'descp' => 'required|max:2000'
            ]
        );
        $title = $request->input('title');
        $descp = $request->input('descp');
        $retail_consultants = $request->input('retail_consultants');
        $sales_managers = $request->input('sales_managers');
        $regional_sales_managers = $request->input('regional_sales_managers');
        
        $data = new blog_model();
        $data->title = $title;
        $data->descp = $descp;
        $data->retail_consultants = $retail_consultants;
        $data->sales_managers = $sales_managers;
        $data->regional_sales_managers = $regional_sales_managers;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $blog_posts = blog_model::paginate(10);
        return view('general-blog',['blog_posts'=>$blog_posts]);
    }

    public function viewblog($id)
    {
        $blog_posts = blog_model::where('id',$id)->first();
        return view('view-blog-post',['blog_posts'=>$blog_posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
            'title' => 'required|max:200',
            'descp' => 'required|max:2000'
            ]
        );
        $title = $request->input('title');
        $descp = $request->input('descp');
        $retail_consultants = $request->input('retail_consultants');
        $sales_managers = $request->input('sales_managers');
        $regional_sales_managers = $request->input('regional_sales_managers');
        
        $data = blog_model::where('id',$id)->first();
        $data->title = $title;
        $data->descp = $descp;
        $data->retail_consultants = $retail_consultants;
        $data->sales_managers = $sales_managers;
        $data->regional_sales_managers = $regional_sales_managers;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        blog_model::where('id',$id)->delete();
        Session::flash('success', 'Blog Successfully Deleted');
        return redirect::back();
    }
}
