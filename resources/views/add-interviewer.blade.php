@extends('master')
@section('content')
<style>
    div[class*="col-grow"] {
        flex: 1 1 0;
        flex-grow: 1;
        flex-shrink: 1;
        flex-basis: 0px;
    }

    .d-flex {
        display: flex
    }

    .drop-days {
        max-height: 300px;
        overflow-y: scroll;
    }

    .dropdown-menu {
        min-width: 200px;
        padding: 5px
    }
</style>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-4 d-flex align-items-center p-0">Add Interviewer</h3>

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


        {{-- @foreach($treeView2 as $category2)
        <li class="treeview">
            <a href="#"><i class="fa fa-link"></i> <span>{{ $category2->name }}</span></a>
        <ul class="">
            @foreach($category2->jobPositionsStepModel as $subcategory22)
            <li class=""><a href="#">{{$subcategory22->stepname}}</a></li>
            @endforeach
        </ul>
        </li>
        @endforeach --}} {!! Form::open(['action' => 'interviewer@create','id'=>'form']) !!} {{ Form::token() }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="employeeName">Select Employee</label> {{ Form::select('employeeName',$selectemployeeData,NULL,array('class'=>'form-control','required'=>'true'))
                    }}
                </div>
                <div class="col-md-4 form-group">
                    <label for="InterviewerEmail">Interviewer Email</label> {{ Form::text('intervieweremail', '',array('class'
                    => 'form-control','placeholder' => 'Interviewer Email')) }}
                </div>
                <div class="col-md-4 form-group">
                    <label for="intervieweremailpass">Interviewer Email Pass</label> {{ Form::text('intervieweremailpass',
                    '',array('class' => 'form-control','placeholder' => 'Interviewer Email Pass')) }}
                </div>



                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-inline-block text-center">
                                @foreach($treeView2 as $keys => $category2)
                                @php
                                $pin = rand(1000000, 9999999);
                                $string = $pin;
                                @endphp
                                {{Form::hidden('position_name'.'['.$keys.']',
                                $category2->name)}}

                                {{Form::hidden('job_position_main_id'.'['.$keys.']',
                                $category2->jobPositionId)}}



                                {{Form::hidden('position_token'.'['.$keys.']', $string)}}
                                @if(!empty($category2->name))
                                <div class="col-md-4 removediv" id="removeasla{{$keys}}" style="margin-bottom: 20px">



                                    @php $keys2 = $keys + 1;
                                    @endphp

                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">{{ $category2->name }} </button>
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>

                                        <ul class="dropdown-menu drop-days" role="menu" style="padding: 0;
                                                       border: 0;">

                                            @foreach($category2->jobPositionsStepModel as $key => $subcategory22)

                                            @if(!empty($subcategory22->stepname))
                                            <li>
                                                @php $keys2 = $keys + 1;
                                                @endphp
                                                <label for="Representante Comercial">
                                                    {{Form::hidden('job_positions_checks_token'.''.$keys2.''.'['.$key.']', $string,array('class' => 'form-control','placeholder'
                                                        => $subcategory22->stepname))}}

                                                    {{Form::hidden('check_steps_name'.''.$keys2.''.'['.$key.']', $subcategory22->stepname,array('class' => 'form-control','placeholder'
                                                        => $subcategory22->stepname))}}

                                                    {{Form::hidden('jobPositionStep_name'.''.$keys2.''.'['.$key.']', $subcategory22->jobPositionStepId,array('class' => 'form-control','placeholder'
                                                        => $subcategory22->jobPositionStepId))}}

                                                    {{Form::hidden('job_positions_checks'.''.$keys2.''.'['.$key.']',
                                                                                                    '0',array('class' => 'form-control')) }}


                                                    {{Form::checkbox('job_positions_checks'.''.$keys2.''.'['.$key.']', '1','0',array('class' => '','id'=>'select_all'.$key.$keys2.'','placeholder '
                                                                                    => $subcategory22->stepname))}}

                                                    {{$subcategory22->stepname}}
                                                </label>
                                            </li>
                                            @endif

                                            @endforeach
                                        </ul>
                                    </div>
                                    <script>
                                        $myList = $('#removeasla{{$keys}} ul')
if ( $myList.children().length === 0 ){
    $('#removeasla{{$keys}}').remove();
}
                                    </script>



                                </div>
                                @endif




                                @endforeach
                            </div>
                            <br />
                        </div>
                    </div>
                </div>
                <div class="col-md-12 form-group">
                    <div class="d-flex text-center">
                        <div class="col-grow">

                            <div class="row">

                                <div class="margin">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default">Monday</button>
                                        <button type="button" class="btn btn-default dropdown-toggle"
                                            data-toggle="dropdown">
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu drop-days" role="menu">
                                            @for($i=7;$i<=24;$i++) <div class="col-md-12 form-group">
                                                <label for="representantecomercial">
                                                    {{ Form::hidden('monday['.$i.']',
                                                                                '0',array('class' => 'form-control')) }}

                                                    @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php
                                                        $checked="" ; @endphp @endif <li>{{Form::checkbox('monday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                      => '7:00'))}} {{$i}}:00</li>
                                                </label>
                                    </div>
                                    @endfor
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    {{-- col grow end --}}
                    <div class="col-grow">


                        <div class="row">
                            <div class="margin">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Tuesday</button>
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu drop-days" role="menu">
                                        @for($i=7;$i
                                        <=24;$i++) <div class="col-md-12 form-group">
                                            <label for="representantecomercial">
                                                {{ Form::hidden('tuesday['.$i.']',
                                                                                '0',array('class' => 'form-control')) }}
                                                @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php
                                                    $checked="" ; @endphp @endif <li>{{Form::checkbox('tuesday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))}} {{$i}}:00</li>
                                            </label>
                                </div>
                                @endfor
                                </ul>
                            </div>

                        </div>


                    </div>
                </div>
                {{-- col grow end --}}
                <div class="col-grow">

                    <div class="row">

                        <div class="margin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Wednesday</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu drop-days" role="menu">
                                    @for($i=7;$i
                                    <=24;$i++) <div class="col-md-12 form-group">
                                        <label for="representantecomercial">
                                            {{ Form::hidden('wednesday['.$i.']',
                                                                           '0',array('class' => 'form-control')) }}
                                            @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php
                                                $checked="" ; @endphp @endif <li> {{Form::checkbox('wednesday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))}} {{$i}}:00</li>
                                        </label>
                            </div>
                            @endfor
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">


                    <div class="margin">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Thursday</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu drop-days" role="menu">
                                @for($i=7;$i
                                <=24;$i++) <div class="col-md-12 form-group">
                                    <label for="representantecomercial">
                                        {{ Form::hidden('thrusday['.$i.']',
                                        '0',array('class' => 'form-control')) }}
                                        @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php $checked=""
                                            ; @endphp @endif {{Form::checkbox('thrusday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                    => '7:00'))}} {{$i}}:00 </label> </div> @endfor </div> </div> </div> </div>
                                            {{-- col grow end --}} <div class="col-grow">

                                            <div class="row">

                                                <div class="margin">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default">Friday</button>
                                                        <button type="button" class="btn btn-default dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="caret"></span>
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <ul class="dropdown-menu drop-days" role="menu">
                                                            @for($i=7;$i
                                                            <=24;$i++) <div class="col-md-12 form-group">
                                                                <label for="representantecomercial">
                                                                    {{ Form::hidden('friday['.$i.']',
                                                                 '0',array('class' => 'form-control')) }}
                                                                    @if($i >= 9 && $i <= 17 ) @php $checked="true" ;
                                                                        @endphp @else @php $checked="" ; @endphp @endif
                                                                        <li> {{Form::checkbox('friday['.$i.']','1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))}} {{$i}}:00</li>
                                                                </label>
                                                    </div>
                                                    @endfor


                                                </div>
                                            </div>
                        </div>
                    </div>
                    {{-- col grow end --}}
                    <div class="col-grow">

                        <div class="row">



                            <div class="margin">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default">Saturday</button>
                                    <button type="button" class="btn btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu drop-days" role="menu">
                                        @for($i=7;$i
                                        <=24;$i++) <div class="col-md-12 form-group">
                                            <label for="representantecomercial">
                                                {{ Form::hidden('saturday['.$i.']',
                              '0',array('class' => 'form-control')) }}
                                                @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php
                                                    $checked="" ; @endphp @endif <li>{{Form::checkbox('saturday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                    => '7:00'))}} {{$i}}:00</li>
                                            </label>
                                </div>
                                @endfor


                            </div>
                        </div>




                    </div>
                </div>
                {{-- col grow end --}}
                <div class="col-grow">

                    <div class="row">

                        <div class="margin">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Sunday</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu drop-days" role="menu">
                                    @for($i=7;$i
                                    <=24;$i++) <div class="col-md-12 form-group">
                                        <label for="representantecomercial">
                                            {{ Form::hidden('sunday['.$i.']',
                         '0',array('class' => 'form-control')) }}
                                            @if($i >= 9 && $i <= 17 ) @php $checked="true" ; @endphp @else @php
                                                $checked="" ; @endphp @endif <li> {{Form::checkbox('sunday['.$i.']', '1',$checked ,array('class' => 'form-control','placeholder'
                                    => '7:00'))}} {{$i}}:00</li>
                                        </label>
                            </div>
                            @endfor


                        </div>
                    </div>





                </div>
            </div>
            {{-- col grow end --}}


            <div class="col-grow">

                <div class="row">

                    <div class="margin">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default">Main</button>
                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu drop-days" role="menu">
                                @for($i=7;$i
                                <=24;$i++) <div class="col-md-12 form-group">
                                    <label for="representantecomercial">
                                        {{ Form::hidden('main['.$i.']',
                              '0',array('class' => 'form-control')) }}

                                        <li> {{Form::checkbox('main['.$i.']', '1','' ,array('class' => 'form-control','placeholder'
                                         => '7:00'))}} {{$i}}:00</li>
                                    </label>
                        </div>
                        @endfor


                    </div>
                </div>





            </div>
        </div>
        {{-- col grow end --}}
    </div>
</div>
<div class="col-md-12 form-group">
    {{ Form::submit('ADD INTERVIEWER',array('class' => 'btn btn-success')) }}
</div>
</div>
</div>
{!! Form::close() !!}

</div>
</div>

<script>
    $(document).ready(function () {
    $('select[name="employeeName"]').prepend('<option value="" selected>Select Employee</option>');

    

  });
   
   $('.removediv').find("li")
    if ( $myList.children().length === 0 )
    if ( $myList.children().length === 0 ){
        $(this).parentsUntil('.removediv').remove();
        console.log($(this).parentsUntil('.removediv'));
    }
</script>

@endsection