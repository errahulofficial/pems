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
            <h3 class="box-title">Interview Details</h3>
        </div>
        <div class="row" style="width:100%;margin:10px 0">
            <div class="form-group">
               
                <table class="table table-hover">
                    <tbody>
                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $det): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
							<h4>Interview Scheduled on:<b> <?php echo e(ucwords($det->day)); ?> <?php echo e($det->interview_date); ?> at <?php if($det->interview_time_select > 12): ?><?php echo e($det->interview_time_select -12); ?>:00 PM
							<?php else: ?> <?php echo e($det->interview_time_select); ?>:00 AM <?php endif; ?> </b></h4>
                        </tr>
                        <tr>
							<h4>Login Link:   Username : <b><a href="<?php echo e(url('careers/login')); ?>"><?php echo e(url('careers/login')); ?></b><br></a></h4>
                        </tr>
						
						<tr>
							<h4>Login Details:<br>  
							Username : <b><?php echo e($det->email); ?></b><br>
							Password : <b>admin746#</b>
							</h4>
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