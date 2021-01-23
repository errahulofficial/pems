@extends('master')
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Add Sales Training</h3>
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

        {!! Form::open(['action' => 'salesTrainingDatabase@create','id'=>'form','files'=>'true',]) !!}
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="sales_training_category_id">Select Category</label>
                    {{ Form::select('sales_training_category_id',$selectSales_training_category,NULL,array('class'=>'form-control','required'=>'true'))
                    }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Title">Title</label>
                    {{ Form::text('title', '',array('class' => 'form-control','placeholder'
                    => 'Title','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Duration">Duration</label>
                    {{ Form::text('duration', '',array('class' => 'form-control','placeholder'
                    => 'Duration','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Video">Video URL (Youtube/Vimeo)</label>
                    {{ Form::text('video', '',array('class' => 'form-control','placeholder'
                    => 'Video','required'=>'true')) }}
                </div>

                <div class="col-md-12 form-group">
                    <label for="Documents">Document (PDF, Doc, Docx, Png, Jpg)</label>
                    {{ Form::file('documents',array('class' => 'form-control','placeholder'
                    => 'Documents')) }}
                </div>

                <div class="col-md-12 form-group">
                    {{ Form::submit('ADD SALES TRAINING',array('class' => 'btn btn-success')) }}
                </div>

            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Sales Training View</h3>
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
                        <th>Category Name</th>
                        <th>Category Title</th>
                        <th>Title</th>

                        <th>Action</th>
                    </tr>
                    @foreach ($category as $categoryView)
                    <tr>
                        <td>{{ $categoryView->category_name}}</td>
                        <td>{{ $categoryView->category_title}}</td>
                        <td>{{ $categoryView->title}}</td>


                        <td>
                            <a data-toggle="modal"
                                data-target="#modal-delete-{{ $categoryView->sales_training_category_id}}" href="">
                                <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade"
                                id="modal-delete-{{ $categoryView->sales_training_category_id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="{{ url('add-sales-training/delete') }}/{{ $categoryView->sales_training_category_id}}"><button
                                                    type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal"
                                data-target="#modal-edit-{{ $categoryView->sales_training_category_id}}" href=""> <span
                                    class="label label-success"><i class="fa fa-pencil"></i></span></a>

                            <div class="modal modal-success fade"
                                id="modal-edit-{{ $categoryView->sales_training_category_id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit employee</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="{{ url('add-sales-training/edit') }}/{{ $categoryView->sales_training_category_id}}"><button
                                                    type="button" class="btn btn-outline">Sure to edit !</button></a>
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
        <div class="px-10 py-0"> {{ $category->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection