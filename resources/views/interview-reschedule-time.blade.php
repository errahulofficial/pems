@extends('master')
@section('content')
<style>
    .closetime {
        /* display:none */
    }

    .capital {
        text-transform: capitalize
    }

    .right {
        text-align: right
    }

    #onTimeSelect {
        display: none
    }

    .open span {
        display: none
    }
</style>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Schedule Time on <span class="capital">{{$day}}</span> {{$date}}</h3>
            <h5><a class="label btn-warning"
                    href="{{url('interviews/view')}}/{{$careers_usersId}}/{{$jobposition}}/{{$status}}/{{$interviewer}}/{{$from_date}}/{{$to_date}}/reschedule">Select
                    another
                    date</a></h5>
        </div>



        <div class="row">
            <div class="col-md-12" style="padding-bottom:20px">
                <div class="col-md-6">



                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Time</th>
                                <th class="right">Select</th>
                            </tr>
                            @foreach($interviewerGet as $dataview)

                            {{-- {{$dataview->intervieweremail}} --}}

                            @if('monday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->monday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @elseif('tuesday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->tuesday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success">
                                        <span>'.$i.'</span>
                                        Open</a></td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @elseif('wednesday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->wednesday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @elseif('thrusday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->thrusday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @elseif('friday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->friday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @elseif('saturday' == $day)

                            @php
                            $dayCount = explode('|',$dataview->saturday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @else

                            @php
                            $dayCount = explode('|',$dataview->sunday);
                            $i = 7;

                            foreach($dayCount as $key => $dayCountView){
                            if($dayCountView == '1')
                            {
                            echo ' <tr>';
                                echo '<td>'.$i.':00</td>';
                                echo '<td align="right"><a class="open label btn-success"> <span>'.$i.'</span>Open</a>
                                </td>';
                                echo ' </tr>';
                            }
                            else{
                            echo '<p class="closetime">'.$i.':00</p>';
                            echo '<p class="closetime">Close</p>';
                            }
                            $i++;
                            }

                            @endphp

                            @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">

                    @if(!$interviewStepsGet->isEmpty())

                    @foreach($interviewStepsGet as $interviewStepsGetView)

                    <div id="onTimeSelect">
                        <h4>Interview Start : <span id="timeget"></span>:00 </h4>
                        <div class="form-group">
                            
                            {{ Form::button('Reschedule Interview',array('class' => 'btn btn-primary LinkTimeButton')) }}
                       
                        </div>
                    </div>

                    @endforeach
                    @else
                    No Step Assign
                    @endif
                </div>
            </div>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
           $(".closetime").remove();
           });
        </script>

<script>
$(document).ready(function(){
  $(".open").click(function(event){
    var t = $(this).find("span").text();
    $("#onTimeSelect").show();
    $('#timevalue').val(t);
    $('#timeget').text(t);
    $('.LinkTimeButton').unwrap();
    $('.LinkTimeButton').wrap("<a href='{{url('interviews/view')}}/{{$careers_usersId}}/{{$jobposition}}/{{$status}}/{{$interviewer}}/{{$from_date}}/{{$to_date}}/reschedule/date/{{$dateselected}}/{{$dayselected}}/" + t +"'></a>");
    event.preventDefault();
  });
});
</script>

    </div>
</div>
@endsection