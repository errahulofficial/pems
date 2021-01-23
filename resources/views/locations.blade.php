@extends('master') 
@section('content')
<div class="col-md-3 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Division</h3>
        </div>

        <div class="col-md-12">
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

       {!! Form::open(['action' => 'LocationsController@store','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
			
				
				 <div class="col-md-12 form-group">
                    <label for="First Name">Division ID</label> {{ Form::select('division_id', $selectdivision , '' ,array('class' => 'form-control','placeholder'
                    => '- Select Division ID -','required'=>'true')) }}
                </div>
				
				<div class="col-md-12 form-group">
                    <label for="city">Zip Code</label> {{ Form::text('zip', '',array('class' => 'form-control','placeholder'
                    => 'Zip Code','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="lname">State Code</label> {{ Form::text('state', '',array('class' => 'form-control','placeholder'
                    => 'State Code','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="email">State Name</label> {{ Form::text('state_name', '',array('class' => 'form-control','placeholder'
                    => 'State Name','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="phone">City</label> {{ Form::text('city', '',array('class' => 'form-control','placeholder'
                    => 'City','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="city">County</label> {{ Form::text('county', '',array('class' => 'form-control','placeholder'
                    => 'County','required'=>'true')) }}
                </div>
                
                <div class="col-md-12 form-group">
                    {{ Form::submit('Add Territory',array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
<div class="col-md-9 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Divisions / Territories</h3>
           
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
            @if (Session::has("success-delete"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success-delete") }}</li>
                </ul>
            </div>
            @endif
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>State</th>
                        <th>State Name</th>
                        <th>City</th>
                        <th>County</th>
                        <th>Zip</th>
						<th>Region ID</th>
						<th>Division ID</th>
                    </tr>
                    @foreach ($locations as $location)
                    <tr>
                        <td>{{ $location->state}}</td>
                        <td>{{ $location->state_name}}</td>
                        <td>{{ $location->city}}</td>
                        <td>{{ $location->county}}</td>
						<td>{{ $location->zip}}</td>
						<td>{{ $location->region_id}}</td>
						<td>{{ $location->division_id}}</td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $location->id}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $location->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('location-delete') }}/{{ $location->id}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $locations->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection