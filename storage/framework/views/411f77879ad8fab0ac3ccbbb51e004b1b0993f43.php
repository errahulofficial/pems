 
<?php $__env->startSection('content'); ?>
<div class="col-md-3 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Portal City</h3>
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
       <?php echo Form::open(['action' => 'PortalCitiesController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
			
			<div class="col-md-12 form-group">
                    <label for="city_name">City Name</label> <?php echo e(Form::text('city_name', '',array('class' => 'form-control','placeholder'
                    => 'City Name','required'=>'true'))); ?>

                </div>
				
                <div class="col-md-12 form-group">
                    <label for="division_id">Division ID</label> <?php echo e(Form::select('division_id',$territory,null,array('class' => 'form-control','placeholder'
                    => 'Select Division ID','required'=>'true'))); ?>

                </div>
                
                
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('Add City',array('class' => 'btn btn-primary'))); ?>

                </div>
            </div>
        </div>
		
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="col-md-9 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Portal Cities</h3>
           
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
                        <th>City Name</th>
                        <th>Division ID</th>
                        <th>Territory Name</th>
						<th>Action</th>
                    </tr>
					
                    <?php $__currentLoopData = $cities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($city->city_name); ?></td>
                        <td><?php echo e($city->division_id); ?></td>
                        <td><?php echo e($territory[$city->division_id]); ?></td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($city->id); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($city->id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('pcity-del')); ?>/<?php echo e($city->id); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($cities->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>