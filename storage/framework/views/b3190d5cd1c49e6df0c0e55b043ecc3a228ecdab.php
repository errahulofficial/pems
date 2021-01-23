
<?php $__env->startSection('content'); ?>
<style>
    .mr-10{
        margin-right:10px!important
    }
    </style>

<div class="col-md-8 m-auto" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Survey</h3>
        </div>
    <div class="row">
        <div class="box-body">
                <?php echo Form::open(['action' => ['careers_controller@questionsSubmit',$id,$random_token]]); ?>

                <?php echo e(Form::token()); ?>

                <?php echo e(Form::hidden('sma',Session::get("timer"))); ?>

                <?php echo e(Form::hidden('token',$step5)); ?>

                <?php echo e(Form::hidden('s_token',$session_token)); ?>


                <?php 
                $i= 1;
                ?>
                <?php $__currentLoopData = $questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $questions_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group col-md-12">
                <h4><?php echo e($i); ?>. <?php echo e($questions_view->question); ?></h4>
                    <?php echo e(Form::radio('survey'.$i.'[]','1','1',array('class' => 'form-control'))); ?> 
                    <label for="see" class="mr-10"> Yes</label>
                    <?php echo e(Form::radio('survey'.$i.'[]','0','0',array('class' => 'form-control ml-10'))); ?> 
                    <label for="see"> No</label>
                </div>
                <?php 
                $i++;
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="form-group col-md-12">
                <div class="form-group">
                        <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

                    </div>
                </div>
                <?php echo Form::close(); ?>

        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>