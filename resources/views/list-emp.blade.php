@extends('master') 
@section('content')
<style>
.red{
	color: red;
}
</style>
  @if (Session::has("success-delete"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success-delete") }}</li>
                </ul>
            </div>
            @endif
<div class="col-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0"><b>Employees List  &nbsp;</b>  [Total : {{$empcount->count()}}]</h3>
        </div>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link" href="{{url('list-employee')}}">Completed ({{$empcount->where('phone','!=', '')->where('city','!=', '')->where('state','!=', '')->where('zip','!=', '')->where('gender','!=', '')->where('home_address','!=', '')->where('role','!=','superadmin')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('not-completed')}}">Not Completed ({{$notcomp->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('not-register')}}"> Not registered ({{'0'}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('without-email')}}"> Without ABC Email ({{$empcount->where('email','')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active " href="{{url('without-skype')}}">Without Skype ({{$empcount->where('skypeid','')->count()}})</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="{{url('without-card')}}">Without Card ({{$empcount->where('resume','')->count()}})</a>
			  </li>
			 
			</ul>
    </div>
</div>
<div class="col-12 d-flex">
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
          
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Territory</th>
                        <th>LVL</th>
                        <th>Username</th>
						<th>Password</th>
						<th>Name / Email</th>
						<th>Last Login / Date Created</th>
						<th>ABC Email / Pass</th>
						<th>Skype ID / Pass</th>
						<th>Card</th>
                    </tr>
                    @foreach ($employee->where('role','!=','superadmin') as $employeeview)
                    <tr>
                        <td>{{''}}</td>
                        <td>{{ $employeeview->territory}}</td>
                        <td><b>
						@if ($employeeview->role == 'hr'){{'HR'}}
						@elseif ($employeeview->role == 'salesmanager'){{'SM'}}
						@elseif ($employeeview->role == 'salesperson'){{'RC'}}
						@else {{'NSD'}}</b></td>
                        @endif
                        <td>{{ ucwords($employeeview->fname) }} {{ ucwords($employeeview->lname) }}<br>
						<a href="{{ url('impersonate') }}/{{ $employeeview->id}}" class="label label-success"><i class="fa fa-unlock"></i> Login as </a> &nbsp;
                            <a data-toggle="modal" data-target="#modal-delete-{{ $employeeview->id}}" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-{{ $employeeview->id}}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="{{ url('employee-del') }}/{{ $employeeview->id}}"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                           
                        </td>
						<td>{{ $employeeview->password_text }}</td>
						<td>{{ ucwords($employeeview->fname) }} {{ ucwords($employeeview->lname)}}<br>{{ $employeeview->email }}
						</td>
						<td><span class="red">{{ $employeeview->last_login}}</span><br>{{ $employeeview->created_at}}</td>
						<td>{{ $employeeview->email}}<br>{{ $employeeview->password_text}}</td>
						<td>{{ $employeeview->skypeid}}<br>{{ $employeeview->password_text}}</td>
						<td>@php $docs_folder = $employeeview->resume_folder; $docs =
                            $employeeview->resume; $singledocs
                            = explode(',',$docs);
							@endphp 
							@foreach($singledocs as $singledocsView) @if(!empty($singledocsView))<a href="{{ url("$docs_folder/$singledocsView ")}}"><i class="fa fa-search"></i> <i class="fa fa-address-card"></i></a>
							@endif
							@endforeach
							<td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 py-0"> {{ $employee->links() }}</div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
@endsection