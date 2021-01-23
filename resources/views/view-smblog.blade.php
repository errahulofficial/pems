@extends('master')
@section('content')

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Blog Posts View</h3>
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
                        <th>Title</th>
                        <th>Action</th>
                    </tr>

                    @foreach ($posts as $blog)
                    <tr>
                        <td>{{ $blog->title}}</td>
                        <td>



                        <a data-toggle="modal"
                        data-target="#modal-delete-blog-{{ $blog->id}}"
                        class="label label-danger">DELETE <i
                        class="fa fa-trash "></i></a>
                    <div class="modal modal-danger fade"
                        id="modal-delete-blog-{{ $blog->id}}"
                        style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-contents">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">SURE TO DELETE</h4>
                                </div>

                                <div class="modal-body">
                                        <a href="smblog-delete/{{ $blog->id}}">
                                            <span class="btn label-warning">Delete <i
                                                    class="fa fa-pencil "></i></span></a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $posts->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection
