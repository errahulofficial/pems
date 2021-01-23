
<?php $__env->startSection('content'); ?>

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Blog</h3>
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
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Title</th>
                        <th style='text-align:right'>Action</th>
                    </tr>

                    <?php $__currentLoopData = $blog_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog_posts_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($blog_posts_view->title); ?></td>
                      
                        <td style='text-align:right'>
                            <a href="view-blog-post/<?php echo e($blog_posts_view->id); ?>">
                                <span class="label label-primary"> View <i class="fa fa-eye"></i></span>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($blog_posts->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>