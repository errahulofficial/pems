@extends('master') 
@section('content')

<div class="col-md-12">
@foreach ($territory as $t)
    <div class="box box-success">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">{{$t->region_name}} ({{$t->region_id}})/ {{$t->name}} ({{$t->division_id}}) </h3>
			<span class="col-xs-8 text-right p-0">
                <h4><a href="{{ url('sales-reports') }}?week=<?=$week-1?>">&laquo; </a> &nbsp; <i class="fa fa-calendar"> </i> Week {{date('W, M-Y', $monday )}}
						<a href="{{ url('sales-reports') }}?week=<?=$week+1?>">&raquo;</a> </h4>
				</span>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
	    @foreach ($repts as $report)
		@if($report->division_id == $t->division_id)

            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Calls Goal	</th>
                        <th>Calls Made	</th>
                        <th>Decision Makers	</th>
                        <th>Prospects Added	</th>
                        <th>1st Appt Schedules	</th>
                        <th>1st Appt Completed	</th>
						<th>1st Appt Canceled	</th>
						<th>2nd Appt Schedules	</th>
						<th>2nd Appt Completed		</th>
						<th>2nd Appt Canceled	</th>
						<th>Followup	</th>
						<th>Sales	</th>
						<th>Dead	</th>
                    </tr>
				
                  
					<tr>
                        <td>{{'Monday'}}</td>
                        <td>
						   @foreach($monday_data as $mon)
							@php $arr +=(int)$mon[0]; @endphp
							@endforeach
						{{ $arr != null ? $arr : 0}}
						@php $arr = 0 @endphp</td>
                        <td>
						@foreach($monday_data as $mon)
							@php $arr +=(int)$mon[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($monday_data as $mon)
							@php $arr +=(int)$mon[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Tuesday'}}</td>
                        <td>
						@foreach($tuesday_data as $tue)
							@php $arr +=(int)$tue[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($tuesday_data as $tue)
							@php $arr +=(int)$tue[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($tuesday_data as $tue)
							@php $arr +=(int)$tue[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Wednesday'}}</td>
                        <td>
						@foreach($wednesday_data as $wed)
							@php $arr +=(int)$wed[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($wednesday_data as $wed)
							@php $arr +=(int)$wed[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($wednesday_data as $wed)
							@php $arr +=(int)$wed[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Thrusday'}}</td>
                        <td>
						@foreach($thrusday_data as $thru)
							@php $arr +=(int)$thru[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($thrusday_data as $thru)
							@php $arr +=(int)$thru[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($thrusday_data as $thru)
							@php $arr +=(int)$thru[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>{{ ''}} </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Friday'}}</td>
                        <td>
						@foreach($friday_data as $fri)
							@php $arr +=(int)$fri[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($friday_data as $fri)
							@php $arr +=(int)$fri[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($friday_data as $fri)
							@php $arr +=(int)$fri[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Saturday'}}</td>
                        <td>
						@foreach($saturday_data as $sat)
							@php $arr +=(int)$sat[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($saturday_data as $sat)
							@php $arr +=(int)$sat[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($saturday_data as $sat)
							@php $arr +=(int)$sat[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('monday this week')) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Sunday'}}</td>
                        <td>
						@foreach($sunday_data as $sun)
							@php $arr +=(int)$sun[0]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($sunday_data as $sun)
							@php $arr +=(int)$sun[1]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
                        <td>@foreach($sunday_data as $sun)
							@php $arr +=(int)$sun[2]; @endphp
							@endforeach
							{{ $arr != null ? $arr : 0}}
							@php $arr = 0 @endphp</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach	</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach
						</td>
                        <td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						@endforeach</td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '3')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '4')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						<td>@foreach ($prospect as $pros)
						@if (date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '5')
						{{$pros->count()}}
					@else 
					{{'0'}}
						@endif
						
						@endforeach </td>
						
                      
                    </tr>
					
					<tr>
                        <td>{{''}}</td>
                       <td>{{ ''}}</td>
                        <td>{{ ''}}</td>
                        <td>{{''}}</td>
						<td>{{ '' }} </td>
						<td>{{'' }} </td>
						<td>{{ ''}} </td>
						<td>{{ ''}}</td>
                        <td>{{ ''}}</td>
                        <td>{{''}}</td>
						<td>{{ '' }} </td>
						<td>{{'' }} </td>
						<td>{{ ''}} </td>
						<td>{{ ''}} </td>
						
                      
                    </tr>
					<tr>
                        <td><i>{{'Overall'}}</i></td>
                       <td>{{$arr0}}</td>
                       <td>{{$arr1}}</td>
                       <td>{{$arr2}}</td>
                       
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday))
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach		 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1' && $pros->commit_complete == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1' && $pros->commit_complete == '0')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
                        <td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
                        <td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2' && $pros->commit_complete == '1')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2' && $pros->commit_complete == '0')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	  </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '3')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	  </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '4')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	 </td>
						<td>@foreach ($prospect as $pros)
						@if (date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '5')
						{{$pros->count()}}
					
					@else 
						{{'0'}}
						@endif
						
						@endforeach	  </td>
                      
                    </tr>
					
                </tbody>
            </table>
			@else
				<table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Calls Goal	</th>
                        <th>Calls Made	</th>
                        <th>Decision Makers	</th>
                        <th>Prospects Added	</th>
                        <th>1st Appt Schedules	</th>
                        <th>1st Appt Completed	</th>
						<th>1st Appt Canceled	</th>
						<th>2nd Appt Schedules	</th>
						<th>2nd Appt Completed		</th>
						<th>2nd Appt Canceled	</th>
						<th>Followup	</th>
						<th>Sales	</th>
						<th>Dead	</th>
                    </tr>
				
                    <tr>
                        <td>{{'Monday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Tuesday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Wednesday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr><tr>
                        <td>{{'Thrusday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr><tr>
                        <td>{{'Friday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Saturday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td>{{'Sunday'}}</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					
					
					<tr>
                        <td>{{''}}</td>
                       <td>{{ ''}}</td>
                        <td>{{ ''}}</td>
                        <td>{{''}}</td>
						<td>{{ '' }} </td>
						<td>{{'' }} </td>
						<td>{{ ''}} </td>
						<td>{{ ''}}</td>
                        <td>{{ ''}}</td>
                        <td>{{''}}</td>
						<td>{{ '' }} </td>
						<td>{{'' }} </td>
						<td>{{ ''}} </td>
						<td>{{ ''}} </td>
						
                      
                    </tr>
					<tr>
                        <td><i>{{'Overall'}}</i></td>
                       <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
                      
                    </tr>
					
                </tbody>
            </table>
			@endif
			@endforeach
            <div class="px-10 py-0"> {{ '' }}</div>
        </div>
        <!-- /.box-body -->
    </div>
	@endforeach
    <!-- /.box -->
</div>

 
@endsection