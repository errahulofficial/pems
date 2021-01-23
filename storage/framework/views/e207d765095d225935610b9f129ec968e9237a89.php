
<?php $__env->startSection('content'); ?>
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
            <h3 class="box-title">Schedule Your Time on <span class="capital"><?php echo e($day); ?></span> <?php echo e($date); ?></h3>
            <h5><a class="label btn-warning"
                    href="<?php echo e(url('careers/schedule-interview')); ?>/<?php echo e($id); ?>/<?php echo e($random_token); ?>/<?php echo e($s_token); ?>">Select another
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
                            <?php $__currentLoopData = $interviewerGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            

                            <?php if('monday' == $day): ?>

                            <?php
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

                            ?>

                            <?php elseif('tuesday' == $day): ?>

                            <?php
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

                            ?>

                            <?php elseif('wednesday' == $day): ?>

                            <?php
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

                            ?>

                            <?php elseif('thrusday' == $day): ?>

                            <?php
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

                            ?>

                            <?php elseif('friday' == $day): ?>

                            <?php
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

                            ?>

                            <?php elseif('saturday' == $day): ?>

                            <?php
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

                            ?>

                            <?php else: ?>

                            <?php
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

                            ?>

                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>




                </div>


                <div class="col-md-9">



              <?php echo Form::open(['action' => ['careers_controller@timeSubmit',$id,$random_token,$s_token,$date,$day]]); ?> 
              
              <?php echo e(Form::token()); ?>


              <?php echo e(Form::hidden('day',$day)); ?>


                    <?php $__currentLoopData = $employeeGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeGetView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h4>Interviewer : <?php echo e($employeeGetView->fname); ?> <?php echo e($employeeGetView->lname); ?></h4>
                    <?php echo e(Form::hidden('employee_id',$employeeGetView->id)); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php $__currentLoopData = $jobPositionsGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPositionsGetView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h5><?php echo e($jobPositionsGetView->name); ?></h5>
                    <?php echo e(Form::hidden('jobPositionName',$jobPositionsGetView->name)); ?>

                    <?php echo e(Form::hidden('jobPositionId',$jobPositionsGetView->jobPositionId)); ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    

                    <?php if(!$interviewStepsGet->isEmpty()): ?>

                    <?php $__currentLoopData = $interviewStepsGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewStepsGetView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($interviewStepsGetView->stepno == 1): ?>
                    <h5><i><?php echo e($interviewStepsGetView->check_steps_name); ?></i></h5>

                    <?php echo e(Form::hidden('id_stepsName',$interviewStepsGetView->check_steps_name)); ?>

                    <?php echo e(Form::hidden('id_steps',$interviewStepsGetView->id_steps)); ?>


                    <p><?php echo e($interviewStepsGetView->desc); ?></p>

                    <div id="onTimeSelect">
                        <h4>Interview Start : <span id="timeget"></span>:00 (Timespan: ~<?php echo e($interviewStepsGetView->timespan); ?>min)</h4>
                        <?php echo e(Form::hidden('timevalue','',array('id' => 'timevalue','placeholder'
                        => '') )); ?>


                        
                        <div class="form-group">
                                <label for="descp">Note for your interviewer:</label> <?php echo e(Form::textarea('descp', '',array('class' => 'form-control','placeholder'
                                => '','required'=>'true'))); ?>

                            </div>
                        <div class="form-group">
                                <?php echo e(Form::submit('Schedule Interview',array('class' => 'btn btn-primary'))); ?>

                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    No Step Assign
                    <?php endif; ?>



                    <?php echo Form::close(); ?>

                   
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>