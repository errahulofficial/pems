 
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
  
        .description {
            font-size: 1em;
            display: inline-block;
            margin-top: 10px;
            margin-left: 0px;
            margin-bottom: 0px;
            color: rgb(23,23,23);
            overflow: hidden;
            font-weight: normal;
            -webkit-user-select: none;
           /* Safari */
            -moz-user-select: none;
           /* Firefox */
            -ms-user-select: none;
           /* IE10+/Edge */
            user-select: none;
           /* Standard */
          
       }
        .colorpicker {
            position: relative;
            z-index: 10;
            display: block;
            width: 100%;
            border-radius: 10px;
            height: auto;
            background-color: #fff;
            transition: all 0.8s;
            -webkit-user-select: none;
           /* Safari */
            -moz-user-select: none;
           /* Firefox */
            -ms-user-select: none;
           /* IE10+/Edge */
            user-select: none;
           /* Standard */
          -webkit-box-shadow: none;
       -moz-box-shadow: none;
       box-shadow: none;
       }
       
        .picker {
            display: inherit;
       }
        .swatch {
            margin-left: 0;
            margin-right: auto;
            margin-top: 5px;
            margin-bottom: 10px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            width: 100%;
            height: 30px;
            border-radius: 20px;
            border: 1px #222d32 solid;
            box-shadow: none;
       }
        .slider-container {
            margin-left: 0;
            margin-right: auto;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            width: 100%;
            height: 30px;
            border: 0px #222d32 solid;
            border-radius: 20px;
       }
        .slider {
            -webkit-appearance: none;
            -moz-appearance: none;
           /* Override default CSS styles */
            appearance: none;
            width: 100%;
           /* Full-width */
            height: 30px;
           /* Specified height */
            outline: none;
           /* Remove outline */
            margin:0 auto;
            box-shadow: none;
       }
        .slider::-webkit-slider-thumb:hover {
            border: 2px rgb(151, 174, 243) solid;
            border: 2px rgba(151, 174, 243, 0.8) solid;
       }
        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            -moz-appearance: none;
           /* Override default look */
            appearance: none;
            width: 28px;
           /* Set a specific slider handle width */
            height: 28px;
           /* Slider handle height */
            border-radius: 30px;
            border: 2px rgb(255, 255, 255) solid;
            border: 2px rgba(255, 255, 255, 0.8) solid;
            box-shadow: none;
            cursor: pointer;
           /* Cursor on hover */
       }
        .slider::-moz-range-thumb {
            width: 28px;
           /* Set a specific slider handle width */
            height: 28px;
           /* Slider handle height */
            border-radius: 30px;
            border: 2px rgb(64, 99, 206) solid;
            border: 2px rgba(64, 99, 206, 0.8) solid;
            cursor: pointer;
           /* Cursor on hover */
       }
        form {
            margin: auto;
       }
        input {
            width: 100%;
       }
        .hue {
            background-image: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 1px #222d32 solid;
            border-radius: 20px;
       }
        .satcolor {
            background-color: transparent;
       }
        .sat {
            background-image: linear-gradient(to right, #494949 0%, transparent 100%), linear-gradient(to right, #fff 0%, transparent 0%);
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 1px #222d32 solid;
            border-radius: 20px;
       }
        .light {
            background-image: linear-gradient(to right, #000 0%, transparent 100%), linear-gradient(to right, #fff 0%, transparent 100%);
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 1px #222d32 solid;
            border-radius: 20px;
       }</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="d-flex">
<div class="col-md-5">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interview Status</h3>
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
        <?php echo Form::open(['action' => 'interviewStatus@store','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-12 form-group">
                    <label for="name">Name</label> <?php echo e(Form::text('name', '',array('class' => 'form-control','placeholder'
                    => 'Name','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                        <label for="status">Select Color</label>
                        <div class="colorpicker" id="colorpicker">
                            <span key="picker" class="picker" id="picker">
                               <h3 class="description">COLOR</h3>
                               <div class="swatch" id="color">
                               </div>
                               <?php echo e(Form::text('colorcode', '',array('class' => 'form-control','placeholder' =>
                      'colorcode','id'=>'colorcode','required'=>'true'))); ?>

                               <h6 class="description">HUE</h6>
                               <div class="slider-container">
                                  <input name="hue" type="range" min="1" max="300" value="130" class="slider hue" />
                               </div>
                               <h6 class="description">SATURATION</h6>
                               <div class="slider-container">
                                  <input name="sat" id="sat" type="range" min="1" max="100" value="60" class="slider sat" />
                               </div>
                               <h6 class="description">LIGHT</h6>
                               <div class="slider-container">
                                  <input name="light" type="range" min="1" max="100" value="55" class="slider light" />
                               </div>
                         </div>
                    </div>
                <div class="col-md-12 form-group">
                    <label for="jobposition">Select Job Position</label> <?php echo e(Form::select('jobposition',$jobPositionsArray,NULL,array('class'=>'form-control','id'=>'jobposition','required'=>'true'))); ?>

                </div>
                <div class="col-md-12 form-group">
                        <label for="step">Select Step</label> <?php echo e(Form::select('step',[],NULL,array('class'=>'form-control','id'=>'step','required'=>'true'))); ?>

                </div>
             </div>
            <div class="form-group d-flex">
                <?php echo e(Form::submit('ADD',array('class' => 'btn btn-primary'))); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="col-md-8 d-flex">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Interview Status</h3>
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
                  <th>Name</th>
                  <th>Color Code</th>
                  <th>Job Position</th>
                  <th>Job Position Step</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
      <?php $__currentLoopData = $interviewStatus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interviewStatusView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($interviewStatusView->interviewstatus_name); ?></td>
                  <td class="text-center">
                        <span class="d-flex" style="background:<?php echo e($interviewStatusView->interviewstatus_colorcode); ?>;width:25px;height:25px;border-radius:50%;"></span>
                        </td>
                  <td><?php echo e($interviewStatusView->jobposition_name); ?></td>
                  <td><?php echo e($interviewStatusView->jobpositionstep_stepname); ?></td>
                  <td>
                      


                      <a href="<?php echo e(url('interview-status-email')); ?>/<?php echo e($interviewStatusView->interviewstatusid); ?>"
                      class="label label-warning">EMAIL SETUP<i
                      class="fa fa-pencil "></i></a>
                    </td>
                  <td>

                    <a href="<?php echo e(url('interview-status/edit')); ?>/<?php echo e($interviewStatusView->interviewstatusid); ?>"
                    class="label label-success"><i
                    class="fa fa-pencil "></i></a>
               
                                    <a data-toggle="modal"
                                        data-target="#modal-view-delete-<?php echo e($interviewStatusView->interviewstatusid); ?>"
                                        class="label label-danger"> <i
                                        class="fa fa-trash "></i></a>
                                    <div class="modal modal-danger fade"
                                        id="modal-view-delete-<?php echo e($interviewStatusView->interviewstatusid); ?>"
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
                                                        <a href="<?php echo e(url('interview-status/delete')); ?>/<?php echo e($interviewStatusView->interviewstatusid); ?>">
                                                            <span class="btn label-warning">DELETE <i
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
            <div class="px-10 py-0"> <?php echo e($interviewStatus->links()); ?></div>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>

<script>
    $(document).ready(function() {
        $('select[name="jobposition"]').on('change', function(){
               var jobpositionid = $(this).val();
               if(jobpositionid) {
                   $.ajax({
                       url: '<?php echo e(url('')); ?>/jobposition/get/'+jobpositionid,
                       type:"GET",
                       dataType:"json",
                        success:function(data) {
                        $('select[name="step"]').empty();
                        $('select[name="step"]').prepend('<option>Select Subject Name</option>');
                        $.each(data, function(key, value){
                        $('select[name="step"]').append('<option value="'+ key + '|' + value +'">' + value + '</option>');
                    });
            },
       });
               } else {
       $('select[name="step"]').append('<option value="">NULL</option>');
               }
       });
       });
       $('select[name="step"]').append('<option value="" >Select Job Position Step</option>');
           $('select[name="jobposition"]').prepend('<option value="" selected>Select Job Position</option>');
</script>

<script>
        let hue = 130;
        let sat = 60;
        let light = 55;
        
        const hslToHex = (h, s, l) => {
            h /= 360;
            s /= 100;
            l /= 100;
            let r, g, b;
            if (s === 0) {
                r = g = b = l; // achromatic
            } else {
                const hue2rgb = (p, q, t) => {
                    if (t < 0) t += 1;
                    if (t > 1) t -= 1;
                    if (t < 1 / 6) return p + (q - p) * 6 * t;
                    if (t < 1 / 2) return q;
                    if (t < 2 / 3) return p + (q - p) * (2 / 3 - t) * 6;
                    return p;
                };
                const q = l < 0.5 ? l * (1 + s) : l + s - l * s;
                const p = 2 * l - q;
                r = hue2rgb(p, q, h + 1 / 3);
                g = hue2rgb(p, q, h);
                b = hue2rgb(p, q, h - 1 / 3);
            }
            const toHex = x => {
                const hex = Math.round(x * 255).toString(16);
                return hex.length === 1 ? '0' + hex : hex;
            };
            return `#${toHex(r)}${toHex(g)}${toHex(b)}`;
        }
        
        const colorChange = () => {
            const swatch = document.querySelector('.swatch');
            const colorcode = document.getElementById('colorcode');
            swatch.style.backgroundColor = getHSL();
            swatch.value = getHEX();
            colorcode.value = getHEX();
            // console.log(`${getHSL()} hex: ${getHEX()}`);
            document.getElementById('sat').style.backgroundColor = getHSL();
        };
        
        const getHEX = () => {
            return hslToHex(hue, sat, light);
        };
        const getHSL = () => {
            return `hsl(${hue}, ${sat}%, ${light}%)`;
        };
        
        const main = () => {
            const hueInput = document.querySelector('input[name=hue]');
            hueInput.addEventListener('input', () => {
                hue = hueInput.value;
                colorChange();
            });
        
            const satInput = document.querySelector('input[name=sat]');
            satInput.addEventListener('input', () => {
                sat = satInput.value;
                colorChange();
            });
        
            const lightInput = document.querySelector('input[name=light]');
            lightInput.addEventListener('input', () => {
                light = lightInput.value;
                colorChange();
            });
        
            colorChange();
        };
        
        document.addEventListener('DOMContentLoaded', main);
        </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>