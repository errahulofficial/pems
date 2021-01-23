<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PEMS</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ url('theme/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ url('theme/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ url('theme/dist/css/AdminLTE.min.css') }}">
  <link rel="stylesheet" href="{{ url('theme/dist/css/skins/skin-blue.min.css') }}">
  <link rel="stylesheet" href="{{ url('theme/plugins/iCheck/square/blue.css') }}">
  <link rel="stylesheet"
    href="{{ url('theme/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">

  <style>
  .close{
  	color:white;
  	opacity:1;
  }
  .user-panel>.image>img{
  	max-height: 45px;
  }
  .font14{
	  font-size: 14px !important;
  }
  .timev{
	  font-size: 30px;
  }
  .timevis{
	  padding-top: 0px !important;
	  padding-bottom: 0px !important;
  }
    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
      color: #468847;
      background-color: #DFF0D8;
      border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
      color: #B94A48;
      background-color: #F2DEDE;
      border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
      margin: 2px 0 3px;
      padding: 0;
      list-style-type: none;
      font-size: 0.9em;
      line-height: 0.9em;
      opacity: 0;
      color: #B94A48;
      position: absolute;

      transition: all .3s ease-in;
      -o-transition: all .3s ease-in;
      -moz-transition: all .3s ease-in;
      -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
      opacity: 1;
      position: absolute;
    }

    .breadcrumb {
      margin-bottom: 0px
    }
    .bold-white{
      font-weight: bold; 
      color: white;
    }
	.right0 {
    right: 15px;
    display: flex;
    justify-content: flex-end;
    position: absolute;
    top: 51px;
	}
	
	@media (max-width:768px){
		.right0 {
			top: 102px;
			right: 10px;
		}
	}
	.rolefont{
		font-weight: 400 !important;
	}
	
	.posit{
		position: unset !important;
	}
  </style>
  {{-- custom css --}}
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style type="text/css">
    textarea {
      resize: none;
      width: 100%;
      min-height: 100px;
      max-height: 150px
    }
  </style>
  <script src="{{ url('theme/bower_components/jquery/dist/jquery.min.js') }}"></script>
  {{-- <script type="text/javascript" src="{{URL::asset('js/clock.js')}}"></script> --}}
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper posit">
    <!-- Main Header -->
    <header class="main-header">
      <!-- Logo -->
      <a href="{{ url('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b class='font14'>PEMS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>PEMS</b></span>
      </a>
      <!-- Header Navbar -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="{{ url('') }}" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="{{ url('') }}" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                @foreach($data as $profile)
                @if(!empty($profile->image_folder) && !empty($profile->image))
                <img src="{{ url($profile->image_folder) }}/{{ $profile->image }}" class="user-image" alt="User Image">
                @else
                <img src="{{ url('img/default.png') }}" class="user-image" alt="User Image">
                @endif
                @endforeach
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                @foreach($data as $profile)
                @if(!empty($profile->fname) && !empty($profile->lname))
                <span class="hidden-xs">{{$profile->fname}} {{$profile->lname}}</span>
                @endif
                @endforeach

              </a>
              <ul class="dropdown-menu">
                <!-- The user image in the menu -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a class="btn btn-default btn-flat" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                    </a>
                    <form action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            @foreach($data as $profile)
            @if(!empty($profile->image_folder) && !empty($profile->image))
            <img src="{{ url($profile->image_folder) }}/{{ $profile->image }}"
              class="img-circle" alt="User Image">
            @else
            <img style="border-radius: 50%" src="{{ url('img/default.png') }}" class="user-image" alt="User Image">
            @endif
            @endforeach
          </div>
          <div class="pull-left info">
            @foreach($data as $profile)
            @if(!empty($profile->fname) && !empty($profile->lname))
            <p>{{$profile->fname}} {{$profile->lname}}</p>
			<p class="rolefont">({{ucwords($profile->role)}})</p>
            @endif
            @endforeach
            <!-- Status -->

          </div>
        </div>
        <!-- Sidebar Menu -->
               <ul class="sidebar-menu" data-widget="tree">
          <li class="treeview">
            <a class="timevis"><span id="timediv" class="bold-white timev" style="padding-left:25px"></span></a>

          </li>
          <li class="treeview">
            <a class="timevis"><span class="bold-white timev" style="padding-left:25px">{{Carbon\Carbon::today()->format('d.m.Y')}}</span></a>

          </li>
          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-home"></i><span>Home</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ url('') }}">Landing Page</a></li>
              <li class="{{ Request::path() == 'profile' ? 'active' : '' }}"><a href="{{ url('profile') }}">Account & Personal Info</a></li>
              @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'salesperson' || Auth::user()->role == 'salesmanager' || Auth::user()->role == 'hr')
              <li class=" {{ Request::path() == 'email-skype-info' ? 'active' : '' }}"><a href="{{ url('email-skype-info') }}">Email and Skype Info</a></li>
              @endif
			  @if (Auth::user()->role == 'salesperson')
			  <li class=" {{ Request::path() == 'terms-conditions' ? 'active' : '' }}"><a href="{{ url('terms-conditions') }}">Terms & Conditions</a></li>
		  	  <li class=" {{ Request::path() == 'reports' ? 'active' : '' }}"><a class="color-success" href="{{ url('reports') }}"><b>My Reports</a></b></li>
			  @endif
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
		  
              @if (Auth::user()->role == 'salesmanager' || Auth::user()->role == 'salesperson')
		   <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-users"></i><span>My Team</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
			 @if (Auth::user()->role == 'salesmanager')
              <li class=" {{ Request::path() == 'myteam' ? 'active' : '' }}"><a href="{{ url('myteam') }}">Team Members</a></li>
			  @endif
			   @if (Auth::user()->role == 'salesperson')
			    <li><a href="{{ url('my-manager') }}">My Sales Manager</a></li>
			   @endif
              <li class=" {{ Request::path() == 'my-territory' ? 'active' : '' }}"><a href="{{ url('my-territory') }}">My Territory</a></li>
			   @if (Auth::user()->role == 'salesmanager')
              <li class=" {{ Request::path() == 'sales-blog' ? 'active' : '' }}"><a href="{{ url('sales-blog') }}">My Team Blog</a></li>
			  <li><a href="{{ url('view-smblog') }}">View Blogs</a></li>
              <li class=" {{ Request::path() == 'sales-panel' ? 'active' : '' }}"><a href="{{ url('sales-panel') }}">Sales Panel</a></li>
			  @endif
			  </a>
              </li>
            </ul>
          </li>
		  @endif
		  @if (Auth::user()->role == 'salesmanager')
		    <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-bar-chart"></i><span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{ Request::path() == 'sales-reports' ? 'active' : '' }}"><a href="{{ url('sales-reports') }}">Team Reports</a></li>
             
			  </a>
              </li>
            </ul>
          </li>
		  @endif
		  @if (Auth::user()->role == 'superadmin')
		    <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-bar-chart"></i><span>Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{ Request::path() == 'sales-reports' ? 'active' : '' }}"><a href="{{ url('sales-reports') }}">Reports</a></li>
             
			  </a>
              </li>
            </ul>
          </li>
		  @endif
		  
		  @if (Auth::user()->role == 'salesperson')
			  <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-bullhorn"></i><span>My Markets</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{ Request::path() == 'projects' ? 'active' : '' }}"><a href="{{ url('projects') }}">My Market Segments</a></li>
              <li class=" {{ Request::path() == 'projects' ? 'active' : '' }}"><a href="{{ url('projects') }}">My Exclusive Market Segments</a></li>
			  </a>
              </li>
            </ul>
          </li>
		  
		  <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-address-book"></i><span>My Contacts</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
		<li class=" {{ Request::path() == 'prospects' ? 'active' : '' }}"><a href="{{ url('prospects') }}">Add Contacts</a></li>
		<li class=" {{ Request::path() == 'contacts' ? 'active' : '' }}"><a href="{{ url('contacts') }}">Contacts</a></li>
		<li class=" {{ Request::path() == '1st-commit' ? 'active' : '' }}"><a href="{{ url('1st-commit') }}">1st Commitment</a></li>
		<li class=" {{ Request::path() == '2nd-commit' ? 'active' : '' }}"><a href="{{ url('2nd-commit') }}">2nd Commitment</a></li>
		<li class=" {{ Request::path() == 'side-dish' ? 'active' : '' }}"><a href="{{ url('side-dish') }}">Side Dish</a></li>
		<li class=" {{ Request::path() == 'marked-sold' ? 'active' : '' }}"><a href="{{ url('marked-sold') }}">Marked as Sold</a></li>
		<li class=" {{ Request::path() == 'marked-closed' ? 'active' : '' }}"><a href="{{ url('marked-closed') }}">Marked as Closed</a></li>
		</a>
              </li>
            </ul>
          </li>
		  @endif



          @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'hr')


          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-briefcase"></i><span>Recruitment</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{ Request::segment(1) == 'interviews' ? 'active' : '' }}"><a href="{{ url('interviews') }}">Interviews</a></li>
              <li class=" {{ Request::path() == 'add-interviewer' ? 'active' : '' }}"><a href="{{ url('add-interviewer') }}">Add Interviewers</a></li>
              <li class=" {{ Request::segment(1) == 'view-interviewers' || Request::segment(1) == 'view-interviewer' || Request::segment(1) == 'add-reserved-time' ? 'active' : '' }}"><a href="{{ url('view-interviewers') }}">View Interviewers</a></li>
              <li class=" {{ Request::path() == 'job-positions' ? 'active' : '' }}"><a href="{{ url('job-positions') }}">Job Positions</a></li>
              <li class=" {{ Request::segment(1) == 'interviews-status' || Request::segment(1) == 'interview-status' || Request::segment(1) == 'interview-status-email' ? 'active' : '' }}"><a href="{{ url('interviews-status') }}">Interview Statuses</a></li>
              {{--<li class=" {{ Request::path() == 'interviews-status' ? 'active' : '' }}"><a href="{{ url('interviews-status') }}">Interview Email Template</a></li>--}}
              <li class=" {{ Request::path() == 'applicants' ? 'active' : '' }}"><a href="{{ url('applicants') }}">Applicants</a></li>
              <li class=" {{ Request::path() == 'blacklist' ? 'active' : '' }}"><a href="{{ url('blacklist') }}">Blacklist</a></li>
              <li class=" {{ Request::path() == 'add-steps-page' ? 'active' : '' }}"><a href="{{ url('add-steps-page') }}">Add Steps Page</a></li>
              <li class=" {{ Request::path() == 'view-steps-page' ? 'active' : '' }}"><a href="{{ url('view-steps-page') }}">View Steps Page</a></li>
			  @if (Auth::user()->role == 'superadmin')
              <li class=" {{ Request::path() == 'portal' ? 'active' : '' }}"><a href="{{ url('portal') }}">Portals</a></li>
		  @endif
            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-users"></i><span>Employees</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
		<li class=" {{ Request::path() == 'employee' ? 'active' : '' }}"><a href="{{ url('employee') }}">Add New Employee</a></li>
		<li class=" {{ Request::path() == 'list-employee' ? 'active' : '' }}"><a href="{{ url('list-employee') }}">List of Employee</a></li>
		<li class=" {{ Request::path() == 'sales-team' ? 'active' : '' }}"><a href="{{ url('sales-team') }}"> Managers & Teams</a></li>
		@if (Auth::user()->role == 'superadmin')
			<li class=" {{ Request::path() == 'whoisonline' ? 'active' : '' }}"><a href="{{ url('whoisonline') }}"> Who Is Online?</a></li>
		@endif
            </ul>
          </li>
		  @endif
		  @if (Auth::user()->role == 'superadmin')
          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-rss"></i><span>Blog</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class=" {{ Request::path() == 'general-blog' ? 'active' : '' }}"><a href="{{ url('general-blog') }}">General Blog</a></li>
              <li class=" {{ Request::path() == 'add-blog' ? 'active' : '' }}"><a href="{{ url('add-blog') }}">Add Blog</a></li>
              <li class=" {{ Request::path() == 'view-blog' ? 'active' : '' }}"><a href="{{ url('view-blog') }}">View Blog</a></li>
            </ul>
          </li>

          @endif

          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-graduation-cap"></i><span>Training Materials</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
              <li class=" {{ Request::path() == 'sales-training-category' ? 'active' : '' }}"><a href="{{ url('sales-training-category') }}">Sales Training Category</a></li>
              <li class=" {{ Request::path() == 'add-sales-training' ? 'active' : '' }}"><a href="{{ url('add-sales-training') }}">Add Sales Training</a></li>
              @endif
              <li class=" {{ Request::path() == 'sales-training' ? 'active' : '' }}"><a href="{{ url('sales-training') }}">Sales Training</a></li>

              @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
              <li class=" {{ Request::path() == 'recruitment-training-category' ? 'active' : '' }}"><a href="{{ url('recruitment-training-category') }}">Recruitment Training Category</a></li>
              <li class=" {{ Request::path() == 'add-recruitment-training' ? 'active' : '' }}"><a href="{{ url('add-recruitment-training') }}">Add Recruitment Training</a></li>
              @endif

              <li class=" {{ Request::path() == 'recruitment-training' ? 'active' : '' }}"><a href="{{ url('recruitment-training') }}">Recruitment Training</a></li>

            </ul>
          </li>
          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-globe"></i><span>Resources</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('') }}">Downloads</a></li>
              <li><a href="{{ url('') }}">Recordings</a></li>
              <li><a href="{{ url('') }}">Achieves</a></li>
            </ul>
          </li>


          <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-support"></i><span>Support</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a target="_blank" href="https://neovora.freshdesk.com/support/home">Contact</a></li>
            </ul>
          </li>
		  @if (Auth::user()->role == 'superadmin')
		   <li class="treeview">
            <a href="{{ url('') }}"><i class="fa fa-map"></i><span>Add Locations</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
		<li class=" {{ Request::path() == 'locations' ? 'active' : '' }}"><a href="{{ url('locations') }}">Add/View Locations</a></li>
		<li class=" {{ Request::path() == 'divisions' ? 'active' : '' }}"><a href="{{ url('divisions') }}">Add/View Divisions</a></li>
		<li class=" {{ Request::path() == 'counties' ? 'active' : '' }}"><a href="{{ url('counties') }}">Add/View Counties</a></li>
		<li class=" {{ Request::path() == 'regions' ? 'active' : '' }}"><a href="{{ url('regions') }}">Add/View Regions</a></li>

            </ul>
          </li>
		  @endif

        </ul>
        <!-- /.sidebar-menu -->
      </section>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      <nav class="container-fluid d-flex">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            @if (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin')
            <strong> Administration Panel </strong>
			@elseif (Auth::user()->role == 'salesmanager')
            <strong> Sales Manager Panel </strong>
			@elseif (Auth::user()->role == 'salesperson')
            <strong> Sales Person </strong>
			@elseif (Auth::user()->role == 'hr')
            <strong> HR </strong>
            @elseif (Auth::user()->role == 'applicant')
            <strong> Applicant Panel </strong>
            @else
            <strong> User Panel </strong>
            @endif
          </li>
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          @foreach (Request::segments() as $req)
          <li class="breadcrumb-item active"><a href="{{ url($req)  }}">
              {{ucwords(str_replace('-',' ',$req))}}
            </a>
          </li>
          @endforeach
        </ol>
		
      </nav>
	  @if ($admin == '1' && Auth::user()->role != 'superadmin')
	  <div class="right0">
		<a href="{{ url('impersonate') }}/1" class="btn btn-success">Back to SuperAdmin</a>
		</div>
@endif
      <section class="content container-fluid">

        @yield('content')
      </section>
    </div>
    <footer class="main-footer">
      <strong>Copyright &copy; {{ date("Y") }} <a href="{{ url('') }}">PEMS</a>.</strong> All rights reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
  </div>

  <script src="{{ url('theme/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('theme/dist/js/adminlte.min.js') }}"></script>
  <script src="{{ url('theme/plugins/iCheck/icheck.min.js') }}"></script>



  <script>
    $(function () {
$('input').iCheck({
checkboxClass: 'icheckbox_square-blue',
radioClass: 'iradio_square-blue',
increaseArea: '20%' /* optional */
});
});

  //Date picker
    // $('#from_date').datepicker({
    //   autoclose: true,
    //   format: 'dd-mm-yyyy'
    // })
    //  //Date picker
    //  $('#to_date').datepicker({
    //   autoclose: true,
    //   format: 'dd-mm-yyyy'
    // })

  </script>
  <!-- CK Editor -->
  <script src="{{ url('theme/bower_components/ckeditor/ckeditor.js') }}"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="{{ url('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
  {{-- <script>
    $(function () {
      // CKEDITOR.replace('editorblog')
      // $('.textarea').wysihtml5();
    })
  </script> --}}

  <script src="https://parsleyjs.org/dist/parsley.min.js"></script>
  <script>
    $('#form').parsley();
  </script>
<script>
  var interval = setInterval(timestamphome, 1000);
    function timestamphome(){
    var date;
    date = new Date();
    var time = document.getElementById('timediv'); 
    time.innerHTML = date.toLocaleTimeString();
    }
</script>

<script>
$(document).ready(function(){
    $('.treeview-menu li.active').parent().closest('li').addClass('active').addClass('menu-open');
});
</script>
</body>

</html>