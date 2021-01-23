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
display: flex;
align-items: center;
}

.form-group {
margin-bottom: 10px;
}

.drop-days {
max-height: 300px;
overflow-y: scroll;
}

.dropdown-menu {
min-width: 200px;
padding: 5px
}
.transfer-blue{
    margin-bottom: 20px
}

</style>

<div class="col-md-12 d-flex">

<div class="box box-primary">
<div class="box-header with-border d-flex align-items-center">
<h3 class="box-title col-xs-4 d-flex align-items-center p-0">Update Interviewer</h3>
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

@foreach($interviewerData as $interviewerDataView) {!! Form::open(['action' =>
['interviewer@update',''.$interviewerDataView->addinterviewerid]])
!!} {{ Form::token() }}
<div class="box-body">
<div class="row">
    <div class="col-md-4 form-group">
        <label for="employeeName">Select Employee</label> {{ Form::select('employeeName',$selectemployeeData,NULL,array('class'=>'form-control','id'=>'SelectEmployee'))
        }}
    </div>
    <script>
        $(document).ready(function () {
            $("#SelectEmployee").prepend(
                '<option value="{{ $interviewerDataView->employeeName }}" selected>{{ $interviewerDataView->fname }} {{ $interviewerDataView->lname }}</option>'
            );
        });

    </script>
    <div class="col-md-4 form-group">
        <label for="InterviewerEmail">Interviewer Email</label> {{ Form::text('intervieweremail', $interviewerDataView->intervieweremail,array('class'
        => 'form-control','placeholder' => 'Interviewer Email')) }}
    </div>
    <div class="col-md-4 form-group">
        <label for="intervieweremailpass">Interviewer Email Pass</label> {{ Form::text('intervieweremailpass',
        $interviewerDataView->intervieweremailpass,array('class' => 'form-control','placeholder' => 'Interviewer
        Pass')) }}
    </div>















    <div class="col-md-12 form-group">
        <div class="row">
            <div class="col-md-12">
                <div class="d-block text-center">

                        <div class="transferdata-inputs" style="width:0%">

                                <div class="redbox-inputs"></div>
                                <div class="bluebox-inputs"></div>
                               
                            </div>

                    <div class="transferdata" style="width:100%">

                        <div class="redbox"></div>
                        <div class="bluebox"></div>

                    </div>

                    @foreach($treeViewAll as $keys => $category2) 
                   

                   



                    @if(!empty($category2->name))
                <div class="col-md-4 transfer-red remove{{$category2->jobPositionId}}" id="remove{{$category2->jobPositionId}}">
                    
                    @php 
                    $pin = rand(1000000, 9999999); 
                    $string = $pin;
                    @endphp

<div class="transfer-input-red">
        {{Form::hidden('position_name'.'['.$keys.']',
        $category2->name,array('id'=>'position_name-remove'.$category2->jobPositionId))}}
</div>
<div class="transfer-input-red">
        {{Form::hidden('job_position_main_id'.'['.$keys.']',
        $category2->jobPositionId,array('id'=>'job_position_main_id-remove'.$category2->jobPositionId))}}
</div>
<div class="transfer-input-red">
        {{Form::hidden('position_token'.'['.$keys.']', $string,array('id'=>'position_token-remove'.$category2->jobPositionId))}}
</div>
                    
                    
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
                    </div>
                    @endif

                    @endforeach




                    <div class="col-md-12" style="height:2px;border 2px red;background:green;margin:20px 0">

                    </div>

                    @foreach($treeView2 as $keys => $category2)

                
                    @if(!empty($category2->position_name))

                    <div class="col-md-4 transfer-blue remove{{$category2->job_position_main_id}}" id="remove{{$category2->job_position_main_id}}">
                        
                        @php

                        $pin = rand(1000000, 9999999);
                        $string = $pin;
                        @endphp
    
    <div class="transfer-input-blue">
                        {{Form::hidden('position_name'.'['.$keys.']', $category2->position_name,array('id'=>'position_name-remove'.$category2->job_position_main_id))}}
    </div>
    <div class="transfer-input-blue">
                        {{Form::hidden('job_position_main_id'.'['.$keys.']',
                        $category2->job_position_main_id,array('id'=>'job_position_main_id-remove'.$category2->job_position_main_id))}}
    </div>
    <div class="transfer-input-blue">
                        {{Form::hidden('position_token'.'['.$keys.']',
                        $string,array('id'=>'position_token-remove'.$category2->job_position_main_id))}}
    </div>

                        <div class="btn-group">
                            <button type="button"
                                class="btn btn-default">{{ $category2->position_name }}</button>
                            <button type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu drop-days" role="menu" style="padding: 0;
                                border: 0;">

                                @foreach($category2->addinterviewer_jobpositions_steps as $key =>
                                $subcategory22)
                                @if(!empty($subcategory22->check_steps_name))
                                <li>
                                    @php $keys2 = $keys + 1;
                                    @endphp
                                    <label for="Representante Comercial">

                                        {{Form::hidden('job_positions_checks_token'.''.$keys2.''.'['.$key.']', $string)}}

                                        {{Form::hidden('check_steps_name'.''.$keys2.''.'['.$key.']', $subcategory22->check_steps_name)}}

                                        {{Form::hidden('jobPositionStep_name'.''.$keys2.''.'['.$key.']', $subcategory22->jobPositionStep_name )}}

                                        {{Form::hidden('job_positions_checks'.''.$keys2.''.'['.$key.']','0')}}

                                        @php
                                        if($subcategory22->checked_not == '0'){
                                        $checked_tick = false;
                                        }
                                        else{
                                        $checked_tick = true;
                                        }
                                        @endphp
                                        {{Form::checkbox('job_positions_checks'.''.$keys2.''.'['.$key.']', '1',$checked_tick,array('class' => 'form-control'))}}
                                        {{$subcategory22->check_steps_name}}
                                    </label>
                                    
                                </li>
                                

                                @endif @endforeach
                            </ul>
                            

                        </div>
                    </div>
                    @endif @endforeach
                </div>
                <br />
            </div>
        </div>
    </div>








    <div class="col-md-12 form-group">
        <div class=" d-flex text-center">
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Monday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $monday = $interviewerDataView->monday; $monday_nw = explode('|',$monday);
                            @endphp @foreach ($monday_nw as $key => $monday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw = $key + 7;
                                    @endphp
                                    @if($monday_nw_data == '1')
                                    {{ Form::hidden('monday['.$key_nw.']',
                                                                                                '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('monday['.$key_nw.']', '1',true,array('class' => 'form-control','placeholder'
                                                                            => '7:00'))}} {{$key_nw}}:00
                                    @else
                                    {{ Form::hidden('monday['.$key_nw.']',
                                                                                                '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('monday['.$key_nw.']', '1','',array('class' => 'form-control','placeholder'
                                                                            => '7:00'))}} {{$key_nw}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach



                        </ul>
                    </div>





                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Tuesday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $tuesday = $interviewerDataView->tuesday; $tuesday_nw =
                            explode('|',$tuesday);
                            @endphp @foreach ($tuesday_nw as $key2
                            => $tuesday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw2 = $key2 + 7;
                                    @endphp

                                    @if($tuesday_nw_data == '1')
                                    {{ Form::hidden('tuesday['.$key_nw2.']',
                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('tuesday['.$key_nw2.']', '1',true,array('class' => 'form-control','placeholder'
                        => '7:00'))}} {{$key_nw2}}:00
                                    @else
                                    {{ Form::hidden('tuesday['.$key_nw2.']',
                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('tuesday['.$key_nw2.']', '1','',array('class' => 'form-control','placeholder'
                        => '7:00'))}} {{$key_nw}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach



                        </ul>
                    </div>




                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Wednesday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $wednesday = $interviewerDataView->wednesday; $wednesday_nw =
                            explode('|',$wednesday);
                            @endphp @foreach ($wednesday_nw
                            as $key3 => $wednesday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw3 = $key3 + 7;




                                    @endphp

                                    @if($wednesday_nw_data == '1')
                                    {{ Form::hidden('wednesday['.$key_nw3.']',
                                                                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('wednesday['.$key_nw3.']', '1',true,array('class' => 'form-control','placeholder'
                                                                        => '7:00'))}} {{$key_nw3}}:00
                                    @else
                                    {{ Form::hidden('wednesday['.$key_nw3.']',
                                                                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('wednesday['.$key_nw3.']', '1','',array('class' => 'form-control','placeholder'
                                                                        => '7:00'))}} {{$key_nw3}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach



                        </ul>
                    </div>





                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Thursday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $thrusday = $interviewerDataView->thrusday; $thrusday_nw =
                            explode('|',$thrusday);
                            @endphp @foreach ($thrusday_nw as
                            $key4 => $thrusday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw4 = $key4 + 7;




                                    @endphp

                                    @if($thrusday_nw_data == '1')
                                    {{ Form::hidden('thrusday['.$key_nw4.']',
                                    '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('thrusday['.$key_nw4.']', '1',true,array('class' => 'form-control','placeholder'
                => '7:00'))}} {{$key_nw4}}:00
                                    @else
                                    {{ Form::hidden('thrusday['.$key_nw4.']',
                                    '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('thrusday['.$key_nw4.']', '1','',array('class' => 'form-control','placeholder'
                => '7:00'))}} {{$key_nw4}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach



                        </ul>
                    </div>






                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Friday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $friday = $interviewerDataView->friday; $friday_nw = explode('|',$friday);
                            @endphp @foreach ($friday_nw as $key42 =>
                            $friday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw42 = $key42 + 7;
                                    @endphp

                                    @if($friday_nw_data == '1')
                                    {{ Form::hidden('friday['.$key_nw42.']',
                                    '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('friday['.$key_nw42.']', '1',true,array('class' => 'form-control','placeholder'
                => '7:00'))}} {{$key_nw42}}:00
                                    @else
                                    {{ Form::hidden('friday['.$key_nw42.']',
                                    '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('friday['.$key_nw42.']', '1','',array('class' => 'form-control','placeholder'
                => '7:00'))}} {{$key_nw42}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">
                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Saturday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $saturday = $interviewerDataView->saturday; $saturday_nw =
                            explode('|',$saturday);
                            @endphp @foreach ($saturday_nw as
                            $key6 => $saturday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw6 = $key6 + 7;




                                    @endphp

                                    @if($saturday_nw_data == '1')
                                    {{ Form::hidden('saturday['.$key_nw6.']',
                        '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('saturday['.$key_nw6.']', '1',true,array('class' => 'form-control','placeholder'
    => '7:00'))}} {{$key_nw6}}:00
                                    @else
                                    {{ Form::hidden('saturday['.$key_nw6.']',
                        '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('saturday['.$key_nw6.']', '1','',array('class' => 'form-control','placeholder'
    => '7:00'))}} {{$key_nw6}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    </div>




                </div>
            </div>
            {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Sunday</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $sunday = $interviewerDataView->sunday; $sunday_nw = explode('|',$sunday);
                            @endphp @foreach ($sunday_nw as $key7 =>
                            $sunday_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw7 = $key7 + 7;




                                    @endphp

                                    @if($sunday_nw_data == '1')
                                    {{ Form::hidden('sunday['.$key_nw7.']',
                                                                        '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('sunday['.$key_nw7.']', '1',true,array('class' => 'form-control','placeholder'
                                                    => '7:00'))}} {{$key_nw7}}:00
                                    @else
                                    {{ Form::hidden('sunday['.$key_nw7.']',
                                                                        '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('sunday['.$key_nw7.']', '1','',array('class' => 'form-control','placeholder'
                                                    => '7:00'))}} {{$key_nw7}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    </div>






                </div>
            </div>
            {{-- col grow end --}} {{-- col grow end --}}
            <div class="col-grow">

                <div class="row">

                    <div class="btn-group">
                        <button type="button" class="btn btn-default">Main</button>
                        <button type="button" class="btn btn-default dropdown-toggle"
                            data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu drop-days" role="menu">
                            @php $main = $interviewerDataView->main; $main_nw = explode('|',$main);
                            @endphp @foreach ($main_nw as $key72 => $main_nw_data)
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    @php
                                    $key_nw72 = $key72 + 7;




                                    @endphp

                                    @if($main_nw_data == '1')
                                    {{ Form::hidden('main['.$key_nw72.']',
                                                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('main['.$key_nw72.']', '1',true,array('class' => 'form-control','placeholder'
                                                        => '7:00'))}} {{$key_nw72}}:00
                                    @else
                                    {{ Form::hidden('main['.$key_nw72.']',
                                                                            '0',array('class' => 'form-control')) }}
                                    {{Form::checkbox('main['.$key_nw72.']', '1','',array('class' => 'form-control','placeholder'
                                                        => '7:00'))}} {{$key_nw72}}:00
                                    @endif
                                </label>
                            </div>
                            @endforeach
                        </ul>
                    </div>






                </div>
            </div>
            {{-- col grow end --}}
        </div>
    </div>
    <div class="col-md-12 form-group">
        {{ Form::submit('UPDATE INTERVIEWER',array('class' => 'btn btn-success')) }}
    </div>
</div>
</div>
{!! Form::close() !!} @endforeach

</div>
</div>
<script>

$(".transfer-red").each(function () {    //loop over each list item 
    $(this).appendTo(".transferdata .redbox"); //append it to the item information
});
$(".transfer-blue").each(function () {    //loop over each list item 
    $(this).appendTo(".transferdata .bluebox"); //append it to the item information
});

$(".redbox").insertAfter(".bluebox");



// $(".transfer-input-red").each(function () {    //loop over each list item 
//     $(this).appendTo(".transferdata-inputs .redbox-inputs"); //append it to the item information
// });
// $(".transfer-input-blue").each(function () {    //loop over each list item 
//     $(this).appendTo(".transferdata-inputs .bluebox-inputs"); //append it to the item information
// });

// $(".redbox-inputs").insertAfter(".bluebox-inputs");

// $('.transferdata .redbox').slice(1).remove();
// $('.transferdata-inputs .bluebox-inputs').slice(1).remove();
// // $('.redbox-inputs').remove();


$('[id]').each(function (i) {
    $('[id="' + this.id + '"]').slice(1).remove();
});
</script>



@endsection
