@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Black List</h3>
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

        {!! Form::open(['action' => 'blackListController@create','id'=>'form']) !!}
        {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> {{ Form::text('fname', '',array('class' => 'form-control','placeholder'
                    => 'name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> {{ Form::text('lname', '',array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> {{ Form::text('email', '',array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone">Phone</label> {{ Form::text('phone', '',array('class' => 'form-control','placeholder'
                    => 'Phone','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="city">City</label> {{ Form::text('city', '',array('class' => 'form-control','placeholder'
                    => 'City','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label> {{ Form::text('state', '',array('class' => 'form-control','placeholder'
                    => 'State','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="zip">Zip</label> {{ Form::text('zip', '',array('class' => 'form-control','placeholder' =>
                    'Zip','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="note">Note</label> {{ Form::textarea('note', '',array('class' => 'form-control','placeholder'
                    => 'Note','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                    {{ Form::submit('ADD TO BLACKLIST',array('class' => 'btn btn-primary')) }}
                </div>
            </div>
        </div>
        {!! Form::close() !!}

    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Blacklist View</h3>
           
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($blacklist as $blacklistview)
                    <tr>
                        <td>{{ $blacklistview->fname}}</td>
                        <td>{{ $blacklistview->lname}}</td>
                        <td>{{ $blacklistview->email}}</td>
                        <td>{{ $blacklistview->phone}}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-{{ $blacklistview->blacklistid}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $blacklistview->blacklistid}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('blacklist-delete') }}/{{ $blacklistview->blacklistid}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal" data-target="#modal-edit-{{ $blacklistview->blacklistid}}" href=""> <span class="label label-success"><i class="fa fa-pencil"></i></span></a>


                            <div class="modal modal-success fade" id="modal-edit-{{ $blacklistview->blacklistid}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit Blacklist</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('blacklist-edit') }}/{{ $blacklistview->blacklistid}}"><button type="button" class="btn btn-outline">Sure to edit !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <a data-toggle="modal" data-target="#modal-view-{{ $blacklistview->blacklistid}}" href=""> <span class="label label-success"><i class="fa fa-eye"></i></span></a>

                            <div class="modal modal-success fade" id="modal-view-{{ $blacklistview->blacklistid}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{{ $blacklistview->fname}} {{ $blacklistview->lname}}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Email</h4>
                                            <p> {{ $blacklistview->email }}</p>
                                            <h4>Phone</h4>
                                            <p> {{ $blacklistview->phone }}</p>
                                            <h4>City</h4>
                                            <p> {{ $blacklistview->city }}</p>
                                            <h4>State</h4>
                                            <p> {{ $blacklistview->state }}</p>
                                            <h4>Zip</h4>
                                            <p> {{ $blacklistview->zip }}</p>

                                            @if(!empty($blacklistview->note))
                                            <h4>Note</h4>
                                            <p> {{ $blacklistview->note }}</p>
                                            @endif

                                            @if(!empty($blacklistview->resume))
                                            <h4>Resume</h4>
                                            @php
                                      $resume_folder = $blacklistview->resume_folder;
                                      $resume = $blacklistview->resume;
                                      $singleresume = explode(',',$resume) 
                                     @endphp
                                      @foreach($singleresume as $singleresumeView)
@if(!empty($singleresumeView))
                                     
<p> <a style="color:#fff" href="{{ url("$resume_folder/$singleresumeView ")}}">{{$singleresumeView}}</a></p>

                                    
                                    
                                          
                                   

@endif
                                    @endforeach
                                            @endif
                                            @if(!empty($blacklistview->docs))
                                            <h4>Docs</h4>
                                            @php
                                      $docs_folder = $blacklistview->docs_folder;
                                      $docs = $blacklistview->docs;
                                      $singledocs = explode(',',$docs) 
                                     @endphp
                                      @foreach($singledocs as $singledocsView)
@if(!empty($singledocsView))
                                     
<p> <a style="color:#fff" href="{{ url("$docs_folder/$singledocsView ")}}">{{$singledocsView}}</a></p>

                                    
                                    
                                          
                                   

@endif
                                    @endforeach
                                            @endif

                                            <h4>Created at</h4>
                                            <p> {{ $blacklistview->created_at }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
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
            <div class="px-10 py-0"> {{ $blacklist->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection