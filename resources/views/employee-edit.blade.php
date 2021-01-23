@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-4 d-flex align-items-center p-0">Edit Employee</h3>
            <span class="col-xs-8 text-right p-0">
            <a class="btn btn-primary" href="{{ url('employee') }}">Add/View Employees</a>
               
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
        @foreach ($employee as $employeeview) {!! Form::open(['action' => ['employeeController@update',''.$employeeview->employeeid],'id'=>'form'])
        !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> {{ Form::text('fname', $employeeview->fname,array('class'
                    => 'form-control','placeholder' => 'name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> {{ Form::text('lname', $employeeview->lname,array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> {{ Form::text('email', $employeeview->email,array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="level">Level</label> {{ Form::select('level',$selectEmployeelevel,NULL,array('class'=>'form-control','id'=>'level','required'=>'true'))
                    }}

                    <script>
                        $(document).ready(function(){
    $("#level").prepend('<option value="{{ $employeeview->level }}" selected>{{ $employeeview->employeelevelname }}</option>');
    });
                    </script>
                </div>
                <div class="col-md-6 form-group">
                    <label for="division">Division</label> {{ Form::select('division',$selectEmployeedivision,NULL,array('class'=>'form-control','id'=>'division','required'=>'true'))
                    }}
                      <script>
                        $(document).ready(function(){
    $("#division").prepend('<option value="{{ $employeeview->division }}" selected>{{ $employeeview->employeedivisionName }}</option>');
    });
                    </script>
                </div>
               
                <div class="col-md-12 form-group">
                    {{ Form::submit('EDIT EMPLOYEE',array('class' => 'btn btn-success')) }}
                    <a class="btn btn-danger" href="{{ url('employee') }}">Cancel</a>
                </div>
            </div>
        </div>
        {!! Form::close() !!} @endforeach

    </div>
</div>
@endsection