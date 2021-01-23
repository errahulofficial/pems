@extends('master') 
@section('content')
<div class="col-md-6 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Edit Recruitment Training Category</h3>
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

        @foreach ($category as $categoryView)
        {!! Form::open(['action' => ['recruitmentTrainingCategory@update',$categoryView->recruitment_training_category_id],'id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="Category Name">Category Name</label>
                     {{ Form::text('category_name', $categoryView->category_name,array('class' => 'form-control','placeholder'
                    => 'Category Name','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Category Title">Category Title</label>
                     {{ Form::text('category_title', $categoryView->category_title,array('class' => 'form-control','placeholder'
                    => 'Category Title','required'=>'true')) }}
                </div>
               
                <div class="col-md-12 form-group">
                    {{ Form::submit('UPDATE CATEGORY',array('class' => 'btn btn-warning')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        @endforeach

    </div>
</div>

@endsection