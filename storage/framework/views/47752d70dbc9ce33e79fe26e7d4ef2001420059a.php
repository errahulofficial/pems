 
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Edit Black List</h3>
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
        <?php $__currentLoopData = $blacklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blacklistview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::open(['action' => ['blackListController@update',"".$blacklistview->blacklistid],'id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> <?php echo e(Form::text('fname', $blacklistview->fname, array('class' => 'form-control','placeholder'
                    => 'name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> <?php echo e(Form::text('lname', $blacklistview->lname, array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> <?php echo e(Form::text('email', $blacklistview->email, array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="phone">Phone</label> <?php echo e(Form::text('phone', $blacklistview->phone, array('class' => 'form-control','placeholder'
                    => 'Phone','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="city">City</label> <?php echo e(Form::text('city', $blacklistview->city, array('class' => 'form-control','placeholder'
                    => 'City','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label> <?php echo e(Form::text('state', $blacklistview->state, array('class' => 'form-control','placeholder'
                    => 'State','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="zip">Zip</label> <?php echo e(Form::text('zip', $blacklistview->zip, array('class' => 'form-control','placeholder' =>
                    'Zip','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                        <label for="note">Note</label> <?php echo e(Form::textarea('note', '',array('class' => 'form-control','placeholder'
                        => 'Note','required'=>'true','required'=>'true'))); ?>

                    </div>


                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('UPDATE BLACKLIST',array('class' => 'btn btn-primary'))); ?>

                    <span class="" ><a class="btn btn-success" href="<?php echo e(url('blacklist')); ?>">BACK / CANCEL</a></span>
    
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>