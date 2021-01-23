
<?php $__env->startSection('content'); ?>
<style>
    textarea{
        max-height: 250px;
    }
    </style>
<div class="container d-flex">

    <div class="box box-primary">
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

        <?php echo Form::open(['action' => 'EmpRegister@store','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> <?php echo e(Form::text('fname', '',array('class' => 'form-control','placeholder'
                    => 'First Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> <?php echo e(Form::text('lname', '',array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> <?php echo e(Form::text('email', $emp->email,array('class' => 'form-control', 'required'=>'true', 'disabled'=>'true'))); ?>

                    <?php echo e(Form::hidden('email', $emp->email,array('class' => 'form-control', 'required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="password">Password</label> <?php echo e(Form::password('password',array('class' => 'form-control', 'required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                   <?php echo e(Form::hidden('level',$emp->level,array('class' => 'form-control', 'required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="apptcond">Terms & Conditions</label>
                    <?php echo e(Form::textarea('apptcond', $emp->apptcond,array('class' => 'form-control','required'=>'true', 'rows' => 50,))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('Register and create your account',array('class' => 'btn btn-success'))); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>