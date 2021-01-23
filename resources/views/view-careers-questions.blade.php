@extends('master')
@section('content')

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Careers Questions View</h3>
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
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Question</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($questions as $dataView)
                    <tr>
                        <td>{{ $dataView->question}}</td>
                        <td>
                            <a href="{{ url("view-careers-questions")}}/{{ $dataView->questions_id}}">
                                <span class="label label-primary"> View <i class="fa fa-eye"></i></span>
                            </a>
                            <a href="{{ url("view-careers-questions")}}/{{ $dataView->questions_id}}">
                                <span class="label label-success"> Edit <i class="fa fa-pencil"></i></span>
                            </a>
                            <a href="{{ url("view-careers-questions/delete")}}/{{ $dataView->questions_id}}">
                                <span class="label label-danger"> Delete <i class="fa fa-trash"></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $questions->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection
