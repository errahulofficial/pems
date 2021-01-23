<?php $__env->startSection('content'); ?>
<div class="login-box">
    <?php if(session('status')): ?>
    <div class="alert alert-success" role="alert">
        <?php echo e(session('status')); ?>

    </div>
    <?php endif; ?>
    
    <div class="login-box-body">
        <div class="login-logo">
            <a href="<?php echo e(url('')); ?>"><b>PEMS RESET PASSWORD</b></a>
        </div>
        
        <form  method="post" action="<?php echo e(route('password.email')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">
                
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required>
                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            
            <div class="row">
                
                <div class="col-xs-4">
                    
                    <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Send Password Reset Link')); ?>

                    </button>
                    
                </div>
                <!-- /.col -->
            </div>
        </form>
        
        <?php if(Route::has('register')): ?>
        
        <a class="btn btn-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a>
        
        <?php endif; ?>
        <?php if(Route::has('login')): ?>
        
        <a class="btn btn-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Already have an account ?')); ?></a>
        
        <?php endif; ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>