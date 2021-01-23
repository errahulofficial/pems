
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

        <?php $__currentLoopData = $blog_posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog_posts_view): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo Form::open(['action' => ['blog_controller@update'.'',$blog_posts_view->id],'id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">

            <div class="form-group">
                <label for="see">Who will see this? (Check one or both)</label>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <div class="row">

                        <div class="col-md-4">
                            <?php echo e(Form::hidden('retail_consultants','0')); ?>


                            <?php
                            if($blog_posts_view->retail_consultants == '0'){
                            $checked = '0';
                            }
                            else{
                            $checked = '1';
                            }
                            ?>
                            <?php echo e(Form::checkbox('retail_consultants','1',$checked,array('class' => 'form-control'))); ?>

                            <label for="see"> Retail Consultants</label>
                        </div>

                        <div class="col-md-4">
                            <?php echo e(Form::hidden('sales_managers','0')); ?>

                            <?php
                            if($blog_posts_view->sales_managers == '0'){
                            $checked2 = '0';
                            }
                            else{
                            $checked2 = '1';
                            }
                            ?>
                            <?php echo e(Form::checkbox('sales_managers','1',$checked2,array('class' => 'form-control'))); ?>

                            <label for="see"> Sales Managers</label>
                        </div>
                        <div class="col-md-4">
                            <?php echo e(Form::hidden('regional_sales_managers','0')); ?>

                            <?php
                            if($blog_posts_view->regional_sales_managers == '0'){
                            $checked3 = '0';
                            }
                            else{
                            $checked3 = '1';
                            }
                            ?>
                            <?php echo e(Form::checkbox('regional_sales_managers','1',$checked3,array('class' => 'form-control'))); ?>

                            <label for="see"> Regional Sales Managers</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="title">Title</label> <?php echo e(Form::text('title', $blog_posts_view->title,array('class' => 'form-control','placeholder'
                => 'Title','required'=>'true'))); ?>


            </div>
            <div class="form-group">
                <label for="descp">Description</label> <?php echo e(Form::textarea('descp', $blog_posts_view->descp,array('class' => 'form-control ckeditor','id' => 'editorblog','placeholder'
                => 'Description','required'=>'true'))); ?>

            </div>

            <div class="form-group">
                <?php echo e(Form::submit('UPDATE BLOG',array('class' => 'btn btn-primary'))); ?>

            </div>
      </div>
        <?php echo Form::close(); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>