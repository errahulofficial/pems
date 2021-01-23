
<?php $__env->startSection('content'); ?>
<style>
.w-75{
	width:80%;
}
</style>
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
            <h3 class="box-title">My Territory</h3>

        </div>
        <!-- /.box-header -->

		<div class="d-flex">
		<div class="box-body w-75">
			<img src="" >
		</div>
        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Counties</th>
                    </tr>
                    <?php $__currentLoopData = $counties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e($item->county_name); ?></td>
                       
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($counties->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>