
<?php $__env->startSection('content'); ?>
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
<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="alert alert-danger">
    <ul>
        <li><?php echo e($error); ?></li>
    </ul>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php if(Session::has("success")): ?>
<div class="alert alert-success">
    <ul>
        <li><?php echo e(Session::get("success")); ?></li>
    </ul>
</div>
<?php endif; ?>
</div>

<?php $__currentLoopData = $interviewerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewerDataView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo Form::open(['action' =>
['interviewer@update',''.$interviewerDataView->addinterviewerid]]); ?> <?php echo e(Form::token()); ?>

<div class="box-body">
<div class="row">
    <div class="col-md-4 form-group">
        <label for="employeeName">Select Employee</label> <?php echo e(Form::select('employeeName',$selectemployeeData,NULL,array('class'=>'form-control','id'=>'SelectEmployee'))); ?>

    </div>
    <script>
        $(document).ready(function () {
            $("#SelectEmployee").prepend(
                '<option value="<?php echo e($interviewerDataView->employeeName); ?>" selected><?php echo e($interviewerDataView->fname); ?> <?php echo e($interviewerDataView->lname); ?></option>'
            );
        });

    </script>
    <div class="col-md-4 form-group">
        <label for="InterviewerEmail">Interviewer Email</label> <?php echo e(Form::text('intervieweremail', $interviewerDataView->intervieweremail,array('class'
        => 'form-control','placeholder' => 'Interviewer Email'))); ?>

    </div>
    <div class="col-md-4 form-group">
        <label for="intervieweremailpass">Interviewer Email Pass</label> <?php echo e(Form::text('intervieweremailpass',
        $interviewerDataView->intervieweremailpass,array('class' => 'form-control','placeholder' => 'Interviewer
        Pass'))); ?>

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

                    <?php $__currentLoopData = $treeViewAll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $category2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                   

                   



                    <?php if(!empty($category2->name)): ?>
                <div class="col-md-4 transfer-red remove<?php echo e($category2->jobPositionId); ?>" id="remove<?php echo e($category2->jobPositionId); ?>">
                    
                    <?php 
                    $pin = rand(1000000, 9999999); 
                    $string = $pin;
                    ?>

<div class="transfer-input-red">
        <?php echo e(Form::hidden('position_name'.'['.$keys.']',
        $category2->name,array('id'=>'position_name-remove'.$category2->jobPositionId))); ?>

</div>
<div class="transfer-input-red">
        <?php echo e(Form::hidden('job_position_main_id'.'['.$keys.']',
        $category2->jobPositionId,array('id'=>'job_position_main_id-remove'.$category2->jobPositionId))); ?>

</div>
<div class="transfer-input-red">
        <?php echo e(Form::hidden('position_token'.'['.$keys.']', $string,array('id'=>'position_token-remove'.$category2->jobPositionId))); ?>

</div>
                    
                    
                    <?php $keys2 = $keys + 1;
                        ?>

                        <div class="btn-group">
                            <button type="button" class="btn btn-default"><?php echo e($category2->name); ?> </button>
                            <button type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>

                            <ul class="dropdown-menu drop-days" role="menu" style="padding: 0;
                                           border: 0;">

                                <?php $__currentLoopData = $category2->jobPositionsStepModel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $subcategory22): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php if(!empty($subcategory22->stepname)): ?>
                                <li>
                                    <?php $keys2 = $keys + 1;
                                    ?>
                                    <label for="Representante Comercial">
                                        <?php echo e(Form::hidden('job_positions_checks_token'.''.$keys2.''.'['.$key.']', $string,array('class' => 'form-control','placeholder'
                                            => $subcategory22->stepname))); ?>


                                        <?php echo e(Form::hidden('check_steps_name'.''.$keys2.''.'['.$key.']', $subcategory22->stepname,array('class' => 'form-control','placeholder'
                                            => $subcategory22->stepname))); ?>


                                        <?php echo e(Form::hidden('jobPositionStep_name'.''.$keys2.''.'['.$key.']', $subcategory22->jobPositionStepId,array('class' => 'form-control','placeholder'
                                            => $subcategory22->jobPositionStepId))); ?>


                                        <?php echo e(Form::hidden('job_positions_checks'.''.$keys2.''.'['.$key.']',
                                                                                        '0',array('class' => 'form-control'))); ?>



                                        <?php echo e(Form::checkbox('job_positions_checks'.''.$keys2.''.'['.$key.']', '1','0',array('class' => '','id'=>'select_all'.$key.$keys2.'','placeholder '
                                                                        => $subcategory22->stepname))); ?>


                                     <?php echo e($subcategory22->stepname); ?>

                                    </label>
                                </li>
                                <?php endif; ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                    <div class="col-md-12" style="height:2px;border 2px red;background:green;margin:20px 0">

                    </div>

                    <?php $__currentLoopData = $treeView2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $category2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                
                    <?php if(!empty($category2->position_name)): ?>

                    <div class="col-md-4 transfer-blue remove<?php echo e($category2->job_position_main_id); ?>" id="remove<?php echo e($category2->job_position_main_id); ?>">
                        
                        <?php

                        $pin = rand(1000000, 9999999);
                        $string = $pin;
                        ?>
    
    <div class="transfer-input-blue">
                        <?php echo e(Form::hidden('position_name'.'['.$keys.']', $category2->position_name,array('id'=>'position_name-remove'.$category2->job_position_main_id))); ?>

    </div>
    <div class="transfer-input-blue">
                        <?php echo e(Form::hidden('job_position_main_id'.'['.$keys.']',
                        $category2->job_position_main_id,array('id'=>'job_position_main_id-remove'.$category2->job_position_main_id))); ?>

    </div>
    <div class="transfer-input-blue">
                        <?php echo e(Form::hidden('position_token'.'['.$keys.']',
                        $string,array('id'=>'position_token-remove'.$category2->job_position_main_id))); ?>

    </div>

                        <div class="btn-group">
                            <button type="button"
                                class="btn btn-default"><?php echo e($category2->position_name); ?></button>
                            <button type="button" class="btn btn-default dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu drop-days" role="menu" style="padding: 0;
                                border: 0;">

                                <?php $__currentLoopData = $category2->addinterviewer_jobpositions_steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key =>
                                $subcategory22): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(!empty($subcategory22->check_steps_name)): ?>
                                <li>
                                    <?php $keys2 = $keys + 1;
                                    ?>
                                    <label for="Representante Comercial">

                                        <?php echo e(Form::hidden('job_positions_checks_token'.''.$keys2.''.'['.$key.']', $string)); ?>


                                        <?php echo e(Form::hidden('check_steps_name'.''.$keys2.''.'['.$key.']', $subcategory22->check_steps_name)); ?>


                                        <?php echo e(Form::hidden('jobPositionStep_name'.''.$keys2.''.'['.$key.']', $subcategory22->jobPositionStep_name )); ?>


                                        <?php echo e(Form::hidden('job_positions_checks'.''.$keys2.''.'['.$key.']','0')); ?>


                                        <?php
                                        if($subcategory22->checked_not == '0'){
                                        $checked_tick = false;
                                        }
                                        else{
                                        $checked_tick = true;
                                        }
                                        ?>
                                        <?php echo e(Form::checkbox('job_positions_checks'.''.$keys2.''.'['.$key.']', '1',$checked_tick,array('class' => 'form-control'))); ?>

                                        <?php echo e($subcategory22->check_steps_name); ?>

                                    </label>
                                    
                                </li>
                                

                                <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            

                        </div>
                    </div>
                    <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $monday = $interviewerDataView->monday; $monday_nw = explode('|',$monday);
                            ?> <?php $__currentLoopData = $monday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $monday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw = $key + 7;
                                    ?>
                                    <?php if($monday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('monday['.$key_nw.']',
                                                                                                '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('monday['.$key_nw.']', '1',true,array('class' => 'form-control','placeholder'
                                                                            => '7:00'))); ?> <?php echo e($key_nw); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('monday['.$key_nw.']',
                                                                                                '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('monday['.$key_nw.']', '1','',array('class' => 'form-control','placeholder'
                                                                            => '7:00'))); ?> <?php echo e($key_nw); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                    </div>





                </div>
            </div>
            
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
                            <?php $tuesday = $interviewerDataView->tuesday; $tuesday_nw =
                            explode('|',$tuesday);
                            ?> <?php $__currentLoopData = $tuesday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2
                            => $tuesday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw2 = $key2 + 7;
                                    ?>

                                    <?php if($tuesday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('tuesday['.$key_nw2.']',
                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('tuesday['.$key_nw2.']', '1',true,array('class' => 'form-control','placeholder'
                        => '7:00'))); ?> <?php echo e($key_nw2); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('tuesday['.$key_nw2.']',
                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('tuesday['.$key_nw2.']', '1','',array('class' => 'form-control','placeholder'
                        => '7:00'))); ?> <?php echo e($key_nw); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                    </div>




                </div>
            </div>
            
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
                            <?php $wednesday = $interviewerDataView->wednesday; $wednesday_nw =
                            explode('|',$wednesday);
                            ?> <?php $__currentLoopData = $wednesday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key3 => $wednesday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw3 = $key3 + 7;




                                    ?>

                                    <?php if($wednesday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('wednesday['.$key_nw3.']',
                                                                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('wednesday['.$key_nw3.']', '1',true,array('class' => 'form-control','placeholder'
                                                                        => '7:00'))); ?> <?php echo e($key_nw3); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('wednesday['.$key_nw3.']',
                                                                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('wednesday['.$key_nw3.']', '1','',array('class' => 'form-control','placeholder'
                                                                        => '7:00'))); ?> <?php echo e($key_nw3); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                    </div>





                </div>
            </div>
            
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
                            <?php $thrusday = $interviewerDataView->thrusday; $thrusday_nw =
                            explode('|',$thrusday);
                            ?> <?php $__currentLoopData = $thrusday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key4 => $thrusday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw4 = $key4 + 7;




                                    ?>

                                    <?php if($thrusday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('thrusday['.$key_nw4.']',
                                    '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('thrusday['.$key_nw4.']', '1',true,array('class' => 'form-control','placeholder'
                => '7:00'))); ?> <?php echo e($key_nw4); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('thrusday['.$key_nw4.']',
                                    '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('thrusday['.$key_nw4.']', '1','',array('class' => 'form-control','placeholder'
                => '7:00'))); ?> <?php echo e($key_nw4); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                        </ul>
                    </div>






                </div>
            </div>
            
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
                            <?php $friday = $interviewerDataView->friday; $friday_nw = explode('|',$friday);
                            ?> <?php $__currentLoopData = $friday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key42 =>
                            $friday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw42 = $key42 + 7;
                                    ?>

                                    <?php if($friday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('friday['.$key_nw42.']',
                                    '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('friday['.$key_nw42.']', '1',true,array('class' => 'form-control','placeholder'
                => '7:00'))); ?> <?php echo e($key_nw42); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('friday['.$key_nw42.']',
                                    '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('friday['.$key_nw42.']', '1','',array('class' => 'form-control','placeholder'
                => '7:00'))); ?> <?php echo e($key_nw42); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            
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
                            <?php $saturday = $interviewerDataView->saturday; $saturday_nw =
                            explode('|',$saturday);
                            ?> <?php $__currentLoopData = $saturday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key6 => $saturday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw6 = $key6 + 7;




                                    ?>

                                    <?php if($saturday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('saturday['.$key_nw6.']',
                        '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('saturday['.$key_nw6.']', '1',true,array('class' => 'form-control','placeholder'
    => '7:00'))); ?> <?php echo e($key_nw6); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('saturday['.$key_nw6.']',
                        '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('saturday['.$key_nw6.']', '1','',array('class' => 'form-control','placeholder'
    => '7:00'))); ?> <?php echo e($key_nw6); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>




                </div>
            </div>
            
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
                            <?php $sunday = $interviewerDataView->sunday; $sunday_nw = explode('|',$sunday);
                            ?> <?php $__currentLoopData = $sunday_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key7 =>
                            $sunday_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw7 = $key7 + 7;




                                    ?>

                                    <?php if($sunday_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('sunday['.$key_nw7.']',
                                                                        '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('sunday['.$key_nw7.']', '1',true,array('class' => 'form-control','placeholder'
                                                    => '7:00'))); ?> <?php echo e($key_nw7); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('sunday['.$key_nw7.']',
                                                                        '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('sunday['.$key_nw7.']', '1','',array('class' => 'form-control','placeholder'
                                                    => '7:00'))); ?> <?php echo e($key_nw7); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>






                </div>
            </div>
             
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
                            <?php $main = $interviewerDataView->main; $main_nw = explode('|',$main);
                            ?> <?php $__currentLoopData = $main_nw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key72 => $main_nw_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-12 form-group">
                                <label for="representantecomercial">
                                    <?php
                                    $key_nw72 = $key72 + 7;




                                    ?>

                                    <?php if($main_nw_data == '1'): ?>
                                    <?php echo e(Form::hidden('main['.$key_nw72.']',
                                                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('main['.$key_nw72.']', '1',true,array('class' => 'form-control','placeholder'
                                                        => '7:00'))); ?> <?php echo e($key_nw72); ?>:00
                                    <?php else: ?>
                                    <?php echo e(Form::hidden('main['.$key_nw72.']',
                                                                            '0',array('class' => 'form-control'))); ?>

                                    <?php echo e(Form::checkbox('main['.$key_nw72.']', '1','',array('class' => 'form-control','placeholder'
                                                        => '7:00'))); ?> <?php echo e($key_nw72); ?>:00
                                    <?php endif; ?>
                                </label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>






                </div>
            </div>
            
        </div>
    </div>
    <div class="col-md-12 form-group">
        <?php echo e(Form::submit('UPDATE INTERVIEWER',array('class' => 'btn btn-success'))); ?>

    </div>
</div>
</div>
<?php echo Form::close(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>