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
<?php if($stepsView->step1name != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->step1name); ?></h3>
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
                <?php elseif($stepsView->step1Type == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->step1; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->step2name != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->step2name); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->step2type == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->step2); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->step2type == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->step2); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->step2type == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->step2; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->step3name != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->step3name); ?></h3>
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
                <?php elseif($stepsView->step3Type == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->step3; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->step4name != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->step4name); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->step4type == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->step4); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->step4type == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->step4); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->step4type == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->step4; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname5 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname5); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype5 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont5); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype5 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont5); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype5 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont5; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname6 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname6); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype6 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont6); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype6 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont6); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype6 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont6; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname7 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname7); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype7 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont7); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype7 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont7); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype7 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont7; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname8 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname8); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype8 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont8); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype8 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont8); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype8 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont8; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname9 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname9); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype9 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont9); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype9 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont9); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype9 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont9; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php if($stepsView->stepname10 != ''): ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><?php echo e($stepsView->stepname10); ?></h3>
        </div>
        <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                <?php if($stepsView->steptype10 == 'vimeo'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://player.vimeo.com/video/<?php echo e($stepsView->stepcont10); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype10 == 'youtube'): ?>
                <div class="form-group" style="text-align: center">
                    <iframe src="https://www.youtube.com/embed/<?php echo e($stepsView->stepcont10); ?>"
                        width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                        allowfullscreen></iframe>
                </div>
                <?php elseif($stepsView->steptype10 == 'text'): ?>
                <div class="form-group">
                    <div class="col-md-12 m-auto" style="margin:auto;float:none;padding-bottom:20px">
                        <?php echo $stepsView->stepcont10; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="form-group">
                    <label for="video">No Description</label>
                </div>
                <?php endif; ?>
        </div>
    </div>
</div>
<?php endif; ?>

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