@extends('careers_views/master')
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
    #onTimeSelect{
        display: none
    }
    .open span{
        display: none
    }
</style>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Schedule Your Time on <span class="capital">{{$day}}</span> {{$date}}</h3>
            <h5><a class="label btn-warning"
                    href="{{url('careers/schedule-interview')}}/{{$id}}/{{$random_token}}/{{$s_token}}">Select another
                    date</a></h5>
        </div>



        <div class="row">
            <div class="col-md-12" style="padding-bottom:20px">
                <div class="col-md-3">



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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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
                                echo '<td align="right"><a class="open label btn-success">  <span>'.$i.'</span>Open</a></td>';
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


                <div class="col-md-9">



              {!! Form::open(['action' => ['careers_controller@timeSubmit',$id,$random_token,$s_token,$date,$day]]) !!} 
              
              {{ Form::token() }}

              {{ Form::hidden('day',$day) }}

                    @foreach($employeeGet as $employeeGetView)
                    <h4>Interviewer : {{$employeeGetView->fname}} {{$employeeGetView->lname}}</h4>
                    {{ Form::hidden('employee_id',$employeeGetView->id) }}
                    @endforeach

                    @foreach($jobPositionsGet as $jobPositionsGetView)
                    <h5>{{$jobPositionsGetView->name}}</h5>
                    {{ Form::hidden('jobPositionName',$jobPositionsGetView->name) }}
                    {{ Form::hidden('jobPositionId',$jobPositionsGetView->jobPositionId) }}
                    @endforeach

                    {{-- @foreach($jobStepGet as $jobStepGetView)
                    <h4>{{$jobStepGetView->stepname}}</h4>
                    @foreach($jobPositionsGet as $jobPositionsGetView)
                    <h5><i>{{$jobPositionsGetView->name}}</i></h5>
                    @endforeach
                    <p>{{$jobStepGetView->desc}}</p>
                    @endforeach --}}

                    @if(!$interviewStepsGet->isEmpty())

                    @foreach($interviewStepsGet as $interviewStepsGetView)
                    @if($interviewStepsGetView->stepno == 1)
                    <h5><i>{{$interviewStepsGetView->check_steps_name}}</i></h5>

                    {{ Form::hidden('id_stepsName',$interviewStepsGetView->check_steps_name) }}
                    {{ Form::hidden('id_steps',$interviewStepsGetView->id_steps) }}

                    <p>{{$interviewStepsGetView->desc}}</p>

                    <div id="onTimeSelect">
                        <h4>Interview Start : <span id="timeget"></span>:00 (Timespan: ~{{$interviewStepsGetView->timespan}}min)</h4>
                        {{ Form::hidden('timevalue','',array('id' => 'timevalue','placeholder'
                        => '') )}}

                        
                        <div class="form-group">
                                <label for="descp">Note for your interviewer:</label> {{ Form::textarea('descp', '',array('class' => 'form-control','placeholder'
                                => '','required'=>'true')) }}
                            </div>
                        <div class="form-group">
                                {{ Form::submit('Schedule Interview',array('class' => 'btn btn-primary')) }}
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    No Step Assign
                    @endif



                    {!! Form::close() !!}
                   
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
    event.preventDefault();
  });
});

</script>

    </div>
</div>
@endsection