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


        {!! Form::open(['action' => 'blog_controller@store','id'=>'form']) !!} 
        {{ Form::token() }}
        <div class="box-body">

            <div class="form-group">
                <label for="see">Who will see this? (Check one or both)</label>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            {{ Form::hidden('retail_consultants','0') }}
                            {{ Form::checkbox('retail_consultants','1','1',array('class' => 'form-control')) }} <label for="see"> Retail Consultants</label>
                        </div>

                        <div class="col-md-4">
                            {{ Form::hidden('sales_managers','0') }}
                            {{ Form::checkbox('sales_managers','1','1',array('class' => 'form-control')) }} <label for="see"> Sales Managers</label>
                        </div>
                        <div class="col-md-4">
                            {{ Form::hidden('regional_sales_managers','0') }}
                            {{ Form::checkbox('regional_sales_managers','1','1',array('class' => 'form-control')) }} <label for="see"> Regional Sales Managers</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label> {{ Form::text('title', '',array('class' => 'form-control','placeholder'
                => 'Title','required'=>'true')) }}

            </div>
            <div class="form-group">
                <label for="descp">Description</label> {{ Form::textarea('descp', '',array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
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