
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Reserved Time</h3>
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
        

        <?php echo Form::open(['action' => 'interviewer@reservedtime','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
                <?php echo e(Form::hidden('parentid', $id)); ?>

        

            <div class="form-group">
                <label for="from_date">From Date</label> <?php echo e(Form::date('from_date', '',array('class' => 'form-control','placeholder' => 'From Date','required'=>'true'))); ?>


            </div>
            <div class="form-group">
                <label for="to_date">To Date</label> <?php echo e(Form::date('to_date', '',array('class' => 'form-control','placeholder' => 'To Date','required'=>'true'))); ?>


            </div>


            <div class="form-group">
                <label for="reason">Reason</label> <?php echo e(Form::textarea('reason', '',array('class' => 'form-control','placeholder' => 'Reason','required'=>'true'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::submit('ADD RESERVED TIME',array('class' => 'btn btn-primary'))); ?>

            </div>


        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
      <div class="box-header with-border">
        <h3 class="box-title">Reserved Time View</h3>
  
  
      </div>
      <!-- /.box-header -->
      <div class="box-body table-responsive px-10 py-0">
        <?php if(Session::has("success-delete")): ?>
        <div class="alert alert-success">
          <ul>
            <li><?php echo e(Session::get("success-delete")); ?></li>
          </ul>
        </div>
        <?php endif; ?>
        <table class="table table-hover">
          <tbody>
            <tr>
              <th>From Date</th>
              <th>To Date</th>
              <th>Reason</th>
            </tr>
  
            <?php $__currentLoopData = $reservedtime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>

              <td><?php echo e($dataview->from_date); ?></td>

              <td><?php echo e($dataview->to_date); ?></td>

              <td><?php echo e($dataview->reason); ?></td>
              <td>
                  <a href="<?php echo e(url('delete-reserved-time')); ?>/<?php echo e($dataview->id); ?>">
                      <span class="label label-danger"> Delete <i class="fa fa-trash"></i></span>
                  </a>
              </td>

             </tr>
  
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
          </tbody>
        </table>
        <div class="px-10 py-0"> <?php echo e($reservedtime->links()); ?></div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>