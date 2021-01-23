
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
              <h3 class="box-title">Add Careers Steps</h3>
            </div>
            <div class="col-md-12">

              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div class="alert alert-danger">
                  <ul>
                      <li><?php echo e($error); ?></li>
                  </ul>
              </div>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
              
              <?php if(Session::has("success")): ?>
              <div class="alert alert-success">
                  <ul>
                      <li><?php echo e(Session::get("success")); ?></li>
                  </ul>
              </div>
              <?php endif; ?>

              <?php if(Session::has("exists")): ?>
              <div class="alert alert-warning">
                  <ul>
                      <li><?php echo e(Session::get("exists")); ?></li>
                  </ul>
              </div>
              <?php endif; ?>


              
          </div>

            <?php echo Form::open(['action' => 'careersStepsPage@storeAll','id'=>'form']); ?>

            <?php echo e(Form::token()); ?>


          <div class="row" style="width:100%;margin:10px 0">
            
          <div class="col-md-4 form-group">
          <label for="employeeName">Select Job Position</label>
          <?php echo e(Form::select('job_position_id',$jobPositionsArray,NULL,array('class'=>'form-control','required'=>'true'))); ?>

          </div>
           </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                  <div class="box-header with-border">
                    <h4 class="box-title">Introduction</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseOne" class="panel-collapse collapse in" aria-expanded="false">
                    <div class="box-body">
                        <div class="form-group">
                      <h4 for="video">Article</h4>
                    </div>
                      <div class="form-group">
                          <?php echo e(Form::textarea('introduction','',array('class' => 'form-control ckeditor','placeholder' => 'Introduction','required'=>'true'))); ?>

                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                  <div class="box-header with-border">
                    <h4 class="box-title">Step 1</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="video">Enter Vimeo/Youtube Video URL</label>
                            <?php echo e(Form::text('step1','',array('class' => 'form-control','placeholder' => 'Video URL','required'=>'true'))); ?>

                        </div>
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="collapsed" aria-expanded="false">
                  <div class="box-header with-border">
                    <h4 class="box-title">Step 2</h4>
                    <i class="fa fa-angle-down float-right"></i>
                  </div>
                </a>
                  <div id="collapseThree" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                      <div class="box-body">
                          <div class="form-group">
                        <h4 for="video">Article</h4>
                      </div>
                        <div class="form-group">
                            <?php echo e(Form::textarea('step2','',array('class' => 'form-control ckeditor','placeholder' => 'Article','required'=>'true'))); ?>

                        </div>
                        
                    </div>
                  </div>
                </div>
                <div class="panel box box-primary">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour" class="collapsed" aria-expanded="false">
                    <div class="box-header with-border">
                      <h4 class="box-title">Step 3</h4>
                      <i class="fa fa-angle-down float-right"></i>
                    </div>
                  </a>
                    <div id="collapseFour" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="video">Enter Vimeo/Youtube Video URL</label>
                                <?php echo e(Form::text('step3','',array('class' => 'form-control','placeholder' => 'Video URL','required'=>'true'))); ?>

                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="panel box box-primary">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive" class="collapsed" aria-expanded="false">
                      <div class="box-header with-border">
                        <h4 class="box-title">Step 4</h4>
                        <i class="fa fa-angle-down float-right"></i>
                      </div>
                    </a>
                      <div id="collapseFive" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                              <h4 for="video">URL Link</h4>
                              <div class="form-group">
                                  <?php echo e(Form::text('step4','',array('class' => 'form-control ckeditor','placeholder' => 'Link','required'=>'true'))); ?>

                              </div>
                          </div>
                      </div>
                    </div>
                    <div class="panel box box-primary">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseSix" class="collapsed" aria-expanded="false">
                        <div class="box-header with-border">
                          <h4 class="box-title">Step 5</h4>
                          <i class="fa fa-angle-down float-right"></i>
                        </div>
                      </a>
                        <div id="collapseSix" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                          <div class="box-body">
                            <div class="form-group">
                                <label for="question">Add Survey Questions</label>
                            </div>
                            <?php 
                                $pin = rand(1000000, 9999999);
                                $pin2 = rand(1000000, 9999999); 
                                $string = $pin.$pin2;
                                ?>
                            <?php echo e(Form::hidden('step5', $string)); ?>

                            <div class="form-group">
                                <?php echo e(Form::text('question[]', '',array('class' => 'form-control','placeholder' => 'Question','required'=>'true'))); ?>

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
                        </div>
                        <script src="https://code.jquery.com/jquery-latest.js"></script>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

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

          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
     
</div>
 <?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>