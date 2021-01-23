@extends('master')
@section('content')
<div class="col-md-6">
  
  <div class="box box-primary">
    <div class="box-header with-border d-flex align-items-center">
      <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Job positions edit</h3>
      <span class="col-xs-6 text-right p-0" ><a class="btn btn-primary" href="{{ url('job-positions') }}">Add/View Job position Steps</a></span>
    </div>

    <div class="col-md-12">
 @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $error }}</li>
                        </ul>
                    </div>
                    @endforeach
                    @if (Session::has("success"))
                    <div class="alert alert-success">
                        <ul>
                            <li>{{ Session::get("success") }}</li>
                        </ul>
                    </div>
                    @endif
    </div>
    @foreach ($job as $jobview)
   {!! Form::open(['action' => ['jobPositions@update',"".$jobview->jobPositionId]]) !!}
   {{ Form::token() }}
      <div class="box-body">
        <div class="form-group">
          <label for="name">Name</label>
          {{ Form::text('name', $jobview->name,array('class' => 'form-control','placeholder' => 'Name')) }}
       
        </div>
        {{-- <div class="form-group">
                <label for="timespan">Time Span (minutes)</label>
                {{ Form::number('timespan', $jobview->timespan,array('class' => 'form-control','placeholder' => 'Time Span')) }}
             
              </div> --}}
         <div class="form-group">
          <label for="desc">Desc</label>
          {{ Form::textarea('desc', $jobview->desc,array('class' => 'form-control','placeholder' => 'Desc')) }}
        </div>

        <div class="form-group">
            <label for="status">Status</label> {{ Form::text('status', $jobview->status,array('class' => 'form-control','placeholder' => 'Status'))
            }}
    
          </div>
        
        <div class="form-group">
          {{ Form::submit('UPDATE',array('class' => 'btn btn-primary')) }}
      </div>
    </div>
   {!! Form::close() !!}
   @endforeach
  </div>
</div>

@endsection