 
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
				<a class="nav-link" href="<?php echo e(url('projects')); ?>">Market Segments (<?php echo e($project->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link active" href="<?php echo e(url('prospects')); ?>">Add Contact</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('contacts')); ?>">Contacts (<?php echo e($prospect->where('commit_stage', '0')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('1st-commit')); ?>">1st Commits (<?php echo e($prospect->where('commit_stage', '1')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('2nd-commit')); ?>">2nd Commits (<?php echo e($prospect->where('commit_stage', '2')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('side-dish')); ?>">Monitoring (<?php echo e($prospect->where('commit_stage', '3')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('marked-sold')); ?>">Marked as Sold (<?php echo e($prospect->where('commit_stage', '4')->count()); ?>)</a>
			  </li>
			  <li class="nav-item">
				<a class="nav-link" href="<?php echo e(url('marked-closed')); ?>">Marked as Closed (<?php echo e($prospect->where('commit_stage', '5')->count()); ?>)</a>
			  </li>
			</ul>
    </div>
</div>
<div class="col d-flex">
    <div class="box box-success">
       <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Contact</h3>
        </div>
        <?php echo Form::open(['action' => 'ProspectsController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

				
            <div class="col-md-6 form-group">
                <label for="title">Segment</label> <?php echo e(Form::select('project_id', $project_list, '' ,array('class' => 'form-control','placeholder'
                => '- Select a Segment -','readonly'=>'true'))); ?>


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
                  <div class="col-md-6 form-group">
                <?php echo e(Form::submit('Submit',array('class' => 'btn btn-success'))); ?>

				</div>

				       <?php echo Form::close(); ?>

              </div>
	  </div>'
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>