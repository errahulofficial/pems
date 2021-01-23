<?php $__env->startSection('content'); ?>

<div class="col-md-8 m-auto" style="margin:auto;float:none">
      
        <?php if(Session::has("blacklisted")): ?>
        <div class="alert alert-warning">
            <ul>
                <li><?php echo e(Session::get("blacklisted")); ?></li>
            </ul>
        </div>
        <?php endif; ?>

        <?php if(Session::has("userexists")): ?>
        <div class="alert alert-warning">
            <ul>
                <li><?php echo e(Session::get("userexists")); ?></li>
            </ul>
        </div>
        <?php endif; ?>

        

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Instruction text</h3>

     <?php $__currentLoopData = $jobPositionsGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPositionsGetView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <h3><?php echo e($jobPositionsGetView->name); ?></h3>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(!$interviewStepsGet->isEmpty()): ?>

                    <?php $__currentLoopData = $interviewStepsGet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewStepsGetView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php if( $interviewStepsGetView->stepno == 1): ?>
                    <h5><i><?php echo e($interviewStepsGetView->check_steps_name); ?></i></h5>

                  

                    <p><?php echo e($interviewStepsGetView->desc); ?></p>

                    <div id="onTimeSelect">
                        <h4>Interview Start : <?php echo e($timevalue); ?>:00 (Timespan: ~<?php echo e($interviewStepsGetView->timespan); ?>min)</h4>
                       </div>
                       <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    No Step Assign
                    <?php endif; ?>

            <h2>Interview scheduled on <?php echo e($day); ?> <?php echo e($date); ?></h2>
            <div class="form-group">

                <a href="<?php echo e(url('careers/interview/scheduled')); ?>/<?php echo e($id); ?>/<?php echo e($random_token); ?>/<?php echo e($s_token); ?>">
                        <?php echo e(Form::submit('Schedule Interview',array('class' => 'btn btn-success'))); ?>

                </a>
                    
            <a href="<?php echo e(url('careers/interview/cancel')); ?>/<?php echo e($id); ?>/<?php echo e($random_token); ?>/<?php echo e($s_token); ?>">
                      <?php echo e(Form::submit('Cancel Interview',array('class' => 'btn btn-danger'))); ?>

                </a>


            </div>

            
            </div>
            
           
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>