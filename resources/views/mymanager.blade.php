@extends('master')
@section('content')
<style>
.font-l{
	font-size: large;
}
.bg-y{
	background:#ffff0029;
}
.borderinfo{
	border: 1px solid #ffff0073;
}
bg-white{
	background: white;
}
    .text-center {
        text-align: center
    }

    .p-20 {
        padding-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-bottom: 1px;
    }
	.p-4 {
        padding: 4px;
    }
	hr{
		border-top: 1px solid #777;
	}
</style>
<div>
    @if (Session::has("rolesession"))
    <div class="alert alert-success">
        <p>{{ Session::get("rolesession") }}</p>
    </div>
    @endif
</div>
<div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
		
		<h3 class="box-title col-xs-6 d-flex align-items-center p-0"><b><i class="fa fa-user"></i> My Sales Manager</b></h3>
        </div>
		@foreach ($data as $data)
		
        <div class="col-md-6 p-20 bg-white">
		<p class=" p-4 borderinfo"><i class="fa fa-info-circle"></i> Use the information below to contact your Sales Manager</p>
           <h4><b>{{$data->fname}} {{$data->lname}} </b></h4>
		   
		   <p class="font-l p-4">Email :  <span class="p-20"><b>{{$data->email}}</b></span></p>
		   <p class="font-l p-4">Skype ID :  <span class="p-20"><b><a href="skype:{{$data->skypeid}}?chat">{{$data->skypeid}}</a></b></span></p>
        </div>
		
		
		<div class="col-md-6 p-20 bg-y">
		
           <h4><b>Hello everyone! </b></h4>
		   
		   <p>First of all, I would like to welcome everyone to our team. Please add me on skype <b>by clicking the button on the left.</b> Do not be a stranger! Ask me anytime about any problems you may encounter, either about prospects and sales or about the Neovora employee management system interface.</p>
		   <p>You can also use the <b>Support Center</b> to open a ticket and speak directly to a Neovora Employee Management System technical consultant.</p>
		   <p>Keep an eye on your home page, where I will post details about upcoming events and meetings, or general “know-how” and tips.</p>
		   <p>See you at our next meeting!</p>
        </div>
		
		@endforeach
		
</div>

<div class="col-md-12 p-20 bg-white">
<a href="{{url('')}}/email-skype-info">
<i class="fa fa-user"></i> Find your Skype ID and E-mail address information here</div>
</a>
@endsection