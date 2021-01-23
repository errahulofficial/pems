
<?php $__env->startSection('content'); ?>

<div class="col-md-12">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Who's Online</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
           
            <table class="table table-hover">
                <tbody>
                    <tr>

                        <th>UID</th>
                        <th>LID</th>
                        
                        <th>Name</th>
                        <th>Page</th>
                        <th>Last Action</th>
                        <th>IP</th>
                    </tr>
                    
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                   
                        <?php if(Cache::has('user-is-online-' . $user->id)): ?> 
                      
                    <tr>

                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->id); ?></td>
                        <td><?php echo e($user->fname . " " . $user->lname); ?></td>
                        
                            <td><a href="http://pems.auliu.com/default">http://pems.auliu.com/default</a>
                        </td>
                        <td><?php echo e(1); ?> min.</td>
                        <td><?php echo e(Request::ip()); ?></td>

                    </tr>
                    <?php endif; ?>
                           
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>