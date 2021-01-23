 
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-4 d-flex align-items-center p-0">Add Employee</h3>
            <span class="col-xs-8 text-right p-0">
                <a class="btn btn-primary" href="<?php echo e(url('employee-level')); ?>">Add/View Level</a>
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

        <?php echo Form::open(['action' => 'employeeController@create','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">

                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> <?php echo e(Form::text('fname', '',array('class' => 'form-control','placeholder'
                    => 'name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> <?php echo e(Form::text('lname', '',array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> <?php echo e(Form::text('email', '',array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="level">Level</label> <?php echo e(Form::select('level',$selectEmployeelevel,NULL,array('class'=>'form-control','required'=>'true', 'placeholder' => '- Select Level -'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="division">Division</label> <?php echo e(Form::select('division',$selectEmployeedivision,'',array('class'=>'form-control','required'=>'true', 'placeholder' => '- Select Division -'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('ADD EMPLOYEE',array('class' => 'btn btn-success'))); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Invitation List</h3>
          

          
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employeeview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($employeeview->fname); ?></td>
                        <td><?php echo e($employeeview->lname); ?></td>
                        <td><?php echo e($employeeview->email); ?></td>
                        
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($employeeview->employeeid); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($employeeview->employeeid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('employee-delete')); ?>/<?php echo e($employeeview->employeeid); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal" data-target="#modal-edit-<?php echo e($employeeview->employeeid); ?>" href=""> <span class="label label-success"><i class="fa fa-pencil"></i></span></a>


                            <div class="modal modal-success fade" id="modal-edit-<?php echo e($employeeview->employeeid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit employee</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('employee-edit')); ?>/<?php echo e($employeeview->employeeid); ?>"><button type="button" class="btn btn-outline">Sure to edit !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <a data-toggle="modal" data-target="#modal-view-<?php echo e($employeeview->employeeid); ?>" href=""> <span class="label label-success"><i class="fa fa-eye"></i></span></a>

                            <div class="modal modal-success fade" id="modal-view-<?php echo e($employeeview->employeeid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title"><?php echo e($employeeview->fname); ?> <?php echo e($employeeview->lname); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Email</h4>
                                            <p> <?php echo e($employeeview->email); ?></p>
                                            <h4>Level</h4>
                                            <p> <?php echo e($employeeview->employeelevelname); ?></p>
                                            <h4>Division</h4>
                                            <p> <?php echo e($employeeview->employeedivisionName); ?></p>
                                            <h4>Created at</h4>
                                            <p> <?php echo e($employeeview->created_at); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
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
            <div class="px-10 py-0"> <?php echo e($employee->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>