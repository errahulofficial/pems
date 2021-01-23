@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-3 d-flex align-items-center p-0">Edit Level</h3>
            <span class="col-xs-9 text-right p-0">
                <a class="btn btn-primary" href="{{ url('employee') }}">Add/View Employee</a>
                <a class="btn btn-primary" href="{{ url('employee-division') }}">Add/View Division</a>
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
        @foreach ($employeelevel as $employeelevelview) {!! Form::open(['action' => ['employeeLevelController@update',"".$employeelevelview->employeelevelid]])
        !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="Name">Name</label> {{ Form::text('name', $employeelevelview->name,array('class' => 'form-control','placeholder'
                    => 'name')) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::submit('UPDATE LEVEl',array('class' => 'btn btn-success')) }}
                    <span class=""><a class="btn btn-primary" href="{{ url('employee-level') }}">BACK / CANCEL</a></span>
                </div>
            </div>
        </div>
        {!! Form::close() !!} @endforeach

    </div>
</div>
@endsection