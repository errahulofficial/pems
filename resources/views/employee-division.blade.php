@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-3 d-flex align-items-center p-0">Add Division</h3>
            <span class="col-xs-9 text-right p-0">
                <a class="btn btn-primary" href="{{ url('employee') }}">Add/View Employee</a>
                <a class="btn btn-primary" href="{{ url('employee-level') }}">Add/View Level</a>
            </span>
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

        {!! Form::open(['action' => 'employeeDivisionController@create']) !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="Name">Name</label> {{ Form::text('name', '',array('class' => 'form-control','placeholder'
                    => 'name')) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::submit('ADD DIVISION',array('class' => 'btn btn-success')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Employee Division View</h3>
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($employeedivision as $employeedivisionview)
                    <tr>
                        <td>{{ $employeedivisionview->name}}</td>

                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $employeedivisionview->employeedivisionid}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $employeedivisionview->employeedivisionid}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('employee-division-delete') }}/{{ $employeedivisionview->employeedivisionid}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal" data-target="#modal-edit-{{ $employeedivisionview->employeedivisionid}}" href=""> <span class="label label-success"><i class="fa fa-pencil"></i></span></a>


                            <div class="modal modal-success fade" id="modal-edit-{{ $employeedivisionview->employeedivisionid}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit employee</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('employee-division-edit') }}/{{ $employeedivisionview->employeedivisionid}}"><button type="button" class="btn btn-outline">Sure to edit !</button></a>
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
            <div class="px-10 py-0"> {{ $employeedivision->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection