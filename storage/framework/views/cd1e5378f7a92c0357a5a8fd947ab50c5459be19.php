<?php $__env->startSection('content'); ?>

<div class="col-md-12 d-flex">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interview Status Email</h3>
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
        <?php $__currentLoopData = $dataEmail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datashow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::open(['action' => ['interviewStatus@updateEmail'.'',$datashow->interviewstatusid]]); ?>

        <?php echo e(Form::token()); ?>

        <div class="box-body">

            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="Subject">Subject</label> <?php echo e(Form::text('emailSubject', $datashow->emailSubject,array('class' => 'form-control','placeholder'
                    => 'Subject'))); ?>

                </div>
               
              
                <div class="col-md-12 form-group">
                    <label for="EmailFromAddress">Email From Address</label> <?php echo e(Form::text('EmailFromAddress', $datashow->EmailFromAddress,array('class' => 'form-control','placeholder'
                    => 'Email From Address'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="EmailFromAddressPass">Email From Address Pass</label> <?php echo e(Form::text('EmailFromAddressPass', $datashow->EmailFromAddressPass,array('class' => 'form-control','placeholder'
                    => 'Email From Address Pass'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="EmailFromName">Email From Name</label> <?php echo e(Form::text('EmailFromName', $datashow->EmailFromName,array('class' => 'form-control','placeholder'
                    => 'Email From Name'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="variables">Variables</label>
                    <b>
                        {first_name} {last_name} {from_name} {login_link} {login_username} {login_password}
                        {job_position} {interview_time}
                    </b>
                </div>
                <div class="col-md-12 form-group">
                    <label for="HTMLMessage">HTML Message</label>

                    <?php if(!empty($datashow->HTMLMessage)): ?>

                    <?php echo e(Form::textarea('HTMLMessage', $datashow->HTMLMessage,array('class' => 'form-control ckeditor','placeholder'
                    => 'HTML Message'))); ?>

               
               <?php else: ?>

               <?php echo e(Form::textarea('HTMLMessage', '',array('class' => 'form-control ckeditor','placeholder'
               => 'HTML Message'))); ?>


                  <?php endif; ?>



                </div>

                <div class="col-md-12 form-group">
                    <label for="TextMessage">Text Message</label>
                    <?php echo e(Form::textarea('TextMessage', $datashow->TextMessage,array('class' => 'form-control','placeholder'
                    => 'Text Message'))); ?>

                </div>


            </div>
            <div class="form-group d-flex">
                <?php echo e(Form::submit('ADD',array('class' => 'btn btn-primary'))); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>