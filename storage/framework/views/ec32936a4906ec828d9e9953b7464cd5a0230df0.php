
<style>
  .bold {
    font-weight: bold;
  }

  .justify-content-between {
    justify-content: space-between;
  }
</style>
<?php $__env->startSection('content'); ?>
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
  <?php if(Session::has("success-delete")): ?>
  <div class="alert alert-success">
    <ul>
      <li><?php echo e(Session::get("success-delete")); ?></li>
    </ul>
  </div>
  <?php endif; ?>
</div>
<div class="col-md-12 d-flex">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Add Job positions</h3>
    </div>
    <?php echo Form::open(['action' => 'jobPositions@create','id'=>'form']); ?> <?php echo e(Form::token()); ?>

    <div class="box-body d-flex">
      <div class="form-group ">
        <?php echo e(Form::text('name', '',array('class' => 'form-control','placeholder' => 'Job Position Name','required'=>'true'))); ?>


      </div>
      <div class="form-group hidden">
        <label for="desc">Desc</label> <?php echo e(Form::textarea('desc', '',array('class' => 'form-control','placeholder' => 'Description'))); ?>

      </div>


      <div class="form-group hidden">
        <label for="status">Status</label> <?php echo e(Form::text('status', '',array('class' => 'form-control','placeholder' => 'Status'))); ?>


      </div>

      <div class="form-group">
        <?php echo e(Form::submit('ADD POSITION',array('class' => 'btn btn-primary'))); ?>

      </div>
    </div>
    <?php echo Form::close(); ?>

  </div>
</div>
<?php $__currentLoopData = $job; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-12 d-flex">
  <div class="box box-success">
    <div class="box-header with-border">
      <div class="d-flex justify-content-between">
        <span class="box-title bold"><?php echo e($jobview->name); ?></span>
        <span><a data-toggle="modal" data-target="#modal-edit-<?php echo e($jobview->jobPositionId); ?>" href=""> <span
              class="label label-success">Edit <i class="fa fa-pencil"></i></span></a>


          <div class="modal modal-success fade" id="modal-edit-<?php echo e($jobview->jobPositionId); ?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Edit Job Position</h4>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <a href="<?php echo e(url('job-positions-edit')); ?>/<?php echo e($jobview->jobPositionId); ?>"><button type="button"
                      class="btn btn-outline">Sure to edit !</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <a data-toggle="modal" data-target="#modal-delete-<?php echo e($jobview->jobPositionId); ?>" href=""> <span
              class="label label-danger">Delete <i class="fa fa-trash "></i></span></a>


          <div class="modal modal-danger fade" id="modal-delete-<?php echo e($jobview->jobPositionId); ?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                  <h4 class="modal-title">Delete Job Position</h4>
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <a href="<?php echo e(url('job-positions-delete')); ?>/<?php echo e($jobview->jobPositionId); ?>"><button type="button"
                      class="btn btn-outline">Sure to Delete !</button></a>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </span>
      </div>
    </div>
    <!-- /.box-header -->

    <div class="box-body px-10 py-0">
      <table class="table table-responsive table-hover">
        <thead>
          <tr class="bg-gray">
            <td>Step No.</td>
            <td>Step Name</td>
            <td>Time Span (minutes)</td>
            <td>Desc</td>
            <td>Action</td>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $jobsteps; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobstep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($jobview->jobPositionId === $jobstep->jobPositionId): ?>
          <tr>
            <?php echo Form::open(['action' => ['jobPositionsSteps@update',"".$jobstep->jobPositionStepId],'id'=>'form']); ?>

            <?php echo e(Form::token()); ?>

            <td>
              <div class="form-group">
                <?php echo e(Form::text('stepno', $jobstep->stepno,array('class' => 'form-control','placeholder' => 'Step No.','required'=>'true'))); ?>


              </div>
            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::text('stepname', $jobstep->stepname,array('class' => 'form-control','placeholder' => 'Step Name','required'=>'true'))); ?>


              </div>
            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::number('timespan', $jobstep->timespan,array('class' => 'form-control','placeholder' => 'Time Span','required'=>'true'))); ?>


              </div>
            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::text('desc', $jobstep->desc,array('class' => 'form-control','placeholder' => 'Desc','required'=>'true'))); ?>

              </div>
            </td>
            <td>
              <div class="form-group">
                
                <?php echo e(Form::submit('UPDATE',array('class' => 'btn btn-warning'))); ?>



                <a data-toggle="modal" data-target="#modal-delete-<?php echo e($jobstep->jobPositionStepId); ?>" href="">
                  <span class="btn btn-danger"> Delete</span></a>


                <div class="modal modal-danger fade" id="modal-delete-<?php echo e($jobstep->jobPositionStepId); ?>"
                  style="display: none;">
                  <div class="modal-dialog">
                    <div class="modal-contents">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Delete Job Position Step</h4>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <a href="<?php echo e(url('job-positions-steps-delete')); ?>/<?php echo e($jobstep->jobPositionStepId); ?>"><button
                            type="button" class="btn btn-outline">Sure to Delete !</button></a>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
              </div>
            </td>
          </tr>

          <?php echo Form::close(); ?>

          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <?php echo Form::open(['action' => ['jobPositionsSteps@create',"".$jobview->jobPositionId],'id'=>'form']); ?>

            <?php echo e(Form::token()); ?>

            <td>
              <div class="form-group">
                <?php echo e(Form::number('stepno', '',array('class' => 'form-control','placeholder' =>
            'stepno','required'=>'true'))); ?>


              </div>
            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::text('stepname', '',array('class' => 'form-control','placeholder' =>
            'name','required'=>'true'))); ?>


              </div>
            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::number('timespan', '',array('class' => 'form-control','placeholder'
            => 'Time Span','required'=>'true'))); ?>


              </div>

            </td>
            <td>
              <div class="form-group">
                <?php echo e(Form::text('desc', '',array('class' => 'form-control','placeholder' => 'Description','required'=>'true'))); ?>

              </div>
            </td>

            <td>
              <div class="form-group d-flex">
                <?php echo e(Form::submit('ADD STEP',array('class' => 'btn btn-primary'))); ?>


              </div>
            </td>
    <?php echo Form::close(); ?>

  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</tr>
</tbody>
</table>
</div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div class="px-10 py-0 text-center"> <?php echo e($job->links()); ?></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>