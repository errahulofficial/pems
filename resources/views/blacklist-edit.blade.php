@extends('master') 
@section('content')
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Edit Black List</h3>
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
        @foreach ($blacklist as $blacklistview)
        {!! Form::open(['action' => ['blackListController@update',"".$blacklistview->blacklistid],'id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> {{ Form::text('fname', $blacklistview->fname, array('class' => 'form-control','placeholder'
                    => 'name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> {{ Form::text('lname', $blacklistview->lname, array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> {{ Form::text('email', $blacklistview->email, array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="phone">Phone</label> {{ Form::text('phone', $blacklistview->phone, array('class' => 'form-control','placeholder'
                    => 'Phone','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="city">City</label> {{ Form::text('city', $blacklistview->city, array('class' => 'form-control','placeholder'
                    => 'City','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label> {{ Form::text('state', $blacklistview->state, array('class' => 'form-control','placeholder'
                    => 'State','required'=>'true')) }}
                </div>
                <div class="col-md-6 form-group">
                    <label for="zip">Zip</label> {{ Form::text('zip', $blacklistview->zip, array('class' => 'form-control','placeholder' =>
                    'Zip','required'=>'true')) }}
                </div>
                <div class="col-md-12 form-group">
                        <label for="note">Note</label> {{ Form::textarea('note', '',array('class' => 'form-control','placeholder'
                        => 'Note','required'=>'true','required'=>'true')) }}
                    </div>


                <div class="col-md-12 form-group">
                    {{ Form::submit('UPDATE BLACKLIST',array('class' => 'btn btn-primary')) }}
                    <span class="" ><a class="btn btn-success" href="{{ url('blacklist') }}">BACK / CANCEL</a></span>
    
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        @endforeach

    </div>
</div>

@endsection