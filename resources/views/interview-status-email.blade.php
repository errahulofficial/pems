@extends('master')

@section('content')

<div class="col-md-12 d-flex">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interview Status Email</h3>
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
        @foreach($dataEmail as $datashow)
        {!! Form::open(['action' => ['interviewStatus@updateEmail'.'',$datashow->interviewstatusid]]) !!}
        {{ Form::token() }}
        <div class="box-body">

            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="Subject">Subject</label> {{ Form::text('emailSubject', $datashow->emailSubject,array('class' => 'form-control','placeholder'
                    => 'Subject')) }}
                </div>
               {{-- <div class="col-md-12 form-group">
                       {{ Form::checkbox('useInterviewerData','1',$datashow->useInterviewerData,array('class' => 'form-control')) }}  <label for="check"> Use Interviewer Email Address and Name as From Field and ignore the next fields</label> 
                    </div>--}}
              
                <div class="col-md-12 form-group">
                    <label for="EmailFromAddress">Email From Address</label> {{ Form::text('EmailFromAddress', $datashow->EmailFromAddress,array('class' => 'form-control','placeholder'
                    => 'Email From Address')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="EmailFromAddressPass">Email From Address Pass</label> {{ Form::text('EmailFromAddressPass', $datashow->EmailFromAddressPass,array('class' => 'form-control','placeholder'
                    => 'Email From Address Pass')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="EmailFromName">Email From Name</label> {{ Form::text('EmailFromName', $datashow->EmailFromName,array('class' => 'form-control','placeholder'
                    => 'Email From Name')) }}
                </div>
                <div class="col-md-12 form-group">
                    <label for="variables">Variables</label>
                    <b>
                        {first_name} {last_name} {from_name} {login_link} {login_username} {login_password}
                        {job_position} {interview_time}
                    </b>
                </div>
                <div class="col-md-12 form-group">
                    <label for="HTMLMessage">HTML Message</label>

                    @if(!empty($datashow->HTMLMessage))

                    {{ Form::textarea('HTMLMessage', $datashow->HTMLMessage,array('class' => 'form-control ckeditor','placeholder'
                    => 'HTML Message')) }}
               
               @else

               {{ Form::textarea('HTMLMessage', '',array('class' => 'form-control ckeditor','placeholder'
               => 'HTML Message')) }}

                  @endif



                </div>

                <div class="col-md-12 form-group">
                    <label for="TextMessage">Text Message</label>
                    {{ Form::textarea('TextMessage', $datashow->TextMessage,array('class' => 'form-control','placeholder'
                    => 'Text Message')) }}
                </div>


            </div>
            <div class="form-group d-flex">
                {{ Form::submit('ADD',array('class' => 'btn btn-primary')) }}
            </div>
        </div>
        {!! Form::close() !!}
        @endforeach
    </div>
</div>
@endsection