@extends('master') 
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{ url('theme/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<style>

.bgc3c3c387{
	background:#c3c3c387;
}

.modal-dialog{
	width:900px
}
.bor-box{
	border: 1px solid white;
	padding: 4px;
}
.font-24{
	font-size: 24px;
	font-weight: bold;
}
.schedule{
	text-align:center;
    position: absolute;
    right: 0;
    top: 50px;
	width:250px;
}
.pb-10{
	padding-bottom:5px;
	padding-top:5px
}
.bold{
	font-weight: bold;
}
.det{
	font-size: 15px;
	padding-right:50px;
}
.with-border {
    border-bottom: 1px solid #d2d2d2;
}
.nav-tabs {
    border-bottom: none;
}
.w-fit{
	width: max-content;
}
a.nav-link.active {
    background: #3c8dbc;
    color: white;
}
	a.nav-link.active:hover {
    background: #3c8dbc;
    color: white;
}

@media screen and (max-width : 991px){
	.schedule{
		text-align:center;
		position: relative;
		right: 0;
		top: 0px;
		width:100%;
}
.j_center{
	justify-content: center;
}
}
</style>
<div class="col">
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
<div class="col d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">My Local Market Segments</h3>
        </div>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link" href="{{url('projects')}}">Market Segments ({{$project->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('prospects')}}">Add Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('contacts')}}">Contacts ({{$prospect->where('commit_stage', '0')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('1st-commit')}}">1st Commits ({{$prospect->where('commit_stage', '1')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="{{url('2nd-commit')}}">2nd Commits ({{$prospect->where('commit_stage', '2')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('side-dish')}}">Monitoring ({{$prospect->where('commit_stage', '3')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('marked-sold')}}">Marked as Sold ({{$prospect->where('commit_stage', '4')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="{{url('marked-closed')}}">Marked as Closed ({{$prospect->where('commit_stage', '5')->count()}})</a>
			  </li>
			</ul>
    </div>
</div>
<div class="col">
@foreach ($prospect->where('commit_stage', '5') as $prospect)
    <div class="box box-success">
       <div class="box-header with-border d-flex align-items-center">
	   
		<h4 class='bold'><i class="fa fa-globe"></i> {{ $prospect->website}}</h4>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link" href="tel:{{$prospect->contact_phone}}"><i class="fa fa-user"></i> Link</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="javascript:popw='';popw = window.open('http://mail.google.com/?view=cm&fs=1&tf=1&to={{$prospect->contact_email}}','Compose Mail','scrollbars=auto,width=800,height=700,top=80,left=175,status=yes,resizable=yes,toolbar=no');if (!document.all) T = setTimeout('popw.focus()',50);void(0);"><i class="fa fa-envelope"></i> Send Mail</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('contacts')}}"><i class="fa fa-star"></i> Grades</a>
			  </li>
			 
			</ul>
			
        </div>
		 <div class="box-header align-items-center">
		<ul class="nav nav-tabs pb-10">
			  <li class="">
				<span class="det bold"><i class="fa fa-id-card"></i> {{$prospect->contact_name}} {{$prospect->contact_surname}} </span>
			  </li>
			  <li class="">
				<span class="det"><i class="fa fa-phone"></i>  {{$prospect->contact_phone}}  </span>
			  </li>
			  <li class="">
				<span class="det"><i class="fa fa-envelope"></i>  {{$prospect->contact_email}}  </span>
			  </li>
			</ul>
			<ul class="nav nav-tabs">
			  <li class="">
				<span class="det "><i class="fa fa-building"></i> {{$prospect->company_name}} </span>
			  </li>
			  <li class="">
				<span class="det"><i class="fa fa-address-card"></i>  {{$prospect->company_address}}  </span>
			  </li>
			  <li class="">
				<span class="det"><a href="#" ><i class="fa fa-map-marker"></i>  Show on Map/ View Route </a> </span>
			  </li>
			</ul>
			</div>
			
			<div class="box-body with-border align-items-center">
		<ul class="nav nav-tabs">
			  <li>
				<span class="det "> {{$prospect->project_name}} </span>
			  </li>
			  <li>
				<div class="col-12 form-group det">
                        {{ Form::select('city', array('Daily Social Influence ™'),'',array('class' => 'form-control','required'=>'true')) }}
                    </div>
			  </li>
			  <li>
				<span class="det"><a href=""> <i class="fa fa-link"></i> Buy Link  </a></span>
			  </li>
			</ul>
			
			<div class="schedule ">
			
			 <div class="pb-10 bgc3c3c387">
			@if ($prospect->commit_schedule == "")
				<span class=""> <a data-toggle="modal" data-target="#modal-schedule-{{$prospect->id}}"><i class="fa fa-calendar" aria-hodden="true"></i> No Appointment Scheduled </a> </span>
			 @else
				 <span class=""> <a data-toggle="modal" data-target="#modal-schedule-{{$prospect->id}}"><i class="fa fa-calendar" aria-hodden="true"></i> Last Appointment was in </a> </span>
			 @endif
			 </div>
			 @if (time() < $prospect->commit_schedule && date('dmo',time()) != date('dmo',$prospect->commit_schedule))
				<div class='d-flex alert-success j_center pb-10'>
			 @elseif (date('dmo',time()) == date('dmo',$prospect->commit_schedule))
			 <div class='d-flex alert-danger j_center pb-10'>
			 @else
				  <div class='d-flex bgc3c3c387 j_center pb-10'>
			 @endif
			 <div class="col-md-5">
			 <b>{{date('l', $prospect->commit_schedule)}}</b>
			 </div>
			 <div class="col-md-7">
			  <b>{{date('F , o', $prospect->commit_schedule)}}</b>
			  
			</div>
			 </div>
			  @if (time() < $prospect->commit_schedule  && date('dmo',time()) != date('dmo',$prospect->commit_schedule))
				<div class='d-flex alert-success j_center pb-10'>
			 @elseif (date('dmo',time()) == date('dmo',$prospect->commit_schedule))
			 <div class='d-flex alert-danger j_center pb-10'>
			 @else
				  <div class='d-flex bgc3c3c387 j_center pb-10'>
			 @endif
			 <div class="col-md-5 font-24">
			{{date('jS', $prospect->commit_schedule)}}
			 </div>
			 <div class="col-md-7 font-24">
			  {{date('h:i A', $prospect->commit_schedule)}}
			  </div>
			 </div>
			 <div class="col-md-12 bgc3c3c387">
			 @if ($prospect->commit_confirm == '1')
			 {{'Confirmed Phone Commitment'}}
			 @elseif ($prospect->commit_confirm == '2')
			 {{'Confirmed Personal Commitment'}}
			 @elseif ($prospect->commit_confirm == '3')
			 {{'Call Again'}}
			 @else
			 {{''}}
			 @endif
			 </div>
			</div>
			</div>
			<div class="box-footer with-border d-flex align-items-center">
		<ul class="nav nav-tabs">
			  <li>
				<span class="det "> <a data-toggle="modal" data-target="#modal-schedule-{{$prospect->id}}"><i class="fa fa-calendar" aria-hodden="true"></i> Change Prospecting Stage </a> </span>
			  </li>
			  <li>
				<span class="det "> <a href=""><i class="fa fa-clock-o" aria-hodden="true"></i> Send Reminder </a> </span>
			  </li>
			  <li>
				<span class="det"><a href="{{url('contact-del')}}/{{$prospect->id}}"> <i class="fa fa-trash" aria-hodden="true"></i> Delete  </a></span>
			  </li>
			</ul>
			
			</div>
			
			 <div class="modal modal-danger fade" id="modal-schedule-{{$prospect->id}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Change Prospecting Stage</h4>
                </div>
				<div class="modal-body">
        {!! Form::open(['action' => ['ProspectsController@update',"".$prospect->id],'id'=>'form']) !!} 
        {{ Form::token() }}
				<!--{{ Form::text('project_id', '' ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true')) }}
				
				{{ Form::text('created_by', '' ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true')) }}-->
				@if ($prospect->commit_stage != "0")
            <div class="col-md-12 form-group">
			<h4>Current Commitment Status</h4>
               <label class="radio">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_complete', '0', false) }}
					Appointment Canceled (Absence / Rescheduled)
					</label>
					<label class="radio">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_complete', '1', false) }}
					Commitment Completed
					</label>

            </div>
			@endif
			<div class="col-md-12 form-group">
			<h4>Switch Contact To</h4>
               <label class="radio">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_stage', '0', false) }}
					 Do not change
					</label>
					</div>
					
					<div class="col-md-12">
					<div class="bor-box">
					<div class="d-flex">
					<div class="col-md-6">
					<label class="radio">
					{{ Form::radio('commit_stage', '1', false) }}
					1st Commitment
					
					</label>
					</div>
					<div class="col-md-6">
					{{ Form::select('commit_confirm', array('1'=> 'Confirmed Phone Commitment','2'=> 'Confirmed Personal Commitment','3'=> 'Call again'),'',array('class' => 'form-control','placeholder' => '- Select Type of Appointment -')) }}
					</div>
					
					</div>
					<div class="d-flex">
					<div class="col-md-6">
					<label class="radio">
					{{ Form::radio('commit_stage', '2', false) }}
					2nd Commitment
					
					</label>
					</div>
					<div class="col-md-2">
					{{ Form::text('commit_schedule_date', date("d-m-Y"),array('class' => 'form-control','id'=>'to_date','placeholder' => 'To Date')) }}
					</div>
					<div class="col-md-4 d-flex">
					{{ Form::select('commit_schedule_hrs', array('01'=> '01','02'=> '02','03'=> '03','04'=> '04','05'=> '05','06'=> '06','07'=> '07','08'=> '08','09'=> '09','10'=> '10','11'=> '11','12'=> '12'),'',array('class' => 'form-control','placeholder' => '-Hour-')) }}
					{{ Form::select('commit_schedule_min', array('00'=> '00','01'=> '01','02'=> '02','03'=> '03','04'=> '04','05'=> '05','06'=> '06','07'=> '07','08'=> '08','09'=> '09','10'=> '10','11'=> '11','12'=> '12','13'=> '13','14'=> '14','15'=> '15','16'=> '16','17'=> '17','18'=> '18','19'=> '19','20'=> '20','21'=> '21','22'=> '22','23'=> '23','24'=> '24','25'=> '25','26'=> '26','27'=> '27','28'=> '28','29'=> '29','30'=> '30','31'=> '31','32'=> '32','33'=> '33','34'=> '34','35'=> '35','36'=> '36','37'=> '37','38'=> '38','39'=> '39','40'=> '40','41'=> '41','42'=> '42','43'=> '43','44'=> '44','45'=> '45','46'=> '46','47'=> '47','48'=> '48','49'=> '49','50'=> '50','51'=> '51','52'=> '52','53'=> '53','54'=> '54','55'=> '55','56'=> '56','57'=> '57','58'=> '58','59'=> '59','60'=> '60'),'',array('class' => 'form-control','placeholder' => '-Min-')) }}
					{{ Form::select('commit_schedule_am', array('am'=> 'AM','pm'=> 'PM'),'',array('class' => 'form-control')) }}
					</div>
					</div>
					</div>
					</div>
					
					<div class="col-md-6 form-group">
					<label class="radio pb-10">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_stage', '3', false) }}
					Side Dish
					</label>
					<label class="radio pb-10">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_stage', '4', false) }}
					Marked as Sold
					</label>
					<label class="radio pb-10">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_stage', '5', false) }}
					Marked as Closed
					</label>
					<label class="radio pb-10">
					<span class="icons"><span class="first-icon fui-radio-unchecked"></span><span class="second-icon fui-radio-checked"></span></span>
					{{ Form::radio('commit_stage', '6', false) }}
					Move To DNC
					</label>
            </div>
			
			<div class="col-md-6 form-group">
					<div class="form-group">
                <label for="title">Title</label> {{ Form::text('title', '',array('class' => 'form-control','placeholder'
                => 'Title')) }}

            </div>
            <div class="form-group">
                <label for="descp">Description</label> {{ Form::textarea('description', '',array('class' => 'form-control','placeholder'
                => 'Description', 'rows'=>'3')) }}
            </div>

            </div>
			
			
		
                  <div class="form-group text-center">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
       
              </div>
			  @endforeach
	  </div>
	  
	  <script type="text/javascript">
$('#to_date').datepicker({
	autoclose:true,
	format:'dd-mm-yyyy'
});
</script>

@endsection