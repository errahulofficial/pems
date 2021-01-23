<?php $__env->startSection('content'); ?>
<style>
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

        <div class="col-md-7">
            <?php if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin'): ?>
            <div class="row">

                <div class="col-md-4 col-6 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/interviews">
                        <img src="<?php echo e(url('img/recruitment.png')); ?>" alt="">
                        <p>Recruitment</p>
                    </a>
                </div>
                <div class="col-md-4 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/list-employee">
                        <img src="<?php echo e(url('img/myteam.png')); ?>" alt="">
                        <p>Employees</p>
                    </a>
                </div>
                <div class="col-md-4 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/view-blog">
                        <img src="<?php echo e(url('img/blog.png')); ?>" alt="">
                        <p>Blog</p>
                    </a>
                </div>


            </div>
			
				
            <div class="row">
                <div class="col-md-4 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/sales-training">
                        <img src="<?php echo e(url('img/fasttrack.png')); ?>" alt="">
                        <p>Training Materials</p>
                    </a>
                </div>
                <div class="col-md-4 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="<?php echo e(url('img/support.png')); ?>" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
                <div class="col-md-12" style="font-weight:bold; border-top:2px solid grey; padding-top:5px">
                <a href="<?php echo e(url('')); ?>/whoisonline" >Who is Online?</a>
                </div>
            <?php endif; ?>
			
			 <?php if(Auth::user()->role == 'salesperson' || Auth::user()->role == 'salesmanager'): ?>
            <div class="row">

                <div class="col-md-3 col-6 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/sales-training">
                        <img src="<?php echo e(url('img/getstarted.png')); ?>" alt="">
                        <p>Get Start</p>
                    </a>
                </div>
				<?php if(Auth::user()->role == 'salesperson'): ?>
                <div class="col-md-3 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/email-skype-info">
                        <img src="<?php echo e(url('img/myaccount.png')); ?>" alt="">
                        <p>My Account</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/my-manager">
                        <img src="<?php echo e(url('img/myteam.png')); ?>" alt="">
                        <p>My Team</p>
                    </a>
                </div>
				<?php endif; ?>
				<?php if(Auth::user()->role == 'salesmanager'): ?>
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/myteam">
                        <img src="<?php echo e(url('img/myteam.png')); ?>" alt="">
                        <p>My Team</p>
                    </a>
                </div>
				<?php endif; ?>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/sales-training">
                        <img src="<?php echo e(url('img/training.png')); ?>" alt="">
                        <p>Training</p>
                    </a>
                </div>
				 <?php if(Auth::user()->role == 'salesperson'): ?>
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/projects">
                        <img src="<?php echo e(url('img/mymarket.png')); ?>" alt="">
                        <p>My Markets</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/contacts">
                        <img src="<?php echo e(url('img/prospects.png')); ?>" alt="">
                        <p>My Prospects</p>
                    </a>
                </div>
				<?php endif; ?>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/resources">
                        <img src="<?php echo e(url('img/resources.png')); ?>" alt="">
                        <p>Resources</p>
                    </a>
                </div>
                <div class="col-md-3 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="<?php echo e(url('img/support.png')); ?>" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
            <?php endif; ?>
			
			 <?php if(Auth::user()->role == 'hr'): ?>
            <div class="row">

                <div class="col-md-3 col-6 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/applicants">
                        <img src="<?php echo e(url('img/myteam.png')); ?>" alt="">
                        <p>Applicants</p>
                    </a>
                </div>
                <div class="col-md-3 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/interviews">
                        <img src="<?php echo e(url('img/calendar.png')); ?>" alt="">
                        <p>Interviews</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/view-interviewers">
                        <img src="<?php echo e(url('img/interviewers.png')); ?>" alt="">
                        <p>Interviewers</p>
                    </a>
                </div>
                <div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/job-positions">
                        <img src="<?php echo e(url('img/getstarted.png')); ?>" alt="">
                        <p>Job Positions</p>
                    </a>
                </div>
				<div class="col-md-3 col-2 text-center my-10">
                    <a href="<?php echo e(url('')); ?>/interviews-status">
                        <img src="<?php echo e(url('img/statuses.png')); ?>" alt="">
                        <p>Interviews Status</p>
                    </a>
                </div>
                
                <div class="col-md-3 col-2 text-center my-10">
                    <a target="_blank" href="https://neovora.freshdesk.com/support/home">
                        <img src="<?php echo e(url('img/support.png')); ?>" alt="">
                        <p>Support Center</p>
                    </a>
                </div>
            </div>
            <?php endif; ?>
			
		
        </div>
        <div class="col-sm-5" >
            <div class="col p-4">
                <div class="card p-20" style="background-color: #ffff0073;">
                    <strong>Latest News</strong>
					<br>
					<?php if(Auth::user()->role == 'superadmin' || Auth::user()->role == 'hr'): ?>
						<?php $__currentLoopData = $blog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
							<p><?php echo $blog->descp; ?></p>
								<hr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					<?php elseif(Auth::user()->role == 'salesmanager'): ?>
						<?php $__currentLoopData = $blog->where('sales_managers','1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
							<p><?php echo $blog->descp; ?></p>
									<hr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					<?php elseif(Auth::user()->role == 'salesperson'): ?>
						<?php $__currentLoopData = $blog->where('retail_consultants','1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
							<p><?php echo $blog->descp; ?></p>
									<hr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					<?php endif; ?>
                </div>
                </a>
            </div>
			<?php if(Auth::user()->role == 'salesperson'): ?>
			<div class="col p-4">
                <div class="card p-20" style="background-color: #ffff0073;">
                    <strong>Sales Manager's Blog</strong>
					<br>
					
					
						<?php $__currentLoopData = $smblog; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $smblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						
							<p><?php echo $smblog->description; ?></p>
									<hr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						
					
                </div>
                </a>
            </div>
			<?php endif; ?>
        </div>
		


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>