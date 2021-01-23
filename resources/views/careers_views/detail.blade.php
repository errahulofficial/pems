@extends('careers_views/master')
@section('content')
@if (Session::has("scheduled"))
        <div class="alert alert-success">
            <ul>
                <li>{{ Session::get("scheduled") }}</li>
            </ul>
        </div>
        @endif
<div class="col-md-8 m-auto" style="margin:auto;float:none">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interview Details</h3>
        </div>
        <div class="row" style="width:100%;margin:10px 0">
            <div class="form-group">
               
                <table class="table table-hover">
                    <tbody>
                        @foreach ($details as $det)
                        <tr>
							<h4>Interview Scheduled on:<b> {{ucwords($det->day)}} {{$det->interview_date}} at @if ($det->interview_time_select > 12){{$det->interview_time_select -12 }}:00 PM
							@else {{$det->interview_time_select}}:00 AM @endif </b></h4>
                        </tr>
                        <tr>
							<h4>Login Link:   Username : <b><a href="{{url('careers/login')}}">{{url('careers/login')}}</b><br></a></h4>
                        </tr>
						
						<tr>
							<h4>Login Details:<br>  
							Username : <b>{{$det->email}}</b><br>
							Password : <b>admin746#</b>
							</h4>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection