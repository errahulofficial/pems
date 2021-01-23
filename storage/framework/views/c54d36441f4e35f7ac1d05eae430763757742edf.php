
<?php $__env->startSection('content'); ?>
<?php if(Session::has("success")): ?>
<div class="alert alert-success">
    <ul>
        <li><?php echo e(Session::get("success")); ?></li>
    </ul>
</div>
<?php endif; ?>
<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">My Team</h3>

        </div>
        <!-- /.box-header -->

        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Skype</th>
                        <th>Phone</th>
                        <th>Has</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $salesteam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->sales_person_name); ?></td>
                        <td><?php echo e($item->sales_person_email); ?></td>
                        <td><?php echo e($item->sales_person_skype); ?></td>
                        <td><?php echo e($item->sales_person_phone); ?></td>
                        <td><?php echo e('--'); ?></td>
                        <td><?php echo e('--'); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($salesteam->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>