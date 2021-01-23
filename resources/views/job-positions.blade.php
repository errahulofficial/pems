@extends('master')
<style>
  .bold {
    font-weight: bold;
  }

  .justify-content-between {
    justify-content: space-between;
  }
</style>
@section('content')
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
  @if (Session::has("success-delete"))
  <div class="alert alert-success">
    <ul>
      <li>{{ Session::get("success-delete") }}</li>
    </ul>
  </div>
  @endif
</div>
<div class="col-md-12 d-flex">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Job positions</h3>
    </div>
    {!! Form::open(['action' => 'jobPositions@create','id'=>'form']) !!} {{ Form::token() }}
    <div class="box-body d-flex">
      <div class="form-group ">
        {{ Form::text('name', '',array('class' => 'form-control','placeholder' => 'Job Position Name','required'=>'true'))
        }}

      </div>
      <div class="form-group hidden">
        <label for="desc">Desc</label> {{ Form::textarea('desc', '',array('class' => 'form-control','placeholder' => 'Description'))
        }}
      </div>


      <div class="form-group hidden">
        <label for="status">Status</label> {{ Form::text('status', '',array('class' => 'form-control','placeholder' => 'Status'))
        }}

      </div>

      <div class="form-group">
        {{ Form::submit('ADD POSITION',array('class' => 'btn btn-primary')) }}
      </div>
    </div>
    {!! Form::close() !!}
  </div>
</div>
@foreach ($job as $jobview)
<div class="col-md-12 d-flex">
  <div class="box box-success">
    <div class="box-header with-border">
      <div class="d-flex justify-content-between">
        <span class="box-title bold">{{ $jobview->name}}</span>
        <span><a data-toggle="modal" data-target="#modal-edit-{{ $jobview->jobPositionId}}" href=""> <span
              class="label label-success">Edit <i class="fa fa-pencil"></i></span></a>


          <div class="modal modal-success fade" id="modal-edit-{{ $jobview->jobPositionId}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Edit Job Position</h4>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <a href="{{ url('job-positions-edit') }}/{{ $jobview->jobPositionId}}"><button type="button"
                      class="btn btn-outline">Sure to edit !</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <a data-toggle="modal" data-target="#modal-delete-{{ $jobview->jobPositionId}}" href=""> <span
              class="label label-danger">Delete <i class="fa fa-trash "></i></span></a>


          <div class="modal modal-danger fade" id="modal-delete-{{ $jobview->jobPositionId}}" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Delete Job Position</h4>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <a href="{{ url('job-positions-delete') }}/{{ $jobview->jobPositionId}}"><button type="button"
                      class="btn btn-outline">Sure to Delete !</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </span>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body px-10 py-0">
      <table class="table table-responsive table-hover">
        <thead>
          <tr class="bg-gray">
            <td>Step No.</td>
            <td>Step Name</td>
            <td>Time Span (minutes)</td>
            <td>Desc</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          @foreach ($jobsteps as $jobstep)
          @if ($jobview->jobPositionId === $jobstep->jobPositionId)
          <tr>
            {!! Form::open(['action' => ['jobPositionsSteps@update',"".$jobstep->jobPositionStepId],'id'=>'form']) !!}
            {{ Form::token() }}
            <td>
              <div class="form-group">
                {{ Form::text('stepno', $jobstep->stepno,array('class' => 'form-control','placeholder' => 'Step No.','required'=>'true')) }}

              </div>
            </td>
            <td>
              <div class="form-group">
                {{ Form::text('stepname', $jobstep->stepname,array('class' => 'form-control','placeholder' => 'Step Name','required'=>'true')) }}

              </div>
            </td>
            <td>
              <div class="form-group">
                {{ Form::number('timespan', $jobstep->timespan,array('class' => 'form-control','placeholder' => 'Time Span','required'=>'true')) }}

              </div>
            </td>
            <td>
              <div class="form-group">
                {{ Form::text('desc', $jobstep->desc,array('class' => 'form-control','placeholder' => 'Desc','required'=>'true')) }}
              </div>
            </td>
            <td>
              <div class="form-group">
                
                {{ Form::submit('UPDATE',array('class' => 'btn btn-warning')) }}


                <a data-toggle="modal" data-target="#modal-delete-{{ $jobstep->jobPositionStepId}}" href="">
                  <span class="btn btn-danger"> Delete{{-- <i class="fa fa-trash"></i> --}}</span></a>


                <div class="modal modal-danger fade" id="modal-delete-{{ $jobstep->jobPositionStepId}}"
                  style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-contents">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Delete Job Position Step</h4>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <a href="{{ url('job-positions-steps-delete') }}/{{ $jobstep->jobPositionStepId}}"><button
                            type="button" class="btn btn-outline">Sure to Delete !</button></a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </div>
            </td>
          </tr>

          {!! Form::close() !!}
          @endif
          @endforeach
          <tr>
            {!! Form::open(['action' => ['jobPositionsSteps@create',"".$jobview->jobPositionId],'id'=>'form']) !!}
            {{ Form::token() }}
            <td>
              <div class="form-group">
                {{ Form::number('stepno', '',array('class' => 'form-control','placeholder' =>
            'stepno','required'=>'true')) }}

              </div>
            </td>
            <td>
              <div class="form-group">
                {{ Form::text('stepname', '',array('class' => 'form-control','placeholder' =>
            'name','required'=>'true')) }}

              </div>
            </td>
            <td>
              <div class="form-group">
                {{ Form::number('timespan', '',array('class' => 'form-control','placeholder'
            => 'Time Span','required'=>'true')) }}

              </div>

            </td>
            <td>
              <div class="form-group">
                {{ Form::text('desc', '',array('class' => 'form-control','placeholder' => 'Description','required'=>'true'))
            }}
              </div>
            </td>

            <td>
              <div class="form-group d-flex">
                {{ Form::submit('ADD STEP',array('class' => 'btn btn-primary')) }}

              </div>
            </td>
    {!! Form::close() !!}
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</tr>
</tbody>
</table>
</div>
</div>
</div>
@endforeach
<div class="px-10 py-0 text-center"> {{ $job->links() }}</div>
@endsection