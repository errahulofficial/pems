@extends('master')
@section('content')
<div class="col-md-12 d-flex">


    <div class="col-md-12 d-flex">
        <div class="col-md-12" style="padding:0">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">View Interviewers</h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    @if (Session::has("successresume"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get("successresume") }}</li>
                        </ul>
                    </div>
                    @endif
                    @if (Session::has("success"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get("success") }}</li>
                        </ul>
                    </div>
                    @endif

                    @if (Session::has("emailseccess"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get("emailseccess") }}</li>
                        </ul>
                    </div>
                    @endif


                </div>
                <div class="box-body table-responsive px-10 py-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Interviewer Name</th>
                                <th>Interviewer Email</th>
                                <th>Level</th>
                                <th>Division</th>
                                <th>Email Send</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>


                            @foreach($interviewerData as $interviewerDataView)

                            <tr>
                                <td>{{$interviewerDataView->fname}} {{$interviewerDataView->lname}}</td>

                                @if(!empty($interviewerDataView->intervieweremail))

                                <td>{{$interviewerDataView->intervieweremail}}</td>
                                @else
                                <td>{{$interviewerDataView->employeeemail}}</td>

                                @endif
                                <td>{{$interviewerDataView->role}}</td>
                                <td>{{$interviewerDataView->division_id}}</td>

                                <td>
                                    <a data-toggle="modal"
                                        data-target="#modal-view-{{ $interviewerDataView->addinterviewerid}}"
                                        class="label label-warning">Send Test Email</a>
                                    <div class="modal modal-primary fade"
                                        id="modal-view-{{ $interviewerDataView->addinterviewerid}}"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-contents">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Send Test Email</h4>
                                                </div>

                                                <div class="modal-body">
                                                    {!! Form::open(['action' => 'interviewerEmail@sendtest']) !!}
                                                    {{ Form::token() }}
                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="name">Name</label> {{ Form::text('emailtoName', '',array('class' => 'form-control','placeholder' => 'Enter Name'))
                }}

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label> {{ Form::email('emailtoEmail', '',array('class' => 'form-control','placeholder' => 'Enter Email'))
        }}

                                                        </div>

                                                        @php
                                                        if(!empty($interviewerDataView->intervieweremail)){
                                                        $emailFrom = $interviewerDataView->intervieweremail;
                                                        }
                                                        else
                                                        {
                                                        $emailFrom = $interviewerDataView->employeeemail;
                                                        }
                                                        @endphp


                                                        {{ Form::hidden('emailfrom', $emailFrom,array('class' => 'form-control','placeholder' => 'Enter Email'))
                                                    }}
                                                        {{ Form::hidden('emailfromname', $interviewerDataView->fname .' '.$interviewerDataView->lname,array('class' => 'form-control','placeholder' => 'Enter Email'))
                                                    }}
                                                        <div class="form-group">
                                                            {{ Form::submit('SEND TEST EMAIL',array('class' => 'btn btn-warning')) }}
                                                        </div>
                                                    </div>
                                                    {!! Form::close() !!}
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
                                <td>


@if($interviewerDataView->available_status == '1')
<a href="{{ url("interviewer/deactive")}}/{{$interviewerDataView->addinterviewerid}}"
class="label label-success">ACTIVE</a>


@else 
<a href="{{ url("interviewer/active")}}/{{$interviewerDataView->addinterviewerid}}"
class="label label-danger">DEACTIVE</a>

@endif
                              
                                </td>

                                <td>

                                    <a href="{{ url("add-reserved-time")}}/{{$interviewerDataView->addinterviewerid}}"
                                        class="label label-primary">ADD RESERVED TIME <i
                                        class="fa fa-pencil "></i></a>
                                                                      

                                    <a href="{{ url("view-interviewer")}}/{{$interviewerDataView->addinterviewerid}}"
                                        class="label label-warning">EDIT <i
                                        class="fa fa-pencil "></i> / VIEW <i
                                        class="fa fa-eye "></i></a>
                                    


                                    <a data-toggle="modal"
                                    data-target="#modal-view-delete-{{ $interviewerDataView->addinterviewerid}}"
                                    class="label label-danger">DELETE <i
                                    class="fa fa-trash "></i></a>

                                <div class="modal modal-danger fade"
                                    id="modal-view-delete-{{ $interviewerDataView->addinterviewerid}}"
                                    style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-contents">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Delete Interviewer</h4>
                                            </div>

                                            <div class="modal-body">
                                                    <a href="{{ url("delete-interviewer")}}/{{$interviewerDataView->addinterviewerid}}">
                                                        <span class="btn label-warning">Delete <i
                                                                class="fa fa-trash "></i></span></a>
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
                    <div class="px-10 py-0"> </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection