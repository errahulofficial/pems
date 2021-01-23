
<?php $__env->startSection('content'); ?>

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
         
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
        <!-- /.box-header -->
        <div class="box-body table-responsive px-10 py-0">
            <?php if(Session::has("success-delete")): ?>
            <div class="alert alert-success">
                <ul>
                    <li><?php echo e(Session::get("success-delete")); ?></li>
                </ul>
            </div>
            <?php endif; ?>
           
                   

                   
                   
                        <h2><?php echo e($blog_posts->title); ?></h2>
                      
        <p><?php echo $blog_posts->descp; ?></p>
                   
               
           
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>