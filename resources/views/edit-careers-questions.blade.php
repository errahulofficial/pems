@extends('master')
@section('content')
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Careers Question</h3>
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

        @foreach ($question as $dataView)
        {!! Form::open(['action' => ['careersQuestion@update',"".$dataView->questions_id]]) !!}
        {{ Form::token() }}
        <div class="box-body">
            <div class="form-group">
                <label for="question">Question</label>
            </div>
            <div class="form-group">
                {{ Form::text('question', $dataView->question,array('class' => 'form-control','placeholder' => 'Question')) }}
            </div>
         
            <div class="form-group">
                {{ Form::submit('Update',array('class' => 'btn btn-success')) }}
            </div>
        </div>
        {!! Form::close() !!}
        @endforeach
        <script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

@endsection