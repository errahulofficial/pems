
<?php $__env->startSection('content'); ?>
<div class="col-md-12">

       
        
        

<?php if(!$steps->isEmpty()): ?>
<?php $__currentLoopData = $steps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stepsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<div class="col-md-8 m-auto" style="margin:auto;float:none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Introduction</h3>
            </div>
            <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
            <?php echo $stepsView->introduction; ?>

            </div>
        
        </div>
</div>


<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Step 1</h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->step1Type == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->step1); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->step1Type == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->step1); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No video</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>

<div class="col-md-8  m-auto" style="margin:auto;float:none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Step 2</h3>
            </div>
            <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                    <?php echo $stepsView->step2; ?>

                </div>
        </div>
</div>


<div class="col-md-8  m-auto" style="margin:auto;float:none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Step 3</h3>
            </div>
            <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                    <?php if($stepsView->step3Type == 'vimeo'): ?>
                    <div class="form-group" style="text-align: center">
                        <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->step3); ?>"
                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                            allowfullscreen></iframe>
                    </div>
                     <?php elseif($stepsView->step3Type == 'youtube'): ?>
                    <div class="form-group" style="text-align: center">
                        <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->step3); ?>"
                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                            allowfullscreen></iframe>
                    </div>
                    <?php else: ?>
                    <div class="form-group">
                            <label for="video">No video</label>
                    </div>
                    <?php endif; ?>
                </div>
        </div>
</div>

<div class="col-md-8  m-auto" style="margin:auto;float:none">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Step 4</h3>
            </div>
            <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
            <a target="_blank" href="<?php echo e($stepsView->step4); ?>"><?php echo e($stepsView->step4); ?></a>
                </div>
        </div>
</div>

<div class="col-md-8  m-auto" style="margin:auto;float:none">
        <div class="">
         <div class="col-md-12 m-auto" style="margin:auto;float:none;padding:20px 0px; ">
                
         <a href="<?php echo e(url('careers/survey')); ?>/<?php echo e($id); ?>/<?php echo e($random_token); ?>/<?php echo e(Session::get("steptimer")); ?>/<?php echo e(Session::get("session_token")); ?>">
            <p class="btn btn-warning">I've completed the steps & am ready to schedule my interview</p>
        </a>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?> 
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">No Data Found</h3>
        </div>
    </div>
</div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>