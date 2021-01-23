
<?php $__env->startSection('content'); ?>
<style>
.font-l{
	font-size: large;
}
.bg-y{
	background:#ffff0029;
}
.borderinfo{
	border: 1px solid #ffff0073;
}
bg-white{
	background: white;
}
    .text-center {
        text-align: center
    }

    .p-20 {
        padding-top: 20px;
		padding-left: 20px;
		padding-right: 20px;
		padding-bottom: 1px;
    }
	.p-4 {
        padding: 4px;
    }
	hr{
		border-top: 1px solid #777;
	}
</style>
<div>
    <?php if(Session::has("rolesession")): ?>
    <div class="alert alert-success">
        <p><?php echo e(Session::get("rolesession")); ?></p>
    </div>
    <?php endif; ?>
</div>
<div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
		
		<h3 class="box-title col-xs-6 d-flex align-items-center p-0"><b><i class="fa fa-user"></i> My Sales Manager</b></h3>
        </div>
		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		
        <div class="col-md-6 p-20 bg-white">
		<p class=" p-4 borderinfo"><i class="fa fa-info-circle"></i> Use the information below to contact your Sales Manager</p>
           <h4><b><?php echo e($data->fname); ?> <?php echo e($data->lname); ?> </b></h4>
		   
		   <p class="font-l p-4">Email :  <span class="p-20"><b><?php echo e($data->email); ?></b></span></p>
		   <p class="font-l p-4">Skype ID :  <span class="p-20"><b><a href="skype:<?php echo e($data->skypeid); ?>?chat"><?php echo e($data->skypeid); ?></a></b></span></p>
        </div>
		
		
		<div class="col-md-6 p-20 bg-y">
		
           <h4><b>Hello everyone! </b></h4>
		   
		   <p>First of all, I would like to welcome everyone to our team. Please add me on skype <b>by clicking the button on the left.</b> Do not be a stranger! Ask me anytime about any problems you may encounter, either about prospects and sales or about the Neovora employee management system interface.</p>
		   <p>You can also use the <b>Support Center</b> to open a ticket and speak directly to a Neovora Employee Management System technical consultant.</p>
		   <p>Keep an eye on your home page, where I will post details about upcoming events and meetings, or general “know-how” and tips.</p>
		   <p>See you at our next meeting!</p>
        </div>
		
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		
</div>

<div class="col-md-12 p-20 bg-white">
<a href="<?php echo e(url('')); ?>/email-skype-info">
<i class="fa fa-user"></i> Find your Skype ID and E-mail address information here</div>
</a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>