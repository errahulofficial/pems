 
<?php $__env->startSection('content'); ?>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add Blog Posts</h3>
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


        <?php echo Form::open(['action' => 'SMBlogController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        <div class="box-body">
       
            <div class="form-group">
                <label for="title">Title</label> <?php echo e(Form::text('title', '',array('class' => 'form-control','placeholder'
                => 'Title','required'=>'true'))); ?>


            </div>
            <div class="form-group">
                <label for="descp">Description</label> <?php echo e(Form::textarea('description', '',array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
                => 'Description','required'=>'true'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::submit('ADD BLOG',array('class' => 'btn btn-primary'))); ?>

            </div>


        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>