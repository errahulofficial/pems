@extends('master') 
@section('content')
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Blog Posts</h3>
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


        {!! Form::open(['action' => 'SMBlogController@store','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
       
            <div class="form-group">
                <label for="title">Title</label> {{ Form::text('title', '',array('class' => 'form-control','placeholder'
                => 'Title','required'=>'true')) }}

            </div>
            <div class="form-group">
                <label for="descp">Description</label> {{ Form::textarea('description', '',array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
                => 'Description','required'=>'true')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('ADD BLOG',array('class' => 'btn btn-primary')) }}
            </div>


        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection