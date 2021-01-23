 
<?php $__env->startSection('content'); ?>

<div class="col-md-12">
<?php $__currentLoopData = $territory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="box box-success">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0"><?php echo e($t->region_name); ?> (<?php echo e($t->region_id); ?>)/ <?php echo e($t->name); ?> (<?php echo e($t->division_id); ?>) </h3>
			<span class="col-xs-8 text-right p-0">
                <h4><a href="<?php echo e(url('sales-reports')); ?>?week=<?=$week-1?>">&laquo; </a> &nbsp; <i class="fa fa-calendar"> </i> Week <?php echo e(date('W, M-Y', $monday )); ?>

						<a href="<?php echo e(url('sales-reports')); ?>?week=<?=$week+1?>">&raquo;</a> </h4>
				</span>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
	    <?php $__currentLoopData = $repts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<?php if($report->division_id == $t->division_id): ?>

            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Calls Goal	</th>
                        <th>Calls Made	</th>
                        <th>Decision Makers	</th>
                        <th>Prospects Added	</th>
                        <th>1st Appt Schedules	</th>
                        <th>1st Appt Completed	</th>
						<th>1st Appt Canceled	</th>
						<th>2nd Appt Schedules	</th>
						<th>2nd Appt Completed		</th>
						<th>2nd Appt Canceled	</th>
						<th>Followup	</th>
						<th>Sales	</th>
						<th>Dead	</th>
                    </tr>
				
                  
					<tr>
                        <td><?php echo e('Monday'); ?></td>
                        <td>
						   <?php $__currentLoopData = $monday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$mon[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<?php echo e($arr != null ? $arr : 0); ?>

						<?php $arr = 0 ?></td>
                        <td>
						<?php $__currentLoopData = $monday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$mon[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $monday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$mon[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday)): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday)): ?> && $pros->commit_stage == '1')
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', $monday) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Tuesday'); ?></td>
                        <td>
						<?php $__currentLoopData = $tuesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$tue[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $tuesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$tue[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $tuesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$tue[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+1 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Wednesday'); ?></td>
                        <td>
						<?php $__currentLoopData = $wednesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$wed[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $wednesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$wed[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $wednesday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$wed[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+2 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Thrusday'); ?></td>
                        <td>
						<?php $__currentLoopData = $thrusday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$thru[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $thrusday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$thru[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $thrusday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $thru): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$thru[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+3 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php echo e(''); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Friday'); ?></td>
                        <td>
						<?php $__currentLoopData = $friday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$fri[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $friday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$fri[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $friday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$fri[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+4 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Saturday'); ?></td>
                        <td>
						<?php $__currentLoopData = $saturday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sat[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $saturday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sat[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $saturday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sat[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('monday this week')) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+5 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Sunday'); ?></td>
                        <td>
						<?php $__currentLoopData = $sunday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sun[0]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $sunday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sun[1]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
                        <td><?php $__currentLoopData = $sunday_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php $arr +=(int)$sun[2]; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php echo e($arr != null ? $arr : 0); ?>

							<?php $arr = 0 ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday))): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '1' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_complete == '0' && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?></td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('Wd', strtotime($pros->created_at)) == date('Wd', strtotime('+6 day', $monday)) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					<?php else: ?> 
					<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> </td>
						
                      
                    </tr>
					
					<tr>
                        <td><?php echo e(''); ?></td>
                       <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><i><?php echo e('Overall'); ?></i></td>
                       <td><?php echo e($arr0); ?></td>
                       <td><?php echo e($arr1); ?></td>
                       <td><?php echo e($arr2); ?></td>
                       
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday)): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>		 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1' && $pros->commit_complete == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '1' && $pros->commit_complete == '0'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
                        <td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2' && $pros->commit_complete == '1'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '2' && $pros->commit_complete == '0'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '3'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '4'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	 </td>
						<td><?php $__currentLoopData = $prospect; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pros): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(date('W', strtotime($pros->created_at)) == date('W', $monday) && $pros->commit_stage == '5'): ?>
						<?php echo e($pros->count()); ?>

					
					<?php else: ?> 
						<?php echo e('0'); ?>

						<?php endif; ?>
						
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	  </td>
                      
                    </tr>
					
                </tbody>
            </table>
			<?php else: ?>
				<table class="table table-hover">
                <tbody>
                    <tr>
                        <th></th>
                        <th>Calls Goal	</th>
                        <th>Calls Made	</th>
                        <th>Decision Makers	</th>
                        <th>Prospects Added	</th>
                        <th>1st Appt Schedules	</th>
                        <th>1st Appt Completed	</th>
						<th>1st Appt Canceled	</th>
						<th>2nd Appt Schedules	</th>
						<th>2nd Appt Completed		</th>
						<th>2nd Appt Canceled	</th>
						<th>Followup	</th>
						<th>Sales	</th>
						<th>Dead	</th>
                    </tr>
				
                    <tr>
                        <td><?php echo e('Monday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Tuesday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Wednesday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr><tr>
                        <td><?php echo e('Thrusday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr><tr>
                        <td><?php echo e('Friday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Saturday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					<tr>
                        <td><?php echo e('Sunday'); ?></td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						
                      
                    </tr>
					
					
					<tr>
                        <td><?php echo e(''); ?></td>
                       <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
                        <td><?php echo e(''); ?></td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						<td><?php echo e(''); ?> </td>
						
                      
                    </tr>
					<tr>
                        <td><i><?php echo e('Overall'); ?></i></td>
                       <td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0</td>
                        <td>0</td>
                        <td>0</td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
						<td>0 </td>
                      
                    </tr>
					
                </tbody>
            </table>
			<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="px-10 py-0"> <?php echo e(''); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- /.box -->
</div>

 
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>