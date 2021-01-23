 
<?php $__env->startSection('content'); ?>
<style>
.red{
	color: red;
}
</style>
  <?php if(Session::has("success-delete")): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(Session::get("success-delete")); ?></li>
                </ul>
            </div>
            <?php endif; ?>
<div class="col-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0"><b>Employees List  &nbsp;</b>  [Total : <?php echo e($empcount->count()); ?>]</h3>
        </div>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('list-employee')); ?>">Completed (<?php echo e($empcount->where('phone','!=', '')->where('city','!=', '')->where('state','!=', '')->where('zip','!=', '')->where('gender','!=', '')->where('home_address','!=', '')->where('role','!=','superadmin')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('not-completed')); ?>">Not Completed (<?php echo e($notcomp->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('not-register')); ?>"> Not registered (<?php echo e('0'); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('without-email')); ?>"> Without ABC Email (<?php echo e($empcount->where('email','')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active " href="<?php echo e(url('without-skype')); ?>">Without Skype (<?php echo e($empcount->where('skypeid','')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('without-card')); ?>">Without Card (<?php echo e($empcount->where('resume','')->count()); ?>)</a>
			  </li>
			 
			</ul>
    </div>
</div>
<div class="col-12 d-flex">
    <div class="box box-success">

        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
          
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Territory</th>
                        <th>LVL</th>
                        <th>Username</th>
						<th>Password</th>
						<th>Name / Email</th>
						<th>Last Login / Date Created</th>
						<th>ABC Email / Pass</th>
						<th>Skype ID / Pass</th>
						<th>Card</th>
                    </tr>
                    <?php $__currentLoopData = $employee->where('role','!=','superadmin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e(''); ?></td>
                        <td><?php echo e($employeeview->territory); ?></td>
                        <td><b>
						<?php if($employeeview->role == 'hr'): ?><?php echo e('HR'); ?>

						<?php elseif($employeeview->role == 'salesmanager'): ?><?php echo e('SM'); ?>

						<?php elseif($employeeview->role == 'salesperson'): ?><?php echo e('RC'); ?>

						<?php else: ?> <?php echo e('NSD'); ?></b></td>
                        <?php endif; ?>
                        <td><?php echo e(ucwords($employeeview->fname)); ?> <?php echo e(ucwords($employeeview->lname)); ?><br>
						<a href="<?php echo e(url('impersonate')); ?>/<?php echo e($employeeview->id); ?>" class="label label-success"><i class="fa fa-unlock"></i> Login as </a> &nbsp;
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($employeeview->id); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($employeeview->id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('employee-del')); ?>/<?php echo e($employeeview->id); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                           
                        </td>
						<td><?php echo e($employeeview->password_text); ?></td>
						<td><?php echo e(ucwords($employeeview->fname)); ?> <?php echo e(ucwords($employeeview->lname)); ?><br><?php echo e($employeeview->email); ?>

						</td>
						<td><span class="red"><?php echo e($employeeview->last_login); ?></span><br><?php echo e($employeeview->created_at); ?></td>
						<td><?php echo e($employeeview->email); ?><br><?php echo e($employeeview->password_text); ?></td>
						<td><?php echo e($employeeview->skypeid); ?><br><?php echo e($employeeview->password_text); ?></td>
						<td><?php $docs_folder = $employeeview->resume_folder; $docs =
                            $employeeview->resume; $singledocs
                            = explode(',',$docs);
							?> 
							<?php $__currentLoopData = $singledocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singledocsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(!empty($singledocsView)): ?><a href="<?php echo e(url("$docs_folder/$singledocsView ")); ?>"><i class="fa fa-search"></i> <i class="fa fa-address-card"></i></a>
							<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($employee->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>