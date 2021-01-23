<?php

namespace App\Http\Controllers;

use App\PortalName;
use Session;
use Redirect;
use Illuminate\Http\Request;

class PortalNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pnames = PortalName::paginate(10);
		return view('portal-name', ['names' => $pnames]);
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
        $this->validate($request, [
            'portal_name' => 'required|max:200',
            'portal_url' => 'required|max:200',
            'note' => 'required|max:1000',
						
        ]);
        $portal_name = new PortalName();
        $portal_name->portal_name = filter_var($request->input('portal_name'), FILTER_SANITIZE_STRING);
		$portal_name->portal_url = filter_var($request->input('portal_url'), FILTER_SANITIZE_STRING);
		$portal_name->note = filter_var($request->input('note'), FILTER_SANITIZE_STRING);
		$portal_name->accept_html = $request->input('accept_html') != null ? $request->input('accept_html') : 0;
		$portal_name->can_post_url = $request->input('can_post_url') != null ? $request->input('can_post_url') : 0;
		
        Session::flash('success', 'Successfully Created');
        $portal_name->save();
        return redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PortalName  $portalName
     * @return \Illuminate\Http\Response
     */
    public function show(PortalName $portalName)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PortalName  $portalName
     * @return \Illuminate\Http\Response
     */
    public function edit(PortalName $portalName)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PortalName  $portalName
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PortalName $portalName)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PortalName  $portalName
     * @return \Illuminate\Http\Response
     */
    public function destroy($portalName)
    {
        PortalName::where('id',$portalName)->delete();
        Session::flash('success-delete', 'Successfully Deleted');
        return redirect::back();
    }
}
