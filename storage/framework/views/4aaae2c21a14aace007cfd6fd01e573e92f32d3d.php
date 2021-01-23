
<?php $__env->startSection('content'); ?>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Edit Careers Question</h3>
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

        <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::open(['action' => ['careersQuestion@update',"".$dataView->questions_id]]); ?>

        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="form-group">
                <label for="question">Question</label>
            </div>
            <div class="form-group">
                <?php echo e(Form::text('question', $dataView->question,array('class' => 'form-control','placeholder' => 'Question'))); ?>

            </div>
         
            <div class="form-group">
                <?php echo e(Form::submit('Update',array('class' => 'btn btn-success'))); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <script src="https://code.jquery.com/jquery-latest.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>