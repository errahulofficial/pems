 
<?php $__env->startSection('content'); ?>
<style>
.font-18{
	font-size:18px
}
</style>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Daily Reports</h3>
			<span class="col-xs-8 text-right p-0">
                			
						<h4>
						<a href="<?php echo e(url('reports')); ?>?week=<?=$week-1?>">&laquo; </a> &nbsp; <i class="fa fa-calendar"> </i> Week <?php echo e(date('W, M-Y', $monday )); ?>

						<a href="<?php echo e(url('reports')); ?>?week=<?=$week+1?>">&raquo;</a> 
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
       <?php echo Form::open(['action' => 'ReportsController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

		
		<?php echo e(Form::hidden('week_no',date('W', $monday),array('class' => 'form-control','placeholder'
                    => '','required'=>'true'))); ?>

		<?php echo e(Form::hidden('start_date',date('d-m-Y ', $monday),array('class' => 'form-control','placeholder'
		=> '','required'=>'true'))); ?>

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
                        <th>--</th>
                        <th>Calls Goal</th>
                        <th>Calls Made</th>
                        <th>Decision Makers Reached</th>
                        
                    </tr>
										
                    <tr class=" font-18">
                        <td>Monday, <?php echo e(date(' M dS Y ', $monday)); ?></td>
                        <td><?php echo e(Form::text('mon_callgoal',!empty($mon) ? $mon[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('mon_callmake',!empty($mon) ? $mon[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('mon_decision',!empty($mon) ? $mon[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr>
					
					<tr class=" font-18">
                        <td>Tuesday, <?php echo e(date(' M dS Y ', strtotime('+1 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('tue_callgoal',!empty($tue) ? $tue[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('tue_callmake',!empty($tue) ? $tue[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('tue_decision',!empty($tue) ? $tue[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr>
					<tr class=" font-18">
                        <td>Wednesday, <?php echo e(date(' M dS Y ', strtotime('+2 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('wed_callgoal',!empty($wed) ? $wed[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('wed_callmake',!empty($wed) ? $wed[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('wed_decision',!empty($wed) ? $wed[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr><tr class=" font-18">
                        <td>Thrusday, <?php echo e(date(' M dS Y ', strtotime('+3 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('thr_callgoal',!empty($thr) ? $thr[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('thr_callmake',!empty($thr) ? $thr[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('thr_decision',!empty($thr) ? $thr[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr><tr class=" font-18">
                        <td>Friday, <?php echo e(date(' M dS Y ', strtotime('+4 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('fri_callgoal',!empty($fri) ? $fri[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('fri_callmake',!empty($fri) ? $fri[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('fri_decision',!empty($fri) ? $fri[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr><tr class=" font-18">
                        <td>Saturday, <?php echo e(date(' M dS Y ', strtotime('+5 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('sat_callgoal',!empty($sat) ? $sat[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('sat_callmake',!empty($sat) ? $sat[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('sat_decision',!empty($sat) ? $sat[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr><tr class=" font-18">
                        <td>Sunday, <?php echo e(date(' M dS Y ', strtotime('+6 day',$monday))); ?></td>
                        <td><?php echo e(Form::text('sun_callgoal',!empty($sun) ? $sun[0] : '',array('class' => 'form-control','placeholder'
                    => 'Call Goal','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('sun_callmake',!empty($sun) ? $sun[1] : '',array('class' => 'form-control','placeholder'
                    => 'Call Made','required'=>'true'))); ?></td>
                        <td><?php echo e(Form::text('sun_decision',!empty($sun) ? $sun[2] : '',array('class' => 'form-control','placeholder'
                    => 'Decision Makers Reached','required'=>'true'))); ?></td>
                        
                    </tr>
					
					<tr>
					<td>
					<?php echo e(Form::submit('Save',array('class' => 'btn btn-primary'))); ?></td>
					</tr>
								
                </tbody>
            </table>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>