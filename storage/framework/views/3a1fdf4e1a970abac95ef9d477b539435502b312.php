 
<?php $__env->startSection('content'); ?>
<style>
.w-fit{
	width: max-content;
}
a.nav-link.active {
    background: #3c8dbc;
    color: white;
}
	a.nav-link.active:hover {
    background: #3c8dbc;
    color: white;
}
</style>
<div class="col">
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
<div class="col d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">My Local Market Segments</h3>
        </div>
		<ul class="nav nav-tabs">
			  <li class="nav-item">
				<a class="nav-link active" href="<?php echo e(url('projects')); ?>">Market Segments   (<?php echo e($projects->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('prospects')); ?>">Add Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('contacts')); ?>">Contacts (<?php echo e($prospects->where('commit_stage', '0')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('1st-commit')); ?>">1st Commits (<?php echo e($prospects->where('commit_stage', '1')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('2nd-commit')); ?>">2nd Commits (<?php echo e($prospects->where('commit_stage', '2')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link " href="<?php echo e(url('side-dish')); ?>">Monitoring (<?php echo e($prospects->where('commit_stage', '3')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('marked-sold')); ?>">Marked as Sold
				 (<?php echo e($prospects->where('commit_stage', '4')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('marked-closed')); ?>">Marked as Closed (<?php echo e($prospects->where('commit_stage', '5')->count()); ?>)</a>
			  </li>
			</ul>
    </div>
</div>
<div style="margin-bottom:20px">
<button class="btn btn-primary" data-toggle="modal" data-target="#modal-addproject"> Add Local Market Segments</button>

 <div class="modal modal-danger fade" id="modal-addproject" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Add Local Market Segments</h4>
                </div>
				<div class="modal-body">
        <?php echo Form::open(['action' => 'ProjectsController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        
            <div class="form-group">
                <label for="title">Create a Segment</label> <?php echo e(Form::text('project_name', '',array('class' => 'form-control','placeholder'
                => 'Segment Name','required'=>'true'))); ?>


            </div>
                  <div class="form-group">
                <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

				</div>

				       <?php echo Form::close(); ?>

              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
	</div>
<div class="col d-flex">
    <div class="box box-success">
        <div class="box-body table-responsive px-10 py-0">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th width=300>Segment</th>
                        <th>1st Comps</th>
                        <th>2nd Comps</th>
                        <th>Acomps</th>
                        <th>Sales</th>
                        <th>Closed</th>
                        <th></th>
                    </tr>
                   
                       <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td> <?php echo Form::open(['action' => ['ProjectsController@update',"".$project->id],'id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        <div class="d-flex w-fit">
            <div class="form-group"><?php echo e(Form::text('project_name', $project->project_name,array('class' => 'form-control ','required'=>'true'))); ?>


            </div>
                  <div class="form-group">
                <?php echo e(Form::submit('Save',array('class' => 'btn btn-success'))); ?>

				</div>
</div>
				       <?php echo Form::close(); ?></td>
					   
					   <td><a class="nav-link " href="<?php echo e(url('1st-commit')); ?>"><i class="fa fa-search"></i> <?php echo e($prospects->where('commit_stage', '1')->where('project_id',$project->id)->count()); ?></a></td>
					   <td><a class="nav-link " href="<?php echo e(url('2nd-commit')); ?>"><i class="fa fa-search"></i> <?php echo e($prospects->where('commit_stage', '2')->where('project_id',$project->id)->count()); ?></a></td>
					   <td><a class="nav-link " href="<?php echo e(url('1st-commit')); ?>"><i class="fa fa-search"></i> <?php echo e($prospects->where('commit_stage', '3')->where('project_id',$project->id)->count()); ?></a></td>
					   <td><a class="nav-link " href="<?php echo e(url('1st-commit')); ?>"><i class="fa fa-search"></i> <?php echo e($prospects->where('commit_stage', '4')->where('project_id',$project->id)->count()); ?></a></td>
					   <td><a class="nav-link " href="<?php echo e(url('1st-commit')); ?>"><i class="fa fa-search"></i> <?php echo e($prospects->where('commit_stage', '5')->where('project_id',$project->id)->count()); ?></a></td>
					   
					   <td><button class="btn btn-primary" data-toggle="modal" data-target="#modal-addprospect-<?php echo e($project->id); ?>"><i class="fa fa-plus"></i>  Add Prospect</button></td>
					   
 <div class="modal modal-danger fade" id="modal-addprospect-<?php echo e($project->id); ?>" style="display: none;">
            <div class="modal-dialog">
              <div class="modal-contents">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span></button>
                  <h4 class="modal-title">Add Local Market Segments</h4>
                </div>
				<div class="modal-body">
        <?php echo Form::open(['action' => 'ProspectsController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

				<?php echo e(Form::text('project_id', $project->id ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true'))); ?>

				
				<?php echo e(Form::text('created_by', $project->created_by ,array('class' => 'form-control hidden','placeholder'
                => '','required'=>'true'))); ?>

				
            <div class="col-md-6 form-group">
                <label for="title">Segment</label> <?php echo e(Form::text('project_name', $project->project_name ,array('class' => 'form-control','readonly'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Website</label> <?php echo e(Form::text('website', '',array('class' => 'form-control','placeholder'
                => 'Website','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">WhatsApp Number</label> <?php echo e(Form::text('whatsapp', '',array('class' => 'form-control','placeholder'
                => 'WhatsApp No.','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Facebook URL</label> <?php echo e(Form::text('facebook_url', '',array('class' => 'form-control','placeholder'
                => 'Facebook URL','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Name</label> <?php echo e(Form::text('contact_name', '',array('class' => 'form-control','placeholder'
                => 'Contact Name','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Surname</label> <?php echo e(Form::text('contact_surname', '',array('class' => 'form-control','placeholder'
                => 'Contact Surname','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Contact Phone</label> <?php echo e(Form::text('contact_phone', '',array('class' => 'form-control','placeholder'
                => 'Phone','required'=>'true'))); ?>


            </div><div class="col-md-6 form-group">
                <label for="title">Contact Email</label> <?php echo e(Form::text('contact_email', '',array('class' => 'form-control','placeholder'
                => 'Email','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Company Name</label> <?php echo e(Form::text('company_name', '',array('class' => 'form-control','placeholder'
                => 'Company Name','required'=>'true'))); ?>


            </div>
			<div class="col-md-6 form-group">
                <label for="title">Company Address</label> <?php echo e(Form::text('company_address', '',array('class' => 'form-control','placeholder'
                => 'Company Address','required'=>'true'))); ?>


            </div>
                  <div class="form-group text-center">
                <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

				</div>

				       <?php echo Form::close(); ?>

              </div>
			  </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
                    </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> </div>
        </div>
        <!-- /.box-body -->
    </div>
        <!-- /.box-header -->
        </div>
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>