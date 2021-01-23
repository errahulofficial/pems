
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-12 d-flex align-items-center p-0">Add Sales Training</h3>
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

        <?php echo Form::open(['action' => 'salesTrainingDatabase@create','id'=>'form','files'=>'true',]); ?>

        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="sales_training_category_id">Select Category</label>
                    <?php echo e(Form::select('sales_training_category_id',$selectSales_training_category,NULL,array('class'=>'form-control','required'=>'true'))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <label for="Title">Title</label>
                    <?php echo e(Form::text('title', '',array('class' => 'form-control','placeholder'
                    => 'Title','required'=>'true'))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <label for="Duration">Duration</label>
                    <?php echo e(Form::text('duration', '',array('class' => 'form-control','placeholder'
                    => 'Duration','required'=>'true'))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <label for="Video">Video URL (Youtube/Vimeo)</label>
                    <?php echo e(Form::text('video', '',array('class' => 'form-control','placeholder'
                    => 'Video','required'=>'true'))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <label for="Documents">Document (PDF, Doc, Docx, Png, Jpg)</label>
                    <?php echo e(Form::file('documents',array('class' => 'form-control','placeholder'
                    => 'Documents'))); ?>

                </div>

                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('ADD SALES TRAINING',array('class' => 'btn btn-success'))); ?>

                </div>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Sales Training View</h3>
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
                        <th>Category Name</th>
                        <th>Category Title</th>
                        <th>Title</th>

                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoryView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($categoryView->category_name); ?></td>
                        <td><?php echo e($categoryView->category_title); ?></td>
                        <td><?php echo e($categoryView->title); ?></td>


                        <td>
                            <a data-toggle="modal"
                                data-target="#modal-delete-<?php echo e($categoryView->sales_training_category_id); ?>" href="">
                                <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade"
                                id="modal-delete-<?php echo e($categoryView->sales_training_category_id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="<?php echo e(url('add-sales-training/delete')); ?>/<?php echo e($categoryView->sales_training_category_id); ?>"><button
                                                    type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal"
                                data-target="#modal-edit-<?php echo e($categoryView->sales_training_category_id); ?>" href=""> <span
                                    class="label label-success"><i class="fa fa-pencil"></i></span></a>

                            <div class="modal modal-success fade"
                                id="modal-edit-<?php echo e($categoryView->sales_training_category_id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit employee</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left"
                                                data-dismiss="modal">Close</button>
                                            <a
                                                href="<?php echo e(url('add-sales-training/edit')); ?>/<?php echo e($categoryView->sales_training_category_id); ?>"><button
                                                    type="button" class="btn btn-outline">Sure to edit !</button></a>
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
        <div class="px-10 py-0"> <?php echo e($category->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>