@extends('master')
@section('content')

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
         
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
           
                   

                   
                   
                        <h2>{{ $blog_posts->title}}</h2>
                      
        <p>{!!$blog_posts->descp!!}</p>
                   
               
           
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection
