@extends('master') 
@section('content')
<style>
.w-fit{
	width: max-content;
}
a.nav-link.active {
    background: #3c8dbc;
    color: white;
}
	a.nav-link.active:hover {
    background: #3c8dbc;
    color: white;
}
</style>
<div class="col">
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            </div>
            @endforeach @if (Session::has("success"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success") }}</li>
                </ul>
            </div>
            @endif
        </div>
<div class="col d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">My Local Market Segments</h3>
        </div>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link" href="{{url('projects')}}">Market Segments ({{$project->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="{{url('prospects')}}">Add Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('contacts')}}">Contacts ({{$prospect->where('commit_stage', '0')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('1st-commit')}}">1st Commits ({{$prospect->where('commit_stage', '1')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('2nd-commit')}}">2nd Commits ({{$prospect->where('commit_stage', '2')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('side-dish')}}">Monitoring ({{$prospect->where('commit_stage', '3')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('marked-sold')}}">Marked as Sold ({{$prospect->where('commit_stage', '4')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('marked-closed')}}">Marked as Closed ({{$prospect->where('commit_stage', '5')->count()}})</a>
			  </li>
			</ul>
    </div>
</div>
<div class="col d-flex">
    <div class="box box-success">
       <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Contact</h3>
        </div>
        {!! Form::open(['action' => 'ProspectsController@store','id'=>'form']) !!} 
        {{ Form::token() }}
				
            <div class="col-md-6 form-group">
                <label for="title">Segment</label> {{ Form::select('project_id', $project_list, '' ,array('class' => 'form-control','placeholder'
                => '- Select a Segment -','readonly'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Website</label> {{ Form::text('website', '',array('class' => 'form-control','placeholder'
                => 'Website','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">WhatsApp Number</label> {{ Form::text('whatsapp', '',array('class' => 'form-control','placeholder'
                => 'WhatsApp No.','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Facebook URL</label> {{ Form::text('facebook_url', '',array('class' => 'form-control','placeholder'
                => 'Facebook URL','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Name</label> {{ Form::text('contact_name', '',array('class' => 'form-control','placeholder'
                => 'Contact Name','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Surname</label> {{ Form::text('contact_surname', '',array('class' => 'form-control','placeholder'
                => 'Contact Surname','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Phone</label> {{ Form::text('contact_phone', '',array('class' => 'form-control','placeholder'
                => 'Phone','required'=>'true')) }}

            </div><div class="col-md-6 form-group">
                <label for="title">Contact Email</label> {{ Form::text('contact_email', '',array('class' => 'form-control','placeholder'
                => 'Email','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Company Name</label> {{ Form::text('company_name', '',array('class' => 'form-control','placeholder'
                => 'Company Name','required'=>'true')) }}

            </div>
			<div class="col-md-6 form-group">
                <label for="title">Company Address</label> {{ Form::text('company_address', '',array('class' => 'form-control','placeholder'
                => 'Company Address','required'=>'true')) }}

            </div>
                  <div class="col-md-6 form-group">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
              </div>
	  </div>'
@endsection