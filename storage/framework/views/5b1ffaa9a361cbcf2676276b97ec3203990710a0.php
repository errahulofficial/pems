 
<?php $__env->startSection('content'); ?>
<div class="col-md-3 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Division</h3>
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

       <?php echo Form::open(['action' => 'DivisionController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="First Name">Region ID</label> <?php echo e(Form::select('region_id', $selectregion , '' ,array('class' => 'form-control','placeholder'
                    => 'Region ID','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="lname">Name</label> <?php echo e(Form::text('name', '',array('class' => 'form-control','placeholder'
                    => 'Territory Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="email">State</label> <?php echo e(Form::text('state', '',array('class' => 'form-control','placeholder'
                    => 'State Code','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="phone">Available</label> <?php echo e(Form::text('available', '',array('class' => 'form-control','placeholder'
                    => 'Available','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="city">Email</label> <?php echo e(Form::text('email', '',array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true'))); ?>

                </div>
                
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('Add Territory',array('class' => 'btn btn-primary'))); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
</div>
<div class="col-md-9 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Divisions / Territories</h3>
           
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
                        <th>Division ID</th>
                        <th>Region ID</th>
                        <th>Name</th>
                        <th>State</th>
                        <th>Available</th>
						<th>Email</th>
						<th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $divisions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $division): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($division->division_id); ?></td>
                        <td><?php echo e($division->region_id); ?></td>
                        <td><?php echo e($division->name); ?></td>
                        <td><?php echo e($division->state); ?></td>
						<td><?php echo e($division->available); ?></td>
						<td><?php echo e($division->support_email); ?></td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($division->division_id); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($division->division_id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('division-delete')); ?>/<?php echo e($division->division_id); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
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
            <div class="px-10 py-0"> <?php echo e($divisions->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>