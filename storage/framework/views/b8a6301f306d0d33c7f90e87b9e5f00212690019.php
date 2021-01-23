<?php $__env->startSection('content'); ?>
<div class="col-md-12 d-flex">


    <div class="col-md-12 d-flex">
        <div class="col-md-12" style="padding:0">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">View Interviewers</h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <?php if(Session::has("successresume")): ?>
                    <div class="alert alert-success">
                        <ul>
                            <li><?php echo e(Session::get("successresume")); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(Session::has("success")): ?>
                    <div class="alert alert-success">
                        <ul>
                            <li><?php echo e(Session::get("success")); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>

                    <?php if(Session::has("emailseccess")): ?>
                    <div class="alert alert-success">
                        <ul>
                            <li><?php echo e(Session::get("emailseccess")); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>


                </div>
                <div class="box-body table-responsive px-10 py-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Interviewer Name</th>
                                <th>Interviewer Email</th>
                                <th>Level</th>
                                <th>Division</th>
                                <th>Email Send</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>


                            <?php $__currentLoopData = $interviewerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewerDataView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <td><?php echo e($interviewerDataView->fname); ?> <?php echo e($interviewerDataView->lname); ?></td>

                                <?php if(!empty($interviewerDataView->intervieweremail)): ?>

                                <td><?php echo e($interviewerDataView->intervieweremail); ?></td>
                                <?php else: ?>
                                <td><?php echo e($interviewerDataView->employeeemail); ?></td>

                                <?php endif; ?>
                                <td><?php echo e($interviewerDataView->role); ?></td>
                                <td><?php echo e($interviewerDataView->division_id); ?></td>

                                <td>
                                    <a data-toggle="modal"
                                        data-target="#modal-view-<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                        class="label label-warning">Send Test Email</a>
                                    <div class="modal modal-primary fade"
                                        id="modal-view-<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-contents">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Send Test Email</h4>
                                                </div>

                                                <div class="modal-body">
                                                    <?php echo Form::open(['action' => 'interviewerEmail@sendtest']); ?>

                                                    <?php echo e(Form::token()); ?>

                                                    <div class="box-body">
                                                        <div class="form-group">
                                                            <label for="name">Name</label> <?php echo e(Form::text('emailtoName', '',array('class' => 'form-control','placeholder' => 'Enter Name'))); ?>


                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label> <?php echo e(Form::email('emailtoEmail', '',array('class' => 'form-control','placeholder' => 'Enter Email'))); ?>


                                                        </div>

                                                        <?php
                                                        if(!empty($interviewerDataView->intervieweremail)){
                                                        $emailFrom = $interviewerDataView->intervieweremail;
                                                        }
                                                        else
                                                        {
                                                        $emailFrom = $interviewerDataView->employeeemail;
                                                        }
                                                        ?>


                                                        <?php echo e(Form::hidden('emailfrom', $emailFrom,array('class' => 'form-control','placeholder' => 'Enter Email'))); ?>

                                                        <?php echo e(Form::hidden('emailfromname', $interviewerDataView->fname .' '.$interviewerDataView->lname,array('class' => 'form-control','placeholder' => 'Enter Email'))); ?>

                                                        <div class="form-group">
                                                            <?php echo e(Form::submit('SEND TEST EMAIL',array('class' => 'btn btn-warning'))); ?>

                                                        </div>
                                                    </div>
                                                    <?php echo Form::close(); ?>

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
                                <td>


<?php if($interviewerDataView->available_status == '1'): ?>
<a href="<?php echo e(url("interviewer/deactive")); ?>/<?php echo e($interviewerDataView->addinterviewerid); ?>"
class="label label-success">ACTIVE</a>


<?php else: ?> 
<a href="<?php echo e(url("interviewer/active")); ?>/<?php echo e($interviewerDataView->addinterviewerid); ?>"
class="label label-danger">DEACTIVE</a>

<?php endif; ?>
                              
                                </td>

                                <td>

                                    <a href="<?php echo e(url("add-reserved-time")); ?>/<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                        class="label label-primary">ADD RESERVED TIME <i
                                        class="fa fa-pencil "></i></a>
                                                                      

                                    <a href="<?php echo e(url("view-interviewer")); ?>/<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                        class="label label-warning">EDIT <i
                                        class="fa fa-pencil "></i> / VIEW <i
                                        class="fa fa-eye "></i></a>
                                    


                                    <a data-toggle="modal"
                                    data-target="#modal-view-delete-<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                    class="label label-danger">DELETE <i
                                    class="fa fa-trash "></i></a>

                                <div class="modal modal-danger fade"
                                    id="modal-view-delete-<?php echo e($interviewerDataView->addinterviewerid); ?>"
                                    style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-contents">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Delete Interviewer</h4>
                                            </div>

                                            <div class="modal-body">
                                                    <a href="<?php echo e(url("delete-interviewer")); ?>/<?php echo e($interviewerDataView->addinterviewerid); ?>">
                                                        <span class="btn label-warning">Delete <i
                                                                class="fa fa-trash "></i></span></a>
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
                    <div class="px-10 py-0"> </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>