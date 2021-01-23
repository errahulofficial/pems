@extends('master')
@section('content')
<style>
        .float-right{
          float:right
        }
        </style>
<div class="col-md-12 d-flex ">
    <div class="row" style="width:100%">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">View Careers Steps</h3>
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

                @if($showdata == '0')
                <div class="row" style="width:100%;margin:10px 0">
                    <div class="col-md-12 form-group">
                        <label for="employeeName">Select Job Position to View Steps</label>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Link for Careers</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                @foreach ($jobPositions as $jobPositionsView)
                                <tr>
                                    <td>{{ $jobPositionsView->name}}</td>
                                   
                                    <td>


                                        <a data-toggle="modal"
                                            data-target="#modal-view-{{$jobPositionsView->jobPositionId}}"
                                            class="btn btn-primary">View Careers Link</a>


                                        <div class="modal modal-primary fade"
                                            id="modal-view-{{$jobPositionsView->jobPositionId}}" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Copy url link</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                            {{ Form::text('', url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token,array('class' => 'form-control','placeholder' => 'Copy URL'))}}
                                                            </div>
                                                        <a target="_blank" href="{{url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token}}">
                                                                    <h4 class="btn btn-warning">Go to URL</h4>
                                                        </a>
                                                         </div>
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


                                        @if($jobPositionsView->available_status == '1')
                                        <a data-toggle="modal"
                                        data-target="#modal-view-active-{{ $jobPositionsView->step_id}}"
                                        class="label label-success">ACTIVE</a>
                                        
                                        
                                        <div class="modal modal-danger fade"
                                            id="modal-view-active-{{ $jobPositionsView->step_id}}"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">DEACTIVE JOB POSITION</h4>
                                                    </div>
                                        
                                                    <div class="modal-body">
                                                            <a href="{{ url("careers_jobposition/deactive")}}/{{$jobPositionsView->step_id}}">
                                                                <span class="btn label-warning">Deactive</span></a>
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
                                        @else 
                                        <a data-toggle="modal"
                                        data-target="#modal-view-deactive-{{ $jobPositionsView->step_id}}"
                                        class="label label-danger">DEACTIVE</a>
                                        
                                        
                                        <div class="modal modal-success fade"
                                            id="modal-view-deactive-{{ $jobPositionsView->step_id}}"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">ACTIVE JOB POSITION</h4>
                                                    </div>
                                        
                                                    <div class="modal-body">
                                                            <a href="{{ url("careers_jobposition/active")}}/{{$jobPositionsView->step_id}}">
                                                                <span class="btn label-warning">Activate</span></a>
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
                                        
                                        @endif
                                    <td>
                                        <a class="btn btn-success"
                                        href="{{ url('view-steps-page') }}/{{$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token}}"> <i class="fa fa-eye"></i> </a>

                                        <a class="btn btn-danger"
                                        href="{{ url('view-steps-page') }}/delete/{{$jobPositionsView->step_id.'/'.$jobPositionsView->random_token}}"> <i class="fa fa-trash"></i> </a>
                        
                                   </td> 
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif
                @if($showdata == '1')

                @if(!empty($datafetch))
                @foreach($datafetch as $datafetchView)


                {!! Form::open(['action' => ['careersStepsPage@updatestepsall'.'',$datafetchView->step_id],'id'=>'form']) !!}
                {{ Form::token() }}

                <div class="row" style="width:100%;margin:10px 0">

                    <div class="col-md-4 form-group">
                        <label for="employeeName">Select Job Position</label>
                        {{ Form::select('job_position_id',$jobPositionsArray,NULL,array('class'=>'form-control','id'=>'jobposition','required'=>'true')) }}
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="false" class="collapsed">
                            <div class="box-header with-border">
                                   
                                <h4 class="box-title">
                                   
                                        Introduction
                                    
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                            
                            </div>
                        </a>
                            <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false">
                                <div class="box-body">
                                    <div class="form-group">
                                        <h4 for="video">Article</h4>
                                    </div>
                                    <div class="form-group">
                                        {{ Form::textarea('introduction',$datafetchView->introduction,array('class' => 'form-control ckeditor','placeholder' => 'Introduction','required'=>'true')) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->step1name != '')
                                       {{$datafetchView->step1name}}
                                       @else
                                       Step 1
                                       @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->step1Type == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->step1}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step1','https://vimeo.com/'.$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->step1Type == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->step1}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step1','https://www.youtube.com/watch?v='.$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->step1Type == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step1',$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Step 1 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname1','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype1',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed1">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>

                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->step2name != '')
                                       {{$datafetchView->step2name}}
                                       @else
                                       Step 2
                                       @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->step2type == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->step2}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step2','https://vimeo.com/'.$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->step2type == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->step2}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step2','https://www.youtube.com/watch?v='.$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->step2type == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step2',$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Step 2 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname2','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype2',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed2">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->step3name != '')
                                       {{$datafetchView->step3name}}
                                       @else
                                       Step 3
                                       @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->step3Type == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->step3}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step3','https://vimeo.com/'.$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->step3Type == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->step3}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step3','https://www.youtube.com/watch?v='.$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->step3Type == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step3',$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Step 3 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname3','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype3',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed3">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->step4name != '')
                                       {{$datafetchView->step4name}}
                                       @else
                                       Step 4
                                       @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->step4type == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->step4}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step4','https://vimeo.com/'.$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->step4type == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->step4}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step4','https://www.youtube.com/watch?v='.$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->step4type == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step4',$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Step 2 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname4','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype4',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed4">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname5 != '')
                                       {{$datafetchView->stepname5}}
                                       @else
                                       Step 5
                                       @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype5 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont5}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step5','https://vimeo.com/'.$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype5 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont5}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step5','https://www.youtube.com/watch?v='.$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype5 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step5',$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Step 5 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname5','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype5',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed5">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname6 != '')
                                       {{$datafetchView->stepname6}}
                                       @else
                                       Step 6
                                       @endif
                                       
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseSeven" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype6 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont6}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step6','https://vimeo.com/'.$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype6 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont6}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step6','https://www.youtube.com/watch?v='.$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype6 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step6',$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Step 6 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname6','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype6',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed6">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname7 != '')
                                    {{$datafetchView->stepname7}}
                                    @else
                                    Step 7
                                    @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseEight" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype7 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont7}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step7','https://vimeo.com/'.$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype7 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont7}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step7','https://www.youtube.com/watch?v='.$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype7 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step7',$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Step 7 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname7','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype7',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed7">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname8 != '')
                                    {{$datafetchView->stepname8}}
                                    @else
                                    Step 8
                                    @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseNine" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype8 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont8}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step8','https://vimeo.com/'.$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype8 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont8}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step8','https://www.youtube.com/watch?v='.$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype8 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('stepcont8',$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Step 8 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname8','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype8',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed8">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname9 != '')
                                    {{$datafetchView->stepname9}}
                                    @else
                                    Step 9
                                    @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseTen" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype9 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont9}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('stepcont9','https://vimeo.com/'.$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype9 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont9}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step9','https://www.youtube.com/watch?v='.$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype9 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step9',$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Step 9 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname9','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype9',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed9">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    @if($datafetchView->stepname10 != '')
                                    {{$datafetchView->stepname10}}
                                    @else
                                    Step 10
                                    @endif
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseEleven" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    @if($datafetchView->steptype10 == 'vimeo')
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/{{$datafetchView->stepcont10}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            {{ Form::text('step10','https://vimeo.com/'.$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                        </div>
                                    </div>
                                    @elseif($datafetchView->steptype10 == 'youtube')
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/{{$datafetchView->stepcont10}}"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        {{ Form::text('step10','https://www.youtube.com/watch?v='.$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Video URL')) }}
                                    </div>
                                    @elseif($datafetchView->steptype10 == 'text')
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            {{ Form::textarea('step10',$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Step 10 Content')) }}
                                        </div>
                                    @else
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        {{ Form::text('stepname10','',array('class' => 'form-control','placeholder' => 'Step Name')) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        {{ Form::select('steptype10',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control')) }}
                                    </div>
                                    <div class="form-group embed10">
                                        
                                    </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    
                                        Survey Questions
                                    
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           
                            </div>
                        </a>
                            <div id="collapseTwelve" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="question">Add Survey Questions</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Survey Header</label>
                                        {{ Form::textarea('header_text',$datafetchView->step5_header,array('class' => 'form-control ckeditor','placeholder' => 'Survey Header Text')) }}
                                    </div>
                                    <div class="form-group">
                                      <label for="video">Survey Footer</label>
                                      {{ Form::textarea('footer_text',$datafetchView->step5_footer,array('class' => 'form-control ckeditor','placeholder' => 'Survey Footer Text')) }}
                                  </div>
                                    {{Form::hidden('step5', $datafetchView->step5)}}
                                    <div class="form-group">
                                        {{ Form::text('question[]', '',array('class' => 'form-control','placeholder' => 'Question')) }}
                                    </div>
                                    <div id="TextBoxContainer">
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">

                                        <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                            data-original-title="Add more controls"><i
                                                class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More
                                            Fields&nbsp;</button>
                                    </div>
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
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                            @foreach ($question as $dataView)
                                            <tr>
                                                <td>{{ $dataView->question}}</td>
                                                <td style="text-align: center">
                                                    <a
                                                        href="{{ url("view-careers-questions")}}/{{ $dataView->questions_id}}">
                                                        <span class="label label-primary"> View <i
                                                                class="fa fa-eye"></i></span>
                                                    </a>
                                                    <a
                                                        href="{{ url("view-careers-questions")}}/{{ $dataView->questions_id}}">
                                                        <span class="label label-success"> Edit <i
                                                                class="fa fa-pencil"></i></span>
                                                    </a>
                                                    <a
                                                        href="{{ url("view-careers-questions/delete")}}/{{ $dataView->questions_id}}">
                                                        <span class="label label-danger"> Delete <i
                                                                class="fa fa-trash"></i></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <script src="https://code.jquery.com/jquery-latest.js"></script>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
                                </script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
                                </script>

                                <script>
                                    $(function () {
                        $("#btnAdd").bind("click", function () {
                            var div = $("<div />");
                            div.html(GetDynamicTextBox(""));
                            $("#TextBoxContainer").append(div);
                        });
                        $("body").on("click", ".remove", function () {
                            $(this).closest("div").remove();
                        });
                        });
                         function GetDynamicTextBox(value) {
                          return '<div class="form-group" style="position:relative" >{{ Form::text("question[]", "",array("class" => "form-control","placeholder" => "Question","required"=>"true"))  }} <span style="position:absolute;right:0;top:0" class="btn btn-danger remove">remove</span> </div>'
                         }
                                </script>
                            </div>
                        </div>
                        <div class="row" style="width:100%;margin-top:20px">
                            <div class="form-group col-md-12">
                                {{ Form::submit('Save',array('class' => 'btn btn-success')) }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                {!! Form::close() !!}
                @endforeach

                @endif


                @endif
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</div>
@if($showdata == '1')
@foreach($jobPositionsName as $jobPositionsNameView)
<script>
    $('#jobposition').prepend($("<option selected></option>").attr("value",'{{$jobPositionsNameView->jobPositionId}}').text('{{$jobPositionsNameView->name}}')); 
</script>
@endforeach

@endif

<script>
    $(document).ready(function () {
    for (let index = 1; index <= 10; index++) {
      
      $('select[name="steptype'+index+'"]').change(function () {
        
        console.log($(this).val());
        if($(this).val() == 'text')
        {
          var text = '<label for="video">Enter Text</label><textarea id="step'+index+'" name="step'+index+'" class="form-control ckeditor" placeholder="Article"></textarea>';
          $('.embed'+index).empty();
          $('.embed'+index).append(text);
        }
        if($(this).val() == 'video')
        {
          var video = '<label for="video">Enter Vimeo/Youtube Video URL</label><input type="text" name="step'+index+'" class="form-control" placeholder="Video URL">';
          $('.embed'+index).empty();
          $('.embed'+index).append(video);
        }
        if($(this).val() == '0')
        {
          $('.embed'+index).empty();
        }
      });
    } 
  });
    </script>

@endsection