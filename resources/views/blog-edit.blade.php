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

        @foreach ($blog_posts as $blog_posts_view)
        {!! Form::open(['action' => ['blog_controller@update'.'',$blog_posts_view->id],'id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">

            <div class="form-group">
                <label for="see">Who will see this? (Check one or both)</label>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            {{ Form::hidden('retail_consultants','0') }}

                            @php
                            if($blog_posts_view->retail_consultants == '0'){
                            $checked = '0';
                            }
                            else{
                            $checked = '1';
                            }
                            @endphp
                            {{ Form::checkbox('retail_consultants','1',$checked,array('class' => 'form-control')) }}
                            <label for="see"> Retail Consultants</label>
                        </div>

                        <div class="col-md-4">
                            {{ Form::hidden('sales_managers','0') }}
                            @php
                            if($blog_posts_view->sales_managers == '0'){
                            $checked2 = '0';
                            }
                            else{
                            $checked2 = '1';
                            }
                            @endphp
                            {{ Form::checkbox('sales_managers','1',$checked2,array('class' => 'form-control')) }}
                            <label for="see"> Sales Managers</label>
                        </div>
                        <div class="col-md-4">
                            {{ Form::hidden('regional_sales_managers','0') }}
                            @php
                            if($blog_posts_view->regional_sales_managers == '0'){
                            $checked3 = '0';
                            }
                            else{
                            $checked3 = '1';
                            }
                            @endphp
                            {{ Form::checkbox('regional_sales_managers','1',$checked3,array('class' => 'form-control')) }}
                            <label for="see"> Regional Sales Managers</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label> {{ Form::text('title', $blog_posts_view->title,array('class' => 'form-control','placeholder'
                => 'Title','required'=>'true')) }}

            </div>
            <div class="form-group">
                <label for="descp">Description</label> {{ Form::textarea('descp', $blog_posts_view->descp,array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
                => 'Description','required'=>'true')) }}
            </div>

            <div class="form-group">
                {{ Form::submit('UPDATE BLOG',array('class' => 'btn btn-primary')) }}
            </div>
      </div>
        {!! Form::close() !!}
        @endforeach
    </div>
</div>

@endsection
