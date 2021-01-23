@extends('master') 
@section('content')
<div class="col-md-3 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Regions</h3>
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
       {!! Form::open(['action' => 'RegionController@store','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="lname">Region Name</label> {{ Form::text('region_name', '',array('class' => 'form-control','placeholder'
                    => 'Region Name','required'=>'true')) }}
                </div>
                
                <div class="col-md-12 form-group">
                    {{ Form::submit('Add Region',array('class' => 'btn btn-primary')) }}
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
                        <th>Region ID</th>
                        <th>Region Name</th>
						<th>Action</th>
                    </tr>
					
                    @foreach ($regions as $region)
                    <tr>
                        <td>{{ $region->region_id}}</td>
                        <td>{{ $region->region_name}}</td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $region->region_id}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $region->region_id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('region-delete') }}/{{ $region->region_id}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
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
            <div class="px-10 py-0"> {{ $regions->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection