
<?php $__env->startSection('content'); ?>
<div class="login-box">
    
    
    <div class="login-box-body">
        <div class="login-logo">
            <a href="<?php echo e(url('')); ?>"><b>CAREERS LOGIN</b></a>
        </div>
        
        <form  method="post" action="<?php echo e(route('applicant.login.submit')); ?>">
            <?php echo csrf_field(); ?>
            <div class="form-group has-feedback">
                
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>" placeholder="Email" required autofocus>
                <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password" placeholder="Password"  required>
                <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"  <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember Me
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                    <?php echo e(__('Login')); ?>

                    </button>
                    
                </div>
                <!-- /.col -->
            </div>
        </form>
        
        <?php if(Route::has('password.request')): ?>
        <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>">
            <?php echo e(__('Forgot Password')); ?>

        </a>
        <?php endif; ?>
        <?php if(Route::has('register')): ?>
        
        <!--a class="btn btn-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Register')); ?></a-->
        
        <?php endif; ?>
    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>