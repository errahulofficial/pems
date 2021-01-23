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
            <h3 class="box-title">JOBS</h3>
        </div>
        <div class="row" style="width:100%;margin:10px 0">
            <div class="form-group">
               
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Apply for job</th>
                        </tr>
                        @foreach ($jobPositions as $jobPositionsView)
                        <tr>
                        <td>{{ $jobPositionsView->name}}</td>
                        <td>
                          <a href="{{url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token}}">
                           <h4 class="label btn-warning">Apply</h4>
                        </a>
                           </td> 
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection