 
<?php $__env->startSection('content'); ?>
<style>
    .login-box,
    .register-box {
        width: 600px;
    }
    .invalid-feedback{
        position: absolute;
    font-size: 12px;
    }
    .invalid-feedback strong{
      font-weight: 400;
      color: red
    }
    .form-group {
    margin-bottom: 20px;
}
</style>
<div class="register-box">

    <div class="register-box-body">
        <div class="register-logo">
            <a href="<?php echo e(url('')); ?>"><b>PEMS REGISTER</b></a>
        </div>
        <form action="<?php echo e(route('register')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="row">
            <div class="col-md-6">
                <div class="form-group has-feedback">
                    <input id="fname" type="text" class="form-control<?php echo e($errors->has('fname') ? ' is-invalid' : ''); ?>" name="fname" value="<?php echo e(old('fname')); ?>"
                        placeholder="First Name" required autofocus> <?php if($errors->has('fname')): ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($errors->first('fname')); ?></strong>
                    </span> <?php endif; ?>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="lname" type="text" class="form-control<?php echo e($errors->has('lname') ? ' is-invalid' : ''); ?>" name="lname" value="<?php echo e(old('lname')); ?>"
                    placeholder="Last Name" required autofocus> <?php if($errors->has('lname')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('lname')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="phone" type="text" class="form-control<?php echo e($errors->has('phone') ? ' is-invalid' : ''); ?>" name="phone" value="<?php echo e(old('phone')); ?>"
                    placeholder="Phone" required autofocus> <?php if($errors->has('phone')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('phone')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-phone form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="city" type="text" class="form-control<?php echo e($errors->has('city') ? ' is-invalid' : ''); ?>" name="city" value="<?php echo e(old('city')); ?>"
                    placeholder="City" required autofocus> <?php if($errors->has('city')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('city')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="state" type="text" class="form-control<?php echo e($errors->has('state') ? ' is-invalid' : ''); ?>" name="state" value="<?php echo e(old('state')); ?>"
                    placeholder="State" required autofocus> <?php if($errors->has('state')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('state')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="zip" type="text" class="form-control<?php echo e($errors->has('zip') ? ' is-invalid' : ''); ?>" name="zip" value="<?php echo e(old('zip')); ?>"
                    placeholder="Zip" required autofocus> <?php if($errors->has('zip')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('zip')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?>"
                    placeholder="Email" required> <?php if($errors->has('email')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" name="password"
                    placeholder="Password" required> <?php if($errors->has('password')): ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span> <?php endif; ?>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            </div>

            <div class="col-md-6">
            <div class="form-group has-feedback">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password"
                    required>
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
            </div>
            </div>
          



                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                    <?php echo e(__('Register')); ?>

                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <?php if(Route::has('login')): ?>
        <div class="row">
        <a class="btn btn-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Already have an account ?')); ?></a> <?php endif; ?>
        </div>
    </div>
    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>