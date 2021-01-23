@extends('careers_views/master')
@section('content')

<div class="col-md-8 m-auto" style="margin:auto;float:none">
      
        @if (Session::has("blacklisted"))
        <div class="alert alert-warning">
            <ul>
                <li>{{ Session::get("blacklisted") }}</li>
            </ul>
        </div>
        @endif

        @if (Session::has("userexists"))
        <div class="alert alert-warning">
            <ul>
                <li>{{ Session::get("userexists") }}</li>
            </ul>
        </div>
        @endif

        

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Instruction text</h3>

     @foreach($jobPositionsGet as $jobPositionsGetView)
     <h3>{{$jobPositionsGetView->name}}</h3>
    @endforeach


@if(!$interviewStepsGet->isEmpty())

                    @foreach($interviewStepsGet as $interviewStepsGetView)
                   @if ( $interviewStepsGetView->stepno == 1)
                    <h5><i>{{$interviewStepsGetView->check_steps_name}}</i></h5>

                  

                    <p>{{$interviewStepsGetView->desc}}</p>

                    <div id="onTimeSelect">
                        <h4>Interview Start : {{$timevalue}}:00 (Timespan: ~{{$interviewStepsGetView->timespan}}min)</h4>
                       </div>
                       @endif
                    @endforeach
                    @else
                    No Step Assign
                    @endif

            <h2>Interview scheduled on {{$day}} {{$date}}</h2>
            <div class="form-group">

                <a href="{{url('careers/interview/scheduled')}}/{{$id}}/{{$random_token}}/{{$s_token}}">
                        {{ Form::submit('Schedule Interview',array('class' => 'btn btn-success')) }}
                </a>
                    
            <a href="{{url('careers/interview/cancel')}}/{{$id}}/{{$random_token}}/{{$s_token}}">
                      {{ Form::submit('Cancel Interview',array('class' => 'btn btn-danger')) }}
                </a>


            </div>

            
            </div>
            
           
        </div>
    </div>

@endsection