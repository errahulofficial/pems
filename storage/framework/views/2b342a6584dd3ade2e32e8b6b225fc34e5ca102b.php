 
<?php $__env->startSection('content'); ?>
<div class="col-md-12">
        <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border d-flex align-items-center">
                        <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Recruitment Training</h3>
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
            
                  
                 </div>
            </div>

            <?php $__currentLoopData = $publications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $publicationsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            
             
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?php echo e($publicationsView->category_name); ?> (<?php echo e($publicationsView->category_title); ?>)</h3>
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
                                   
                                    <th>Title</th>
                                    <th>Duration</th>
                                    
                                    <th>Video</th>
                                    <th>Download PDF</th>
                                </tr>
                                <?php $__currentLoopData = $publicationsView->recruitment_training_database_model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                
                                <tr>
                                    
                                    <td><?php echo e($language->title); ?></td>
                                    <td><?php echo e($language->duration); ?> min.</td>
                                    
                                    <td>
                                    <a target="_blank" href="<?php echo e($language->video); ?>">View</a>
                                    </td>
                                <td><a target="_blank" href="<?php echo e(url('')); ?>/recruitment_training/<?php echo e($language->documents); ?>">Download/View</a> </td>
                                 
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                               
                            </tbody>
                        </table>
                       
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>