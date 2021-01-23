@extends('master')
@section('content')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{url('assets/css/calander.css')}}">
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> --}}
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .ui-datepicker {
        width: 100%;
        padding: .2em .2em 0;
        display: none;
    }

    #ui-datepicker-div {
        position: inherit !important;
        display: block !important;
    }

    #datepicker2 {
        visibility: hidden !important;
        height: 0px;
        width: 0;
        margin: 0;
        display: -webkit-box;
    }
</style>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Reschedule Interview</h3>
        </div>
        <div class="row">
            <div class="box-body">
                <input type="text" id="datepicker2" />
                <div class="col-md-12">
                    <p>Select Date for Interview</p>
                    <div id="date-data-destination">
                        <div class="datebox-off">
                        </div>
                    </div>
                </div>

<script>
$(document).ready(function(){
var weekday=new Array(7);
weekday[0]="monday";
weekday[1]="tuesday";
weekday[2]="wednesday";
weekday[3]="thursday";
weekday[4]="friday";
weekday[5]="saturday";
weekday[6]="sunday";
$("#datepicker2").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        onSelect: function (dateText, inst) {
            var date = $(this).datepicker('getDate');
            window.open('{!! url("interviews/view"."/".$careers_usersId."/".$jobposition."/".$status."/".$interviewer."/".$from_date."/".$to_date) !!}' + '/reschedule/date/' + this.value +'/'+ weekday[date.getUTCDay()], "_self");
        }
    });
});
$(document).ready(function () {
    $input = $("#datepicker2");
    $input.datepicker({
        format: 'dd MM yyyy',
        minDate: 0
    });
    $input.data('datepicker').hide = function () {};
    $input.datepicker('show');
    $("#ui-datepicker-div").wrap("<div id='date-data'></div>");
});
$(document).ready(function () {
    $("#date-data").appendTo("#date-data-destination");
});
</script>

            </div>
        </div>
    </div>
</div>
@endsection