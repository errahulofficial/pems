@extends('master') 
@section('content')
<style>
#progress {
 width: 80%;   
 border: 1px solid black;
 position: relative;
 padding: 1px;
}
label{
	    white-space: nowrap !important;
    align-self: center !important;
	width:40%
}
	</style>
<div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <span class="box-title">Managers & Teams</span>
          

          
        
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
            @if (Session::has("success-delete"))
            <div class="alert alert-success">
                <ul>
                    <li>{{ Session::get("success-delete") }}</li>
                </ul>
            </div>
            @endif
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Manager</th>
                        <th>Territory</th>
                        <th>Team Completion</th>
                        <th>Options</th>
                    </tr>
					@foreach ($sm->where('role','salesmanager') as $sman)
					<tr>
						<td>{{ucwords($sman->fname)}} {{ucwords($sman->lname)}}</td>
						<td>{{ucwords($sman->name)}} </td>
						<td class="d-flex"><div id="progress">
								<div id="bar " style="width: calc(100% / {{$sman->available}} * {{$sman->where('role','salesperson')->where('manager_assign',$sman->id)->count()}}); height: 20px;
							 background-color: green;"></div>
							</div> &nbsp;{{$sman->where('role','salesperson')->where('manager_assign',$sman->id)->count()}}/{{$sman->available}}   </td>
						<td><a data-toggle="modal" data-target="#modal-schedule-{{$sman->id}}"><i class="fa fa-search" aria-hodden="true"></i> View </a></td>
					</tr>
					
			 <div class="modal modal-danger fade" id="modal-schedule-{{$sman->id}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">{{ucwords($sman->fname)}} {{ucwords($sman->lname)}}'s Team</h4>
                </div>
				<div class="modal-body">
				@foreach ($sm->where('role','salesperson')->where('manager_assign',$sman->id) as $sp)
				
				{!! Form::open(['action' => 'SalesManagerController@store']) !!} 
        {{ Form::token() }}
		
		{{ Form::hidden('salesperson', $sp->id,array('class'=> 'form-control')) }}
		
		
		@php $smang = $sm->where('role','salesmanager');
		$smanag = [];
        foreach ($smang as $smg) {
			array_push($smanag,"Unassign");
            $smanag[$smg->id] = ucwords($smg->fname).' '.ucwords($smg->lname);
			
        }
		@endphp
		<div class="col-md-9 form-group d-flex">
                        <label for="gender">{{ucwords($sp->fname)}} {{ucwords($sp->lname)}} &nbsp;</label> {{ Form::select('manager_assign', $smanag,'',array('class'=> 'form-control','placeholder' => '- Assign To -')) }}
                    </div>
		
		 <div class="form-group text-center">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
				
				@endforeach
 
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    @endforeach
                </tbody>
            </table>
			
        </div>
		</div>
		
		 
</div>
<div class="col-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <span class="box-title">Unassigned Retail Consultants</span>
          

          
        
        <!-- /.box-header -->
        <div class="box-header with-border">
		<div class="box-body table-responsive px-10 py-0">
			<table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Territory</th>
                        <th>No. Unassigned</th>
                        <th>Options</th>
                    </tr>
					@foreach ($territory as $territory)
					<tr>
					<td>{{ucwords($territory->name)}}</td>
					<td>
					
					{{$sm->where('role','salesperson')->where('division_id',$territory->division_id)->where('manager_assign','0')->count()}}
					
					</td>
					<td><a data-toggle="modal" data-target="#modal-schedule-{{$territory->division_id}}"><i class="fa fa-search" aria-hodden="true"></i> View </a></td>
					
					</tr>
					
					 <div class="modal modal-danger fade" id="modal-schedule-{{$territory->division_id}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Unsigned Sales People in {{ucwords($territory->name)}}</h4>
                </div>
				<div class="modal-body">
				@foreach ($sm->where('role','salesperson')->where('division_id',$territory->division_id)->where('manager_assign','0') as $sp)
				
				{!! Form::open(['action' => 'SalesManagerController@store']) !!} 
        {{ Form::token() }}
		
		{{ Form::hidden('salesperson', $sp->id,array('class'=> 'form-control')) }}
		
		
		@php $smang = $sm->where('role','salesmanager');
		$smanag = [];
        foreach ($smang as $smg) {
			array_push($smanag,"Unassign");
            $smanag[$smg->id] = ucwords($smg->fname).' '.ucwords($smg->lname);
			
        }
		@endphp
		<div class="col-md-9 form-group d-flex">
                        <label for="gender">{{ucwords($sp->fname)}} {{ucwords($sp->lname)}} &nbsp;</label> {{ Form::select('manager_assign', $smanag,'',array('class'=> 'form-control','placeholder' => '- Assign To -')) }}
                    </div>
		
		 <div class="form-group text-center">
                {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
				</div>

				       {!! Form::close() !!}
				
				@endforeach
 
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    @endforeach
                </tbody>
            </table>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
		</div>
		
		 
</div>
@endsection