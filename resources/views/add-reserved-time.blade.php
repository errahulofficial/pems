@extends('master')
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Reserved Time</h3>
        </div>

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
        </div>
        

        {!! Form::open(['action' => 'interviewer@reservedtime','id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">
                {{ Form::hidden('parentid', $id)}}
        

            <div class="form-group">
                <label for="from_date">From Date</label> {{ Form::date('from_date', '',array('class' => 'form-control','placeholder' => 'From Date','required'=>'true'))
        }}

            </div>
            <div class="form-group">
                <label for="to_date">To Date</label> {{ Form::date('to_date', '',array('class' => 'form-control','placeholder' => 'To Date','required'=>'true'))
        }}

            </div>


            <div class="form-group">
                <label for="reason">Reason</label> {{ Form::textarea('reason', '',array('class' => 'form-control','placeholder' => 'Reason','required'=>'true'))
        }}
            </div>

            <div class="form-group">
                {{ Form::submit('ADD RESERVED TIME',array('class' => 'btn btn-primary')) }}
            </div>


        </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Reserved Time View</h3>
  
  
      </div>
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
              <th>From Date</th>
              <th>To Date</th>
              <th>Reason</th>
            </tr>
  
            @foreach ($reservedtime as $dataview)
            <tr>

              <td>{{ $dataview->from_date}}</td>

              <td>{{ $dataview->to_date}}</td>

              <td>{{ $dataview->reason}}</td>
              <td>
                  <a href="{{ url('delete-reserved-time')}}/{{ $dataview->id}}">
                      <span class="label label-danger"> Delete <i class="fa fa-trash"></i></span>
                  </a>
              </td>

             </tr>
  
            @endforeach
  
          </tbody>
        </table>
        <div class="px-10 py-0"> {{ $reservedtime->links() }}</div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

@endsection
