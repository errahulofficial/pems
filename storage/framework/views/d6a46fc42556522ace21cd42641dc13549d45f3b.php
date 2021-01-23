
<?php $__env->startSection('content'); ?>

<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Blog Posts View</h3>
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
                        <th>Retail Consultants</th>
                        <th>Sales Managers</th>
                        <th>Regional Sales Managers</th>
                        <th>Action</th>
                    </tr>

                    <?php $__currentLoopData = $blog_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog_posts_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($blog_posts_view->title); ?></td>
                        <td><?php echo e($blog_posts_view->retail_consultants); ?></td>
                        <td><?php echo e($blog_posts_view->sales_managers); ?></td>
                        <td><?php echo e($blog_posts_view->regional_sales_managers); ?></td>
                        <td>


                          

                            <a data-toggle="modal"
                            data-target="#modal-view-blog-<?php echo e($blog_posts_view->id); ?>"
                            class="label label-primary">EDIT / VIEW <i
                            class="fa fa-pencil "></i></a>
                        <div class="modal modal-primary fade"
                            id="modal-view-blog-<?php echo e($blog_posts_view->id); ?>"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">SURE TO EDIT</h4>
                                    </div>

                                    <div class="modal-body">
                                            <a href="blog-edit/<?php echo e($blog_posts_view->id); ?>">
                                                <span class="btn label-warning">Edit <i
                                                        class="fa fa-pencil "></i></span></a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline pull-left"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>







                        <a data-toggle="modal"
                        data-target="#modal-delete-blog-<?php echo e($blog_posts_view->id); ?>"
                        class="label label-danger">DELETE <i
                        class="fa fa-trash "></i></a>
                    <div class="modal modal-danger fade"
                        id="modal-delete-blog-<?php echo e($blog_posts_view->id); ?>"
                        style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-contents">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">SURE TO DELETE</h4>
                                </div>

                                <div class="modal-body">
                                        <a href="blog-delete/<?php echo e($blog_posts_view->id); ?>">
                                            <span class="btn label-warning">Delete <i
                                                    class="fa fa-pencil "></i></span></a>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-outline pull-left"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>

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