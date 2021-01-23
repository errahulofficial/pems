 
<?php $__env->startSection('content'); ?>
<div class="col-md-5 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Black List</h3>
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

        <?php echo Form::open(['action' => 'blackListController@create','id'=>'form']); ?>

        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="First Name">First Name</label> <?php echo e(Form::text('fname', '',array('class' => 'form-control','placeholder'
                    => 'name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="lname">Last Name</label> <?php echo e(Form::text('lname', '',array('class' => 'form-control','placeholder'
                    => 'Last Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="email">Email</label> <?php echo e(Form::text('email', '',array('class' => 'form-control','placeholder'
                    => 'Email','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="phone">Phone</label> <?php echo e(Form::text('phone', '',array('class' => 'form-control','placeholder'
                    => 'Phone','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="city">City</label> <?php echo e(Form::text('city', '',array('class' => 'form-control','placeholder'
                    => 'City','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="state">State</label> <?php echo e(Form::text('state', '',array('class' => 'form-control','placeholder'
                    => 'State','required'=>'true'))); ?>

                </div>
                <div class="col-md-6 form-group">
                    <label for="zip">Zip</label> <?php echo e(Form::text('zip', '',array('class' => 'form-control','placeholder' =>
                    'Zip','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <label for="note">Note</label> <?php echo e(Form::textarea('note', '',array('class' => 'form-control','placeholder'
                    => 'Note','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('ADD TO BLACKLIST',array('class' => 'btn btn-primary'))); ?>

                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>


    </div>
</div>
<div class="col-md-7 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Blacklist View</h3>
           
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php $__currentLoopData = $blacklist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blacklistview): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($blacklistview->fname); ?></td>
                        <td><?php echo e($blacklistview->lname); ?></td>
                        <td><?php echo e($blacklistview->email); ?></td>
                        <td><?php echo e($blacklistview->phone); ?></td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($blacklistview->blacklistid); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($blacklistview->blacklistid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('blacklist-delete')); ?>/<?php echo e($blacklistview->blacklistid); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <a data-toggle="modal" data-target="#modal-edit-<?php echo e($blacklistview->blacklistid); ?>" href=""> <span class="label label-success"><i class="fa fa-pencil"></i></span></a>


                            <div class="modal modal-success fade" id="modal-edit-<?php echo e($blacklistview->blacklistid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Edit Blacklist</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('blacklist-edit')); ?>/<?php echo e($blacklistview->blacklistid); ?>"><button type="button" class="btn btn-outline">Sure to edit !</button></a>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <a data-toggle="modal" data-target="#modal-view-<?php echo e($blacklistview->blacklistid); ?>" href=""> <span class="label label-success"><i class="fa fa-eye"></i></span></a>

                            <div class="modal modal-success fade" id="modal-view-<?php echo e($blacklistview->blacklistid); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title"><?php echo e($blacklistview->fname); ?> <?php echo e($blacklistview->lname); ?></h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Email</h4>
                                            <p> <?php echo e($blacklistview->email); ?></p>
                                            <h4>Phone</h4>
                                            <p> <?php echo e($blacklistview->phone); ?></p>
                                            <h4>City</h4>
                                            <p> <?php echo e($blacklistview->city); ?></p>
                                            <h4>State</h4>
                                            <p> <?php echo e($blacklistview->state); ?></p>
                                            <h4>Zip</h4>
                                            <p> <?php echo e($blacklistview->zip); ?></p>

                                            <?php if(!empty($blacklistview->note)): ?>
                                            <h4>Note</h4>
                                            <p> <?php echo e($blacklistview->note); ?></p>
                                            <?php endif; ?>

                                            <?php if(!empty($blacklistview->resume)): ?>
                                            <h4>Resume</h4>
                                            <?php
                                      $resume_folder = $blacklistview->resume_folder;
                                      $resume = $blacklistview->resume;
                                      $singleresume = explode(',',$resume) 
                                     ?>
                                      <?php $__currentLoopData = $singleresume; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleresumeView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!empty($singleresumeView)): ?>
                                     
<p> <a style="color:#fff" href="<?php echo e(url("$resume_folder/$singleresumeView ")); ?>"><?php echo e($singleresumeView); ?></a></p>

                                    
                                    
                                          
                                   

<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                            <?php if(!empty($blacklistview->docs)): ?>
                                            <h4>Docs</h4>
                                            <?php
                                      $docs_folder = $blacklistview->docs_folder;
                                      $docs = $blacklistview->docs;
                                      $singledocs = explode(',',$docs) 
                                     ?>
                                      <?php $__currentLoopData = $singledocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singledocsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(!empty($singledocsView)): ?>
                                     
<p> <a style="color:#fff" href="<?php echo e(url("$docs_folder/$singledocsView ")); ?>"><?php echo e($singledocsView); ?></a></p>

                                    
                                    
                                          
                                   

<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>

                                            <h4>Created at</h4>
                                            <p> <?php echo e($blacklistview->created_at); ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
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
            <div class="px-10 py-0"> <?php echo e($blacklist->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>