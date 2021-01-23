@extends('careers_views.master')
@section('content')
<style>
    textarea{
        max-height: 250px;
    }
    </style>
<div class="container d-flex">

    <div class="box box-primary">
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

        {!! Form::open(['action' => 'EmpRegister@store','id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> {{ Form::text('fname', '',array('class' => 'form-control','placeholder'
                    => 'First Name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> {{ Form::text('lname', '',array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> {{ Form::text('email', $emp->email,array('class' => 'form-control', 'required'=>'true', 'disabled'=>'true')) }}
                    {{ Form::hidden('email', $emp->email,array('class' => 'form-control', 'required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="password">Password</label> {{ Form::password('password',array('class' => 'form-control', 'required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                   {{ Form::hidden('level',$emp->level,array('class' => 'form-control', 'required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="apptcond">Terms & Conditions</label>
                    {{ Form::textarea('apptcond', $emp->apptcond,array('class' => 'form-control','required'=>'true', 'rows' => 50,)) }}
                </div>

                <div class="col-md-12 form-group">
                    {{ Form::submit('Register and create your account',array('class' => 'btn btn-success')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
    <!-- /.box -->
</div>
@endsection