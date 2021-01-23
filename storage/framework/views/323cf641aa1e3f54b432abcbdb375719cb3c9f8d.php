
<?php $__env->startSection('content'); ?>
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


         <?php echo Form::open(['action' => 'interviewer@create','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="employeeName">Select Employee</label> <?php echo e(Form::select('employeeName',$selectemployeeData,NULL,array('class'=>'form-control','required'=>'true'))); ?>

                </div>
                <div class="col-md-4 form-group">
                    <label for="InterviewerEmail">Interviewer Email</label> <?php echo e(Form::text('intervieweremail', '',array('class'
                    => 'form-control','placeholder' => 'Interviewer Email'))); ?>

                </div>
                <div class="col-md-4 form-group">
                    <label for="intervieweremailpass">Interviewer Email Pass</label> <?php echo e(Form::text('intervieweremailpass',
                    '',array('class' => 'form-control','placeholder' => 'Interviewer Email Pass'))); ?>

                </div>



                <div class="col-md-12 form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="d-inline-block text-center">
                                <?php $__currentLoopData = $treeView2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keys => $category2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $pin = rand(1000000, 9999999);
                                $string = $pin;
                                ?>
                                <?php echo e(Form::hidden('position_name'.'['.$keys.']',
                                $category2->name)); ?>


                                <?php echo e(Form::hidden('job_position_main_id'.'['.$keys.']',
                                $category2->jobPositionId)); ?>




                                <?php echo e(Form::hidden('position_token'.'['.$keys.']', $string)); ?>

                                <?php if(!empty($category2->name)): ?>
                                <div class="col-md-4 removediv" id="removeasla<?php echo e($keys); ?>" style="margin-bottom: 20px">



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
                                    <script>
                                        $myList = $('#removeasla<?php echo e($keys); ?> ul')
if ( $myList.children().length === 0 ){
    $('#removeasla<?php echo e($keys); ?>').remove();
}
                                    </script>



                                </div>
                                <?php endif; ?>




                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                            <?php for($i=7;$i<=24;$i++): ?> <div class="col-md-12 form-group">
                                                <label for="representantecomercial">
                                                    <?php echo e(Form::hidden('monday['.$i.']',
                                                                                '0',array('class' => 'form-control'))); ?>


                                                    <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php
                                                        $checked="" ; ?> <?php endif; ?> <li><?php echo e(Form::checkbox('monday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                      => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                                </label>
                                    </div>
                                    <?php endfor; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    
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
                                        <?php for($i=7;$i
                                        <=24;$i++): ?> <div class="col-md-12 form-group">
                                            <label for="representantecomercial">
                                                <?php echo e(Form::hidden('tuesday['.$i.']',
                                                                                '0',array('class' => 'form-control'))); ?>

                                                <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php
                                                    $checked="" ; ?> <?php endif; ?> <li><?php echo e(Form::checkbox('tuesday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                            </label>
                                </div>
                                <?php endfor; ?>
                                </ul>
                            </div>

                        </div>


                    </div>
                </div>
                
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
                                    <?php for($i=7;$i
                                    <=24;$i++): ?> <div class="col-md-12 form-group">
                                        <label for="representantecomercial">
                                            <?php echo e(Form::hidden('wednesday['.$i.']',
                                                                           '0',array('class' => 'form-control'))); ?>

                                            <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php
                                                $checked="" ; ?> <?php endif; ?> <li> <?php echo e(Form::checkbox('wednesday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                        </label>
                            </div>
                            <?php endfor; ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
            
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
                                <?php for($i=7;$i
                                <=24;$i++): ?> <div class="col-md-12 form-group">
                                    <label for="representantecomercial">
                                        <?php echo e(Form::hidden('thrusday['.$i.']',
                                        '0',array('class' => 'form-control'))); ?>

                                        <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php $checked=""
                                            ; ?> <?php endif; ?> <?php echo e(Form::checkbox('thrusday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                    => '7:00'))); ?> <?php echo e($i); ?>:00 </label> </div> <?php endfor; ?> </div> </div> </div> </div>
                                             <div class="col-grow">

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
                                                            <?php for($i=7;$i
                                                            <=24;$i++): ?> <div class="col-md-12 form-group">
                                                                <label for="representantecomercial">
                                                                    <?php echo e(Form::hidden('friday['.$i.']',
                                                                 '0',array('class' => 'form-control'))); ?>

                                                                    <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ;
                                                                        ?> <?php else: ?> <?php $checked="" ; ?> <?php endif; ?>
                                                                        <li> <?php echo e(Form::checkbox('friday['.$i.']','1',$checked,array('class' => 'form-control','placeholder'
                                                                  => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                                                </label>
                                                    </div>
                                                    <?php endfor; ?>


                                                </div>
                                            </div>
                        </div>
                    </div>
                    
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
                                        <?php for($i=7;$i
                                        <=24;$i++): ?> <div class="col-md-12 form-group">
                                            <label for="representantecomercial">
                                                <?php echo e(Form::hidden('saturday['.$i.']',
                              '0',array('class' => 'form-control'))); ?>

                                                <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php
                                                    $checked="" ; ?> <?php endif; ?> <li><?php echo e(Form::checkbox('saturday['.$i.']', '1',$checked,array('class' => 'form-control','placeholder'
                                    => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                            </label>
                                </div>
                                <?php endfor; ?>


                            </div>
                        </div>




                    </div>
                </div>
                
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
                                    <?php for($i=7;$i
                                    <=24;$i++): ?> <div class="col-md-12 form-group">
                                        <label for="representantecomercial">
                                            <?php echo e(Form::hidden('sunday['.$i.']',
                         '0',array('class' => 'form-control'))); ?>

                                            <?php if($i >= 9 && $i <= 17 ): ?> <?php $checked="true" ; ?> <?php else: ?> <?php
                                                $checked="" ; ?> <?php endif; ?> <li> <?php echo e(Form::checkbox('sunday['.$i.']', '1',$checked ,array('class' => 'form-control','placeholder'
                                    => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                        </label>
                            </div>
                            <?php endfor; ?>


                        </div>
                    </div>





                </div>
            </div>
            


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
                                <?php for($i=7;$i
                                <=24;$i++): ?> <div class="col-md-12 form-group">
                                    <label for="representantecomercial">
                                        <?php echo e(Form::hidden('main['.$i.']',
                              '0',array('class' => 'form-control'))); ?>


                                        <li> <?php echo e(Form::checkbox('main['.$i.']', '1','' ,array('class' => 'form-control','placeholder'
                                         => '7:00'))); ?> <?php echo e($i); ?>:00</li>
                                    </label>
                        </div>
                        <?php endfor; ?>


                    </div>
                </div>





            </div>
        </div>
        
    </div>
</div>
<div class="col-md-12 form-group">
    <?php echo e(Form::submit('ADD INTERVIEWER',array('class' => 'btn btn-success'))); ?>

</div>
</div>
</div>
<?php echo Form::close(); ?>


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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>