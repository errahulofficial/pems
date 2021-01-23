@extends('careers_views/master')
@section('content')
<style>
    .required-field::after {
  content: "*";
  color: red;
  margin-left:2px
}
    .required-file::after {
  content: "*  (max_file_size: 5MB) (file_type: docs, pdf) ";
  color: red;
  margin-left:2px
}
</style>
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
                <h3 class="box-title">Hello there and thank you for applying!</h3>
                <p>We need to schdule your interview with the appropriate manager in your area, so please enter in your name, phone number, contact email, and zip code so we can send this interview to the appropriate manager in your area. </p>
            <p>We are looking forward to our interview with you!</p>
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
            {!! Form::open(['action' => ['careers_controller@continue',$id,$random_token],'files'=>'true']) !!}
            {{ Form::token() }}
            <div class="box-body">
                <div class="row">
				@if ($refer != '')
				{{ Form::hidden('refer',$refer,array('class' => 'form-control','placeholder'
                        => 'refer')) }}
						@endif
                    <div class="col-md-6 form-group">
                        <label for="fname" class="required-field">First Name</label> {{ Form::text('fname', '',array('class' => 'form-control','placeholder'
                        => 'First Name')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lname" class="required-field">Last Name</label> {{ Form::text('lname', '',array('class' => 'form-control','placeholder'
                        => 'Last Name')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email" class="required-field">Email</label> {{ Form::text('email', '',array('class' => 'form-control','placeholder'
                        => 'Email')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone" class="required-field">Best Phone</label> {{ Form::text('phone', '',array('class' => 'form-control','placeholder'
                        => 'Best Phone')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="zipcode" class="required-field">Zip Code</label> {{ Form::text('zipcode', '',array('class' => 'form-control','placeholder'
                        => 'Zip Code')) }}
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city" class="required-field">City</label> {{ Form::text('city', '',array('class' => 'form-control','placeholder'
                        => 'City')) }}
                    </div>
                    <div class="col-md-6 form-group">
                            <label for="state" class="required-field">State</label> {{ Form::text('state', '',array('class' => 'form-control','placeholder'
                            => 'State')) }}
                        </div>
                    <div class="col-md-6 form-group">
                        <label for="name" class="required-file">Your Resume</label> {{ Form::file('resume',array('class' => 'form-control','placeholder'
                        => 'Name')) }}
                    </div>
                  </div>
                <div class="form-group d-flex">
                    {{ Form::submit('Continue',array('class' => 'btn btn-primary')) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection