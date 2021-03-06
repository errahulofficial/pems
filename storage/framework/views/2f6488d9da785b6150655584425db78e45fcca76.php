 
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-3 d-flex align-items-center p-0">Add Level</h3>
            <span class="col-xs-9 text-right p-0">
                <a class="btn btn-primary" href="<?php echo e(url('employee')); ?>">Add/View Employee</a>
                <a class="btn btn-primary" href="<?php echo e(url('divisions')); ?>">Add/View Division</a>
            </span>
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

        <?php echo Form::open(['action' => 'employeeLevelController@create']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="Name">Name</label> <?php echo e(Form::text('name', '',array('class' => 'form-control','placeholder'
                    => 'name'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('ADD LEVEl',array('class' => 'btn btn-success'))); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Employee Level View</h3>
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
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $employeelevel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeelevelview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($employeelevelview->name); ?></td>

                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($employeelevelview->employeelevelid); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($employeelevelview->employeelevelid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('employee-level-delete')); ?>/<?php echo e($employeelevelview->employeelevelid); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal" data-target="#modal-edit-<?php echo e($employeelevelview->employeelevelid); ?>" href=""> <span class="label label-success"><i class="fa fa-pencil"></i></span></a>


                            <div class="modal modal-success fade" id="modal-edit-<?php echo e($employeelevelview->employeelevelid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit employee</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('employee-level-edit')); ?>/<?php echo e($employeelevelview->employeelevelid); ?>"><button type="button" class="btn btn-outline">Sure to edit !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($employeelevel->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>