 
<?php $__env->startSection('content'); ?>
<style>
#progress {
 width: 80%;   
 border: 1px solid black;
 position: relative;
 padding: 1px;
}
label{
	    white-space: nowrap !important;
    align-self: center !important;
	width:40%
}
	</style>
<div class="col-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <span class="box-title">Managers & Teams</span>
          

          
        
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
                        <th>Manager</th>
                        <th>Territory</th>
                        <th>Team Completion</th>
                        <th>Options</th>
                    </tr>
					<?php $__currentLoopData = $sm->where('role','salesmanager'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sman): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td><?php echo e(ucwords($sman->fname)); ?> <?php echo e(ucwords($sman->lname)); ?></td>
						<td><?php echo e(ucwords($sman->name)); ?> </td>
						<td class="d-flex"><div id="progress">
								<div id="bar " style="width: calc(100% / <?php echo e($sman->available); ?> * <?php echo e($sman->where('role','salesperson')->where('manager_assign',$sman->id)->count()); ?>); height: 20px;
							 background-color: green;"></div>
							</div> &nbsp;<?php echo e($sman->where('role','salesperson')->where('manager_assign',$sman->id)->count()); ?>/<?php echo e($sman->available); ?>   </td>
						<td><a data-toggle="modal" data-target="#modal-schedule-<?php echo e($sman->id); ?>"><i class="fa fa-search" aria-hodden="true"></i> View </a></td>
					</tr>
					
			 <div class="modal modal-danger fade" id="modal-schedule-<?php echo e($sman->id); ?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title"><?php echo e(ucwords($sman->fname)); ?> <?php echo e(ucwords($sman->lname)); ?>'s Team</h4>
                </div>
				<div class="modal-body">
				<?php $__currentLoopData = $sm->where('role','salesperson')->where('manager_assign',$sman->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<?php echo Form::open(['action' => 'SalesManagerController@store']); ?> 
        <?php echo e(Form::token()); ?>

		
		<?php echo e(Form::hidden('salesperson', $sp->id,array('class'=> 'form-control'))); ?>

		
		
		<?php $smang = $sm->where('role','salesmanager');
		$smanag = [];
        foreach ($smang as $smg) {
			array_push($smanag,"Unassign");
            $smanag[$smg->id] = ucwords($smg->fname).' '.ucwords($smg->lname);
			
        }
		?>
		<div class="col-md-9 form-group d-flex">
                        <label for="gender"><?php echo e(ucwords($sp->fname)); ?> <?php echo e(ucwords($sp->lname)); ?> &nbsp;</label> <?php echo e(Form::select('manager_assign', $smanag,'',array('class'=> 'form-control','placeholder' => '- Assign To -'))); ?>

                    </div>
		
		 <div class="form-group text-center">
                <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

				</div>

				       <?php echo Form::close(); ?>

				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
			
        </div>
		</div>
		
		 
</div>
<div class="col-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <span class="box-title">Unassigned Retail Consultants</span>
          

          
        
        <!-- /.box-header -->
        <div class="box-header with-border">
		<div class="box-body table-responsive px-10 py-0">
			<table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Territory</th>
                        <th>No. Unassigned</th>
                        <th>Options</th>
                    </tr>
					<?php $__currentLoopData = $territory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $territory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
					<td><?php echo e(ucwords($territory->name)); ?></td>
					<td>
					
					<?php echo e($sm->where('role','salesperson')->where('division_id',$territory->division_id)->where('manager_assign','0')->count()); ?>

					
					</td>
					<td><a data-toggle="modal" data-target="#modal-schedule-<?php echo e($territory->division_id); ?>"><i class="fa fa-search" aria-hodden="true"></i> View </a></td>
					
					</tr>
					
					 <div class="modal modal-danger fade" id="modal-schedule-<?php echo e($territory->division_id); ?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Unsigned Sales People in <?php echo e(ucwords($territory->name)); ?></h4>
                </div>
				<div class="modal-body">
				<?php $__currentLoopData = $sm->where('role','salesperson')->where('division_id',$territory->division_id)->where('manager_assign','0'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				
				<?php echo Form::open(['action' => 'SalesManagerController@store']); ?> 
        <?php echo e(Form::token()); ?>

		
		<?php echo e(Form::hidden('salesperson', $sp->id,array('class'=> 'form-control'))); ?>

		
		
		<?php $smang = $sm->where('role','salesmanager');
		$smanag = [];
        foreach ($smang as $smg) {
			array_push($smanag,"Unassign");
            $smanag[$smg->id] = ucwords($smg->fname).' '.ucwords($smg->lname);
			
        }
		?>
		<div class="col-md-9 form-group d-flex">
                        <label for="gender"><?php echo e(ucwords($sp->fname)); ?> <?php echo e(ucwords($sp->lname)); ?> &nbsp;</label> <?php echo e(Form::select('manager_assign', $smanag,'',array('class'=> 'form-control','placeholder' => '- Assign To -'))); ?>

                    </div>
		
		 <div class="form-group text-center">
                <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

				</div>

				       <?php echo Form::close(); ?>

				
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
		</div>
		
		 
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>