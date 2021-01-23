
<?php $__env->startSection('content'); ?>
<div class="col-md-6">
  
  <div class="box box-primary">
    <div class="box-header with-border d-flex align-items-center">
      <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Job positions edit</h3>
      <span class="col-xs-6 text-right p-0" ><a class="btn btn-primary" href="<?php echo e(url('job-positions')); ?>">Add/View Job position Steps</a></span>
    </div>

    <div class="col-md-12">
 <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="alert alert-danger">
                        <ul>
                            <li><?php echo e($error); ?></li>
                        </ul>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php if(Session::has("success")): ?>
                    <div class="alert alert-success">
                        <ul>
                            <li><?php echo e(Session::get("success")); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>
    </div>
    <?php $__currentLoopData = $job; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php echo Form::open(['action' => ['jobPositions@update',"".$jobview->jobPositionId]]); ?>

   <?php echo e(Form::token()); ?>

      <div class="box-body">
        <div class="form-group">
          <label for="name">Name</label>
          <?php echo e(Form::text('name', $jobview->name,array('class' => 'form-control','placeholder' => 'Name'))); ?>

       
        </div>
        
         <div class="form-group">
          <label for="desc">Desc</label>
          <?php echo e(Form::textarea('desc', $jobview->desc,array('class' => 'form-control','placeholder' => 'Desc'))); ?>

        </div>

        <div class="form-group">
            <label for="status">Status</label> <?php echo e(Form::text('status', $jobview->status,array('class' => 'form-control','placeholder' => 'Status'))); ?>

    
          </div>
        
        <div class="form-group">
          <?php echo e(Form::submit('UPDATE',array('class' => 'btn btn-primary'))); ?>

      </div>
    </div>
   <?php echo Form::close(); ?>

   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>