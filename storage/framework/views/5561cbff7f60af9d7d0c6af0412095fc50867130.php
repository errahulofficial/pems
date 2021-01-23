<?php $__env->startSection('content'); ?>
<style>
    .required-field::after {
  content: "*";
  color: red;
  margin-left:2px
}
    .required-file::after {
  content: "*  (max_file_size: 5MB) (file_type: docs, pdf) ";
  color: red;
  margin-left:2px
}
</style>
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
                <h3 class="box-title">Hello there and thank you for applying!</h3>
                <p>We need to schdule your interview with the appropriate manager in your area, so please enter in your name, phone number, contact email, and zip code so we can send this interview to the appropriate manager in your area. </p>
            <p>We are looking forward to our interview with you!</p>
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
            <?php echo Form::open(['action' => ['careers_controller@continue',$id,$random_token],'files'=>'true']); ?>

            <?php echo e(Form::token()); ?>

            <div class="box-body">
                <div class="row">
				<?php if($refer != ''): ?>
				<?php echo e(Form::hidden('refer',$refer,array('class' => 'form-control','placeholder'
                        => 'refer'))); ?>

						<?php endif; ?>
                    <div class="col-md-6 form-group">
                        <label for="fname" class="required-field">First Name</label> <?php echo e(Form::text('fname', '',array('class' => 'form-control','placeholder'
                        => 'First Name'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lname" class="required-field">Last Name</label> <?php echo e(Form::text('lname', '',array('class' => 'form-control','placeholder'
                        => 'Last Name'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email" class="required-field">Email</label> <?php echo e(Form::text('email', '',array('class' => 'form-control','placeholder'
                        => 'Email'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone" class="required-field">Best Phone</label> <?php echo e(Form::text('phone', '',array('class' => 'form-control','placeholder'
                        => 'Best Phone'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="zipcode" class="required-field">Zip Code</label> <?php echo e(Form::text('zipcode', '',array('class' => 'form-control','placeholder'
                        => 'Zip Code'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city" class="required-field">City</label> <?php echo e(Form::text('city', '',array('class' => 'form-control','placeholder'
                        => 'City'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                            <label for="state" class="required-field">State</label> <?php echo e(Form::text('state', '',array('class' => 'form-control','placeholder'
                            => 'State'))); ?>

                        </div>
                    <div class="col-md-6 form-group">
                        <label for="name" class="required-file">Your Resume</label> <?php echo e(Form::file('resume',array('class' => 'form-control','placeholder'
                        => 'Name'))); ?>

                    </div>
                  </div>
                <div class="form-group d-flex">
                    <?php echo e(Form::submit('Continue',array('class' => 'btn btn-primary'))); ?>

                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>