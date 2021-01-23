<?php $__env->startSection('content'); ?>
<div class="col-md-12 d-flex">
    <div class="col-md-8 d-flex">
        <div class="box box-primary">
            <div class="box-header with-border d-flex align-items-center">
                <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Profile</h3>
            </div>
            <div class="col-md-12">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="alert alert-danger">
                    <ul>
                        <li><?php echo e($error); ?></li>
                    </ul>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
				
				<?php if(Session::has("error")): ?>
                <div class="alert alert-danger">
                    <ul>
                        <li><?php echo e(Session::get("error")); ?></li>
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
            </div>
            <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profiledata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo Form::open(['action' => 'profile@update','files'=>'true','id'=>'form']); ?>

            <?php echo e(Form::token()); ?>

            <div class="box-body">
                <div class="row">

                    <div class="col-md-6 form-group">
                        <label for="First Name">First Name</label> <?php echo e(Form::text('fname', $profiledata->fname,array('class'
                        => 'form-control','placeholder' => 'name','required'=>'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="lname">Last Name</label> <?php echo e(Form::text('lname', $profiledata->lname,array('class' =>
                        'form-control','placeholder' => 'Last Name','required'=>'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="email">Email</label> <?php echo e(Form::text('email', $profiledata->email,array('class' => 'form-control','placeholder'
                        => 'Email','required'=>'true', 'readonly' => 'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="phone">Phone</label> <?php echo e(Form::text('phone', $profiledata->phone,array('class' => 'form-control','placeholder'
                        => 'Phone','required'=>'true'))); ?>

                    </div>
					<div class="col-md-6 form-group">
                        <label for="gender">Gender</label> <?php echo e(Form::select('gender', array('male'=>'Male','female' => 'Female' ,'other' => 'Others'),$profiledata->gender,array('class'=> 'form-control','placeholder' => 'Gender'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="city">City</label> <?php echo e(Form::text('city', $profiledata->city,array('class' => 'form-control','placeholder'
                        => 'City','required'=>'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="state">State</label> <?php echo e(Form::text('state', $profiledata->state,array('class' => 'form-control','placeholder'
                        => 'State','required'=>'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="zip">Zip</label> <?php echo e(Form::text('zip', $profiledata->zip,array('class' => 'form-control','placeholder'
                        => 'Zip','required'=>'true'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="image">Upload DP</label> <?php echo e(Form::file('image',array('class' => 'form-control'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="resume">Copy of identity document</label> <?php echo e(Form::file('resume',array('class' => 'form-control'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="docs">Copy of proof of address</label> <?php echo e(Form::file('docs',array('class' => 'form-control'))); ?>

                    </div>
                    <div class="col-md-6 form-group">
                        <label for="skypeid">Skype Id</label> <?php echo e(Form::text('skypeid', $profiledata->skypeid,array('class'
                        => 'form-control','placeholder' => 'Skype'))); ?>

                    </div>
					
					 <div class="col-md-6 form-group">
					 <h3>Home Address</h3>
                        <label for="home_address">Home Address</label> <?php echo e(Form::text('home_address',$profiledata->home_address,array('class'
                        => 'form-control','placeholder' => 'Home Address'))); ?>

						<label for="home_city">Home City</label> <?php echo e(Form::text('home_city',$profiledata->home_city,array('class'
                        => 'form-control','placeholder' => 'Home City'))); ?>

						<label for="home_zip">Zip Code</label> <?php echo e(Form::text('home_zip',$profiledata->home_zip,array('class'
                        => 'form-control','placeholder' => 'Zip Code'))); ?>

						<label for="home_state">Home State</label> <?php echo e(Form::text('home_state',$profiledata->home_state,array('class'
                        => 'form-control','placeholder' => 'Home State'))); ?>

						<label for="home_country">Home Country</label> <?php echo e(Form::text('home_country',$profiledata->home_country,array('class'
                        => 'form-control','placeholder' => 'Home Country'))); ?>

                    </div>
					 <div class="col-md-6 form-group">
					  <h3>Business Address</h3>
                        <label for="business_address">Business Address</label> <?php echo e(Form::text('business_address', $profiledata->business_address,array('class'
                        => 'form-control','placeholder' => 'Business Address'))); ?>

						<label for="business_city">Business City</label> <?php echo e(Form::text('business_city', $profiledata->business_city,array('class'
                        => 'form-control','placeholder' => 'business_city'))); ?>

						<label for="business_state">Business State</label> <?php echo e(Form::text('business_state', $profiledata->business_state,array('class'
                        => 'form-control','placeholder' => 'Business State'))); ?>

						<label for="business_zip">Zip Code</label> <?php echo e(Form::text('business_zip',$profiledata->business_zip ,array('class'
                        => 'form-control','placeholder' => 'Business Zip Code'))); ?>

						<label for="business_country">Business Country</label> <?php echo e(Form::text('business_country', $profiledata->business_country,array('class'
                        => 'form-control','placeholder' => 'Business Country'))); ?>

                    </div>
					
					 <div class="col-md-12 form-group">
                        <label for="confirm">I certify that all information I have entered on this page and attachments sent is true. Type "Yes" here (this field is case sensitive):</label> <?php echo e(Form::text('confirm', $profiledata->confirm,array('class'
                        => 'form-control','placeholder' => 'Yes'))); ?>

                    </div>

                    <div class="col-md-12 form-group">
                        <?php echo e(Form::submit('UPDATE PROFILE',array('class' => 'btn btn-success'))); ?>

                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
	
    </div>

    <div class="col-md-4 d-flex">
        <div class="col-md-12" style="padding:0">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Identity Proof</h3>
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
                </div>
                <div class="box-body table-responsive px-10 py-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>View</th>

                                <th>Action</th>
                            </tr>


                            <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profiledata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $resume_folder = $profiledata->resume_folder; $resume = $profiledata->resume;
                            $singleresume
                            = explode(',',$resume);
                            $id_increment = '1';
                            ?>
                            <?php $__currentLoopData = $singleresume; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singleresumeView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(!empty($singleresumeView)): ?>
                            <tr>
                                <td><a href="<?php echo e(url("$resume_folder/$singleresumeView ")); ?>"><?php echo e($singleresumeView); ?></a>
                                </td>
                                <td>

                                    <a href="<?php echo e(url("$resume_folder/$singleresumeView")); ?>">
                                        <span class="label label-success">
                                            <i class="fa fa-eye "></i>
                                        </span></a>

                                   
                                    <a data-toggle="modal" data-target="#modal-resume-delete-<?php echo e($id_increment); ?>"
                                        href=""> <span class="label label-danger">
                                            <i class="fa fa-trash "></i>
                                        </span></a>

                                    <div class="modal modal-danger fade" id="modal-resume-delete-<?php echo e($id_increment); ?>"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-contents">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete Identity Document</h4>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="<?php echo e(url('profile/delete/resume/')); ?>/<?php echo e($singleresumeView); ?>">
                                                        <span class="btn label-warning">
                                                            Delete
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>


                                </td>
                            </tr>

                            <?php endif; ?>
                            <?php
                            $id_increment++;
                            ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                    <div class="px-10 py-0"> </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-success w-100">
                <div class="box-header with-border">
                    <h3 class="box-title">Documents</h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <?php if(Session::has("successdocs")): ?>
                    <div class="alert alert-success">
                        <ul>
                            <li><?php echo e(Session::get("successdocs")); ?></li>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="box-body table-responsive px-10 py-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>View</th>

                                <th>Action</th>
                            </tr>


                            <?php $__currentLoopData = $profile; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profiledata): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $docs_folder = $profiledata->docs_folder; $docs =
                            $profiledata->docs; $singledocs
                            = explode(',',$docs) ;
                            $id_increment = '1';
                            ?> <?php $__currentLoopData = $singledocs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $singledocsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if(!empty($singledocsView)): ?>
                            <tr>
                                <td><a href="<?php echo e(url("$docs_folder/$singledocsView ")); ?>"><?php echo e($singledocsView); ?></a></td>
                                <td>


                                    <a href="<?php echo e(url("$docs_folder/$singledocsView ")); ?>">
                                        <span class="label label-success">
                                            <i class="fa fa-eye "></i>
                                        </span>
                                    </a>

                                    

                                    <a data-toggle="modal" data-target="#modal-documents-delete-<?php echo e($id_increment); ?>"
                                        href=""> <span class="label label-danger">
                                            <i class="fa fa-trash "></i>
                                        </span></a>

                                    <div class="modal modal-danger fade" id="modal-documents-delete-<?php echo e($id_increment); ?>"
                                        style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-contents">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">×</span></button>
                                                    <h4 class="modal-title">Delete Document</h4>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline pull-left"
                                                        data-dismiss="modal">Close</button>
                                                    <a href="<?php echo e(url('profile/delete/docs/')); ?>/<?php echo e($singledocsView); ?>">
                                                        <span class="btn label-warning">
                                                            Delete
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>






                                </td>
                            </tr>
                            <?php endif; ?>
                            <?php
                            $id_increment++;
                            ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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