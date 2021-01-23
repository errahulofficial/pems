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
				<a class="nav-link active" href="{{url('projects')}}">Market Segments   ({{$projects->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('prospects')}}">Add Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('contacts')}}">Contacts ({{$prospects->where('commit_stage', '0')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('1st-commit')}}">1st Commits ({{$prospects->where('commit_stage', '1')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('2nd-commit')}}">2nd Commits ({{$prospects->where('commit_stage', '2')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="{{url('side-dish')}}">Monitoring ({{$prospects->where('commit_stage', '3')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('marked-sold')}}">Marked as Sold
				 ({{$prospects->where('commit_stage', '4')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('marked-closed')}}">Marked as Closed ({{$prospects->where('commit_stage', '5')->count()}})</a>
			  </li>
			</ul>
    </div>
</div>
<div style="margin-bottom:20px">
<button class="btn btn-primary" data-toggle="modal" data-target="#modal-addproject"> Add Local Market Segments</button>

 <div class="modal modal-danger fade" id="modal-addproject" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Add Local Market Segments</h4>
                </div>
				<div class="modal-body">
        {!! Form::open(['action' => 'ProjectsController@store','id'=>'form']) !!} 
        {{ Form::token() }}
        
            <div class="form-group">
                <label for="title">Create a Segment</label> {{ Form::text('project_name', '',array('class' => 'form-control','placeholder'
                => 'Segment Name','required'=>'true')) }}

            </div>
                  <div class="form-group">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
	</div>
<div class="col d-flex">
    <div class="box box-success">
        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th width=300>Segment</th>
                        <th>1st Comps</th>
                        <th>2nd Comps</th>
                        <th>Acomps</th>
                        <th>Sales</th>
                        <th>Closed</th>
                        <th></th>
                    </tr>
                   
                       @foreach ($projects as $project)
                    <tr>
                      <td> {!! Form::open(['action' => ['ProjectsController@update',"".$project->id],'id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="d-flex w-fit">
            <div class="form-group">{{ Form::text('project_name', $project->project_name,array('class' => 'form-control ','required'=>'true')) }}

            </div>
                  <div class="form-group">
                {{ Form::submit('Save',array('class' => 'btn btn-success')) }}
				</div>
</div>
				       {!! Form::close() !!}</td>
					   
					   <td><a class="nav-link " href="{{url('1st-commit')}}"><i class="fa fa-search"></i> {{$prospects->where('commit_stage', '1')->where('project_id',$project->id)->count()}}</a></td>
					   <td><a class="nav-link " href="{{url('2nd-commit')}}"><i class="fa fa-search"></i> {{$prospects->where('commit_stage', '2')->where('project_id',$project->id)->count()}}</a></td>
					   <td><a class="nav-link " href="{{url('1st-commit')}}"><i class="fa fa-search"></i> {{$prospects->where('commit_stage', '3')->where('project_id',$project->id)->count()}}</a></td>
					   <td><a class="nav-link " href="{{url('1st-commit')}}"><i class="fa fa-search"></i> {{$prospects->where('commit_stage', '4')->where('project_id',$project->id)->count()}}</a></td>
					   <td><a class="nav-link " href="{{url('1st-commit')}}"><i class="fa fa-search"></i> {{$prospects->where('commit_stage', '5')->where('project_id',$project->id)->count()}}</a></td>
					   
					   <td><button class="btn btn-primary" data-toggle="modal" data-target="#modal-addprospect-{{$project->id}}"><i class="fa fa-plus"></i>  Add Prospect</button></td>
					   
 <div class="modal modal-danger fade" id="modal-addprospect-{{$project->id}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Add Local Market Segments</h4>
                </div>
				<div class="modal-body">
        {!! Form::open(['action' => 'ProspectsController@store','id'=>'form']) !!} 
        {{ Form::token() }}
				{{ Form::text('project_id', $project->id ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true')) }}
				
				{{ Form::text('created_by', $project->created_by ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true')) }}
				
            <div class="col-md-6 form-group">
                <label for="title">Segment</label> {{ Form::text('project_name', $project->project_name ,array('class' => 'form-control','readonly'=>'true')) }}

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
                  <div class="form-group text-center">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    </tr>
                  @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> </div>
        </div>
        <!-- /.box-body -->
    </div>
        <!-- /.box-header -->
        </div>
  
@endsection