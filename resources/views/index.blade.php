@extends('master')
@section('content')
<style>
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

        <div class="col-md-7">
            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
            <div class="row">

                <div class="col-md-4 col-6 text-center my-10">
                    <a href="{{url('')}}/interviews">
                        <img src="{{url('img/recruitment.png')}}" alt="">
                        <p>Recruitment</p>
                    </a>
                </div>
                <div class="col-md-4 text-center my-10">
                    <a href="{{url('')}}/list-employee">
                        <img src="{{url('img/myteam.png')}}" alt="">
                        <p>Employees</p>
                    </a>
                </div>
                <div class="col-md-4 col-2 text-center my-10">
                    <a href="{{url('')}}/view-blog">
                        <img src="{{url('img/blog.png')}}" alt="">
                        <p>Blog</p>
                    </a>
                </div>


            </div>
			
				
            <div class="row">
                <div class="col-md-4 col-2 text-center my-10">
                    <a href="{{url('')}}/sales-training">
                        <img src="{{url('img/fasttrack.png')}}" alt="">
                        <p>Training Materials</p>
                    </a>
                </div>
                <div class="col-md-4 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="{{url('img/support.png')}}" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
                <div class="col-md-12" style="font-weight:bold; border-top:2px solid grey; padding-top:5px">
                <a href="{{url('')}}/whoisonline" >Who is Online?</a>
                </div>
            @endif
			
			 @if (Auth::user()->role == 'salesperson' || Auth::user()->role == 'salesmanager')
            <div class="row">

                <div class="col-md-3 col-6 text-center my-10">
                    <a href="{{url('')}}/sales-training">
                        <img src="{{url('img/getstarted.png')}}" alt="">
                        <p>Get Start</p>
                    </a>
                </div>
				@if (Auth::user()->role == 'salesperson')
                <div class="col-md-3 text-center my-10">
                    <a href="{{url('')}}/email-skype-info">
                        <img src="{{url('img/myaccount.png')}}" alt="">
                        <p>My Account</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/my-manager">
                        <img src="{{url('img/myteam.png')}}" alt="">
                        <p>My Team</p>
                    </a>
                </div>
				@endif
				@if (Auth::user()->role == 'salesmanager')
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/myteam">
                        <img src="{{url('img/myteam.png')}}" alt="">
                        <p>My Team</p>
                    </a>
                </div>
				@endif
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/sales-training">
                        <img src="{{url('img/training.png')}}" alt="">
                        <p>Training</p>
                    </a>
                </div>
				 @if (Auth::user()->role == 'salesperson')
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/projects">
                        <img src="{{url('img/mymarket.png')}}" alt="">
                        <p>My Markets</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/contacts">
                        <img src="{{url('img/prospects.png')}}" alt="">
                        <p>My Prospects</p>
                    </a>
                </div>
				@endif
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/resources">
                        <img src="{{url('img/resources.png')}}" alt="">
                        <p>Resources</p>
                    </a>
                </div>
                <div class="col-md-3 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="{{url('img/support.png')}}" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
            @endif
			
			 @if (Auth::user()->role == 'hr')
            <div class="row">

                <div class="col-md-3 col-6 text-center my-10">
                    <a href="{{url('')}}/applicants">
                        <img src="{{url('img/myteam.png')}}" alt="">
                        <p>Applicants</p>
                    </a>
                </div>
                <div class="col-md-3 text-center my-10">
                    <a href="{{url('')}}/interviews">
                        <img src="{{url('img/calendar.png')}}" alt="">
                        <p>Interviews</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/view-interviewers">
                        <img src="{{url('img/interviewers.png')}}" alt="">
                        <p>Interviewers</p>
                    </a>
                </div>
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/job-positions">
                        <img src="{{url('img/getstarted.png')}}" alt="">
                        <p>Job Positions</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="{{url('')}}/interviews-status">
                        <img src="{{url('img/statuses.png')}}" alt="">
                        <p>Interviews Status</p>
                    </a>
                </div>
                
                <div class="col-md-3 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="{{url('img/support.png')}}" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
            @endif
			
		
        </div>
        <div class="col-sm-5" >
            <div class="col p-4">
                <div class="card p-20" style="background-color: #ffff0073;">
                    <strong>Latest News</strong>
					<br>
					@if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'hr')
						@foreach ($blog as $blog)
						
							<p>{!!$blog->descp!!}</p>
								<hr>
						@endforeach
						
					@elseif (Auth::user()->role == 'salesmanager')
						@foreach ($blog->where('sales_managers','1') as $blog)
						
							<p>{!!$blog->descp!!}</p>
									<hr>
						@endforeach
						
					@elseif (Auth::user()->role == 'salesperson')
						@foreach ($blog->where('retail_consultants','1') as $blog)
						
							<p>{!!$blog->descp!!}</p>
									<hr>
						@endforeach
						
					@endif
                </div>
                </a>
            </div>
			@if (Auth::user()->role == 'salesperson')
			<div class="col p-4">
                <div class="card p-20" style="background-color: #ffff0073;">
                    <strong>Sales Manager's Blog</strong>
					<br>
					
					
						@foreach ($smblog as $smblog)
						
							<p>{!!$smblog->description!!}</p>
									<hr>
						@endforeach
						
					
                </div>
                </a>
            </div>
			@endif
        </div>
		


@endsection