<?php

namespace App\Http\Controllers;

use App\SMBlog;
use Illuminate\Http\Request;
use Session;
use Redirect;

class SMBlogController extends Controller
{
	
	public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add-smblog');
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
            'title' => 'required|max:200',
            'description' => 'required|max:2000'
            ]
        );
        $title = $request->input('title');
        $descp = $request->input('description');
        
        $data = new SMBlog();
        $data->title = $title;
        $data->description = $descp;
        Session::flash('success', 'Successfully Created');
        $data->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SMBlog  $sMBlog
     * @return \Illuminate\Http\Response
     */
    public function show(SMBlog $sMBlog)
    {
        $smblog = SMBlog::paginate(10);
        return view('view-smblog',['posts'=>$smblog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SMBlog  $sMBlog
     * @return \Illuminate\Http\Response
     */
    public function edit(SMBlog $sMBlog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SMBlog  $sMBlog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SMBlog $sMBlog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SMBlog  $sMBlog
     * @return \Illuminate\Http\Response
     */
    public function destroy($sMBlog)
    {
        SMBlog::where('id',$sMBlog)->delete();
        Session::flash('success', 'Blog Successfully Deleted');
        return redirect::back();
    }
}
