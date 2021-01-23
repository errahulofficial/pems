
<?php $__env->startSection('content'); ?>
<?php if(Session::has("scheduled")): ?>
        <div class="alert alert-success">
            <ul>
                <li><?php echo e(Session::get("scheduled")); ?></li>
            </ul>
        </div>
        <?php endif; ?>
<div class="col-md-8 m-auto" style="margin:auto;float:none">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">JOBS</h3>
        </div>
        <div class="row" style="width:100%;margin:10px 0">
            <div class="form-group">
               
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <th>Apply for job</th>
                        </tr>
                        <?php $__currentLoopData = $jobPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPositionsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                        <td><?php echo e($jobPositionsView->name); ?></td>
                        <td>
                          <a href="<?php echo e(url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token); ?>">
                           <h4 class="label btn-warning">Apply</h4>
                        </a>
                           </td> 
                            <td>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>