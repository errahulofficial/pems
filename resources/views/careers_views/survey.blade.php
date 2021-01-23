@extends('careers_views/master')
@section('content')
<style>
    .mr-10{
        margin-right:10px!important
    }
    </style>

<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Survey</h3>
        </div>
    <div class="row">
        <div class="box-body">
            <div class="form-group col-md-12">
            <h3>{!! $headfoot->step5_header !!}</h3>
            </div>
                {!! Form::open(['action' => ['careers_controller@questionsSubmit',$id,$random_token]]) !!}
                {{ Form::token() }}
                {{ Form::hidden('sma',Session::get("timer")) }}
                {{ Form::hidden('token',$step5) }}
                {{ Form::hidden('s_token',$session_token) }}

                @php 
                $i= 1;
                @endphp
                @foreach($questions as $questions_view)
                <div class="form-group col-md-12">
                <h4>{{$i}}. {{$questions_view->question}}</h4>
                    {{ Form::radio('survey'.$i.'[]','1',false,array('class' => 'form-control')) }} 
                    <label for="see" class="mr-10"> Yes</label>
                    {{ Form::radio('survey'.$i.'[]','0',false,array('class' => 'form-control ml-10')) }} 
                    <label for="see"> No</label>
                </div>
                @php 
                $i++;
                @endphp
                @endforeach
                
                <div class="form-group col-md-12">
                <div class="form-group">
                        {{ Form::submit('Submit',array('class' => 'btn btn-success')) }}
                    </div>
                </div>
                {!! Form::close() !!}
                <div class="form-group col-md-12">
                <h3>{!! $headfoot->step5_footer !!}</h3>
                </div>
        </div>

    </div>

</div>
</div>
@endsection