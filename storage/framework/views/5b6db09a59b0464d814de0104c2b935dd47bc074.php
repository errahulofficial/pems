<?php $__env->startSection('content'); ?>
<style>
        .float-right{
          float:right
        }
        </style>
<div class="col-md-12 d-flex ">
    <div class="row" style="width:100%">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">View Careers Steps</h3>
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

                <?php if($showdata == '0'): ?>
                <div class="row" style="width:100%;margin:10px 0">
                    <div class="col-md-12 form-group">
                        <label for="employeeName">Select Job Position to View Steps</label>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <th>Link for Careers</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                <?php $__currentLoopData = $jobPositions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPositionsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($jobPositionsView->name); ?></td>
                                   
                                    <td>


                                        <a data-toggle="modal"
                                            data-target="#modal-view-<?php echo e($jobPositionsView->jobPositionId); ?>"
                                            class="btn btn-primary">View Careers Link</a>


                                        <div class="modal modal-primary fade"
                                            id="modal-view-<?php echo e($jobPositionsView->jobPositionId); ?>" style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Copy url link</h4>
                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                            <?php echo e(Form::text('', url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token,array('class' => 'form-control','placeholder' => 'Copy URL'))); ?>

                                                            </div>
                                                        <a target="_blank" href="<?php echo e(url('careers').'/'.$jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token); ?>">
                                                                    <h4 class="btn btn-warning">Go to URL</h4>
                                                        </a>
                                                         </div>
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


                                        <?php if($jobPositionsView->available_status == '1'): ?>
                                        <a data-toggle="modal"
                                        data-target="#modal-view-active-<?php echo e($jobPositionsView->step_id); ?>"
                                        class="label label-success">ACTIVE</a>
                                        
                                        
                                        <div class="modal modal-danger fade"
                                            id="modal-view-active-<?php echo e($jobPositionsView->step_id); ?>"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">DEACTIVE JOB POSITION</h4>
                                                    </div>
                                        
                                                    <div class="modal-body">
                                                            <a href="<?php echo e(url("careers_jobposition/deactive")); ?>/<?php echo e($jobPositionsView->step_id); ?>">
                                                                <span class="btn label-warning">Deactive</span></a>
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
                                        <?php else: ?> 
                                        <a data-toggle="modal"
                                        data-target="#modal-view-deactive-<?php echo e($jobPositionsView->step_id); ?>"
                                        class="label label-danger">DEACTIVE</a>
                                        
                                        
                                        <div class="modal modal-success fade"
                                            id="modal-view-deactive-<?php echo e($jobPositionsView->step_id); ?>"
                                            style="display: none;">
                                            <div class="modal-dialog">
                                                <div class="modal-contents">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">ACTIVE JOB POSITION</h4>
                                                    </div>
                                        
                                                    <div class="modal-body">
                                                            <a href="<?php echo e(url("careers_jobposition/active")); ?>/<?php echo e($jobPositionsView->step_id); ?>">
                                                                <span class="btn label-warning">Activate</span></a>
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
                                        
                                        <?php endif; ?>
                                    <td>
                                        <a class="btn btn-success"
                                        href="<?php echo e(url('view-steps-page')); ?>/<?php echo e($jobPositionsView->jobPositionId.'/'.$jobPositionsView->random_token); ?>"> <i class="fa fa-eye"></i> </a>

                                        <a class="btn btn-danger"
                                        href="<?php echo e(url('view-steps-page')); ?>/delete/<?php echo e($jobPositionsView->step_id.'/'.$jobPositionsView->random_token); ?>"> <i class="fa fa-trash"></i> </a>
                        
                                   </td> 
                                   
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                <?php if($showdata == '1'): ?>

                <?php if(!empty($datafetch)): ?>
                <?php $__currentLoopData = $datafetch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datafetchView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                <?php echo Form::open(['action' => ['careersStepsPage@updatestepsall'.'',$datafetchView->step_id],'id'=>'form']); ?>

                <?php echo e(Form::token()); ?>


                <div class="row" style="width:100%;margin:10px 0">

                    <div class="col-md-4 form-group">
                        <label for="employeeName">Select Job Position</label>
                        <?php echo e(Form::select('job_position_id',$jobPositionsArray,NULL,array('class'=>'form-control','id'=>'jobposition','required'=>'true'))); ?>

                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                aria-expanded="false" class="collapsed">
                            <div class="box-header with-border">
                                   
                                <h4 class="box-title">
                                   
                                        Introduction
                                    
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                            
                            </div>
                        </a>
                            <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false">
                                <div class="box-body">
                                    <div class="form-group">
                                        <h4 for="video">Article</h4>
                                    </div>
                                    <div class="form-group">
                                        <?php echo e(Form::textarea('introduction',$datafetchView->introduction,array('class' => 'form-control ckeditor','placeholder' => 'Introduction','required'=>'true'))); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->step1name != ''): ?>
                                       <?php echo e($datafetchView->step1name); ?>

                                       <?php else: ?>
                                       Step 1
                                       <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->step1Type == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->step1); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step1','https://vimeo.com/'.$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->step1Type == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->step1); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step1','https://www.youtube.com/watch?v='.$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->step1Type == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step1',$datafetchView->step1,array('class' => 'form-control','placeholder' => 'Step 1 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname1','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype1',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed1">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>

                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->step2name != ''): ?>
                                       <?php echo e($datafetchView->step2name); ?>

                                       <?php else: ?>
                                       Step 2
                                       <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->step2type == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->step2); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step2','https://vimeo.com/'.$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->step2type == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->step2); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step2','https://www.youtube.com/watch?v='.$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->step2type == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step2',$datafetchView->step2,array('class' => 'form-control','placeholder' => 'Step 2 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname2','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype2',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed2">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->step3name != ''): ?>
                                       <?php echo e($datafetchView->step3name); ?>

                                       <?php else: ?>
                                       Step 3
                                       <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->step3Type == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->step3); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step3','https://vimeo.com/'.$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->step3Type == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->step3); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step3','https://www.youtube.com/watch?v='.$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->step3Type == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step3',$datafetchView->step3,array('class' => 'form-control','placeholder' => 'Step 3 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname3','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype3',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed3">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->step4name != ''): ?>
                                       <?php echo e($datafetchView->step4name); ?>

                                       <?php else: ?>
                                       Step 4
                                       <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->step4type == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->step4); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step4','https://vimeo.com/'.$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->step4type == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->step4); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step4','https://www.youtube.com/watch?v='.$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->step4type == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step4',$datafetchView->step4,array('class' => 'form-control','placeholder' => 'Step 2 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname4','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype4',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed4">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname5 != ''): ?>
                                       <?php echo e($datafetchView->stepname5); ?>

                                       <?php else: ?>
                                       Step 5
                                       <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype5 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont5); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step5','https://vimeo.com/'.$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype5 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont5); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step5','https://www.youtube.com/watch?v='.$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype5 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step5',$datafetchView->stepcont5,array('class' => 'form-control','placeholder' => 'Step 5 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname5','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype5',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed5">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseSeven"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname6 != ''): ?>
                                       <?php echo e($datafetchView->stepname6); ?>

                                       <?php else: ?>
                                       Step 6
                                       <?php endif; ?>
                                       
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseSeven" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype6 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont6); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step6','https://vimeo.com/'.$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype6 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont6); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step6','https://www.youtube.com/watch?v='.$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype6 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step6',$datafetchView->stepcont6,array('class' => 'form-control','placeholder' => 'Step 6 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname6','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype6',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed6">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEight"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname7 != ''): ?>
                                    <?php echo e($datafetchView->stepname7); ?>

                                    <?php else: ?>
                                    Step 7
                                    <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseEight" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype7 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont7); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step7','https://vimeo.com/'.$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype7 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont7); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step7','https://www.youtube.com/watch?v='.$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype7 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step7',$datafetchView->stepcont7,array('class' => 'form-control','placeholder' => 'Step 7 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname7','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype7',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed7">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseNine"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname8 != ''): ?>
                                    <?php echo e($datafetchView->stepname8); ?>

                                    <?php else: ?>
                                    Step 8
                                    <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseNine" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype8 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont8); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step8','https://vimeo.com/'.$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype8 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont8); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step8','https://www.youtube.com/watch?v='.$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype8 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('stepcont8',$datafetchView->stepcont8,array('class' => 'form-control','placeholder' => 'Step 8 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname8','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype8',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed8">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTen"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname9 != ''): ?>
                                    <?php echo e($datafetchView->stepname9); ?>

                                    <?php else: ?>
                                    Step 9
                                    <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseTen" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype9 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont9); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('stepcont9','https://vimeo.com/'.$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype9 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont9); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step9','https://www.youtube.com/watch?v='.$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype9 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step9',$datafetchView->stepcont9,array('class' => 'form-control','placeholder' => 'Step 9 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname9','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype9',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed9">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseEleven"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    <?php if($datafetchView->stepname10 != ''): ?>
                                    <?php echo e($datafetchView->stepname10); ?>

                                    <?php else: ?>
                                    Step 10
                                    <?php endif; ?>
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           </div>
                        </a>
                            <div id="collapseEleven" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <?php if($datafetchView->steptype10 == 'vimeo'): ?>
                                    <div class="form-group">
                                        <iframe src="https://player.vimeo.com/video/<?php echo e($datafetchView->stepcont10); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="row" style="width:100%">
                                        <div class="form-group col-md-6">
                                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                                            <?php echo e(Form::text('step10','https://vimeo.com/'.$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                        </div>
                                    </div>
                                    <?php elseif($datafetchView->steptype10 == 'youtube'): ?>
                                    <div class="form-group">
                                        <iframe src="https://www.youtube.com/embed/<?php echo e($datafetchView->stepcont10); ?>"
                                            width="640" height="360" frameborder="0" allow="autoplay; fullscreen"
                                            allowfullscreen></iframe>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Enter Vimeo/Youtube Video URL</label>
                                        <?php echo e(Form::text('step10','https://www.youtube.com/watch?v='.$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Video URL'))); ?>

                                    </div>
                                    <?php elseif($datafetchView->steptype10 == 'text'): ?>
                                        <div class="form-group">
                                            <label for="video">Enter Content</label>
                                            <?php echo e(Form::textarea('step10',$datafetchView->stepcont10,array('class' => 'form-control','placeholder' => 'Step 10 Content'))); ?>

                                        </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label for="video">Step Name</label>
                                        <?php echo e(Form::text('stepname10','',array('class' => 'form-control','placeholder' => 'Step Name'))); ?>

                                    </div>
                                    <div class="form-group">
                                        <label for="video">Select Step Type</label>
                                        <?php echo e(Form::select('steptype10',['0'=>'- Select Step type -', 'video' =>'Video', 'text'=> 'Text'],'0',array('class' => 'form-control'))); ?>

                                    </div>
                                    <div class="form-group embed10">
                                        
                                    </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="panel box box-primary">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwelve"
                                class="collapsed" aria-expanded="false">
                            <div class="box-header with-border">
                                <h4 class="box-title">
                                    
                                        Survey Questions
                                    
                                </h4>
                                <i class="fa fa-angle-down float-right"></i>
                           
                            </div>
                        </a>
                            <div id="collapseTwelve" class="panel-collapse collapse" aria-expanded="false"
                                style="height: 0px;">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="question">Add Survey Questions</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="video">Survey Header</label>
                                        <?php echo e(Form::textarea('header_text',$datafetchView->step5_header,array('class' => 'form-control ckeditor','placeholder' => 'Survey Header Text'))); ?>

                                    </div>
                                    <div class="form-group">
                                      <label for="video">Survey Footer</label>
                                      <?php echo e(Form::textarea('footer_text',$datafetchView->step5_footer,array('class' => 'form-control ckeditor','placeholder' => 'Survey Footer Text'))); ?>

                                  </div>
                                    <?php echo e(Form::hidden('step5', $datafetchView->step5)); ?>

                                    <div class="form-group">
                                        <?php echo e(Form::text('question[]', '',array('class' => 'form-control','placeholder' => 'Question'))); ?>

                                    </div>
                                    <div id="TextBoxContainer">
                                    </div>
                                    <div class="form-group">

                                    </div>
                                    <div class="form-group">

                                        <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                            data-original-title="Add more controls"><i
                                                class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add More
                                            Fields&nbsp;</button>
                                    </div>
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
                                                <th>Question</th>
                                                <th style="text-align: center">Action</th>
                                            </tr>
                                            <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dataView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($dataView->question); ?></td>
                                                <td style="text-align: center">
                                                    <a
                                                        href="<?php echo e(url("view-careers-questions")); ?>/<?php echo e($dataView->questions_id); ?>">
                                                        <span class="label label-primary"> View <i
                                                                class="fa fa-eye"></i></span>
                                                    </a>
                                                    <a
                                                        href="<?php echo e(url("view-careers-questions")); ?>/<?php echo e($dataView->questions_id); ?>">
                                                        <span class="label label-success"> Edit <i
                                                                class="fa fa-pencil"></i></span>
                                                    </a>
                                                    <a
                                                        href="<?php echo e(url("view-careers-questions/delete")); ?>/<?php echo e($dataView->questions_id); ?>">
                                                        <span class="label label-danger"> Delete <i
                                                                class="fa fa-trash"></i></span>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <script src="https://code.jquery.com/jquery-latest.js"></script>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js">
                                </script>
                                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
                                </script>

                                <script>
                                    $(function () {
                        $("#btnAdd").bind("click", function () {
                            var div = $("<div />");
                            div.html(GetDynamicTextBox(""));
                            $("#TextBoxContainer").append(div);
                        });
                        $("body").on("click", ".remove", function () {
                            $(this).closest("div").remove();
                        });
                        });
                         function GetDynamicTextBox(value) {
                          return '<div class="form-group" style="position:relative" ><?php echo e(Form::text("question[]", "",array("class" => "form-control","placeholder" => "Question","required"=>"true"))); ?> <span style="position:absolute;right:0;top:0" class="btn btn-danger remove">remove</span> </div>'
                         }
                                </script>
                            </div>
                        </div>
                        <div class="row" style="width:100%;margin-top:20px">
                            <div class="form-group col-md-12">
                                <?php echo e(Form::submit('Save',array('class' => 'btn btn-success'))); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <?php echo Form::close(); ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <?php endif; ?>


                <?php endif; ?>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

</div>
<?php if($showdata == '1'): ?>
<?php $__currentLoopData = $jobPositionsName; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jobPositionsNameView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<script>
    $('#jobposition').prepend($("<option selected></option>").attr("value",'<?php echo e($jobPositionsNameView->jobPositionId); ?>').text('<?php echo e($jobPositionsNameView->name); ?>')); 
</script>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php endif; ?>

<script>
    $(document).ready(function () {
    for (let index = 1; index <= 10; index++) {
      
      $('select[name="steptype'+index+'"]').change(function () {
        
        console.log($(this).val());
        if($(this).val() == 'text')
        {
          var text = '<label for="video">Enter Text</label><textarea id="step'+index+'" name="step'+index+'" class="form-control ckeditor" placeholder="Article"></textarea>';
          $('.embed'+index).empty();
          $('.embed'+index).append(text);
        }
        if($(this).val() == 'video')
        {
          var video = '<label for="video">Enter Vimeo/Youtube Video URL</label><input type="text" name="step'+index+'" class="form-control" placeholder="Video URL">';
          $('.embed'+index).empty();
          $('.embed'+index).append(video);
        }
        if($(this).val() == '0')
        {
          $('.embed'+index).empty();
        }
      });
    } 
  });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>