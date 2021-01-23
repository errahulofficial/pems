
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(url('theme/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interviews</h3>
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

        <?php echo Form::open(['action' => 'interviews@getInterviews','id'=>'form']); ?>

        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
                <div class="col-md-4 form-group">
                    <label for="jobposition">Select Job Position</label> <?php echo e(Form::select('jobposition',$jobPositionsArray,NULL,array('class'=>'form-control','id'=>'jobposition','required'=>'true'))); ?>

                </div>
                <div class="col-md-4 form-group">
                    <label for="status">Select Status</label> <?php echo e(Form::select('status', [] , null, ['class' => 'form-control','required'=>'true']
                    )); ?>

                </div>
                <div class="col-md-4 form-group">
                    <label for="interviewer">Select Interviewer</label> <?php echo e(Form::select('interviewer', [] , null, ['class'
                    => 'form-control','required'=>'true'] )); ?>

                </div>
              
                <div class="col-md-4 form-group">
                    <label for="from_date">From Date</label> <?php echo e(Form::text('from_date', date("d-m-Y"),array('class' => 'form-control','id'=>'from_date','placeholder' => 'From Date','required'=>'true'))); ?>


                </div>
                <div class="col-md-4 form-group">
                    <label for="to_date">To Date</label> <?php echo e(Form::text('to_date', date("d-m-Y"),array('class' => 'form-control','id'=>'to_date','placeholder' => 'To Date','required'=>'true'))); ?>


                </div>
            </div>

            <div class="form-group">
                <?php echo e(Form::submit('APPLY FILTER',array('class' => 'btn btn-primary'))); ?>

            </div>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<script>
    $(document).ready(function () {

        $('select[name="jobposition"]').on('change', function () {
            var jobpositionid = $(this).val();
            if (jobpositionid) {
                $.ajax({
                    url: 'jobposition/interviewer/get/' + jobpositionid,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="status"]').empty();
                        // $('select[name="status"]').prepend(
                        // '<option selected>Select Status</option>');
                        $.each(data, function (key, value) {
                            $('select[name="status"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });

                        var options = $('select[name="status"] option');
                        var arr = options.map(function(_, o) {
                            return {
                                t: $(o).text(),
                                v: o.value
                            };
                        }).get();
                        arr.sort(function(o1, o2) {
                            return o1.t > o2.t ? 1 : o1.t < o2.t ? -1 : 0;
                        });
                        options.each(function(i, o) {
                            console.log(i);
                            o.value = arr[i].v;
                            $(o).text(arr[i].t);
                        });
                        $('select[name="status"]').prepend('<option value="any" selected>Any Status</option>');
                        // $('select[name="status"]').prepend(
                        // '<option selected>Select Status</option>');

                    },
                });
            } else {
                $('select[name="status"]').append('<option value="select">NULL</option>');
            }
        });
    });
    $('select[name="jobposition"]').prepend('<option value="" selected>Select Job Position</option>');
    $('select[name="status"]').prepend('<option value="any" selected>Any Status</option>');
    $('select[name="interviewer"]').prepend('<option value="any">Any Interviewer</option>');
    // $('select[name="jobposition"]').prepend('<option value="select" selected>Select Job Position</option>');
    

</script>



<script>
    $(document).ready(function() {
           $('select[name="jobposition"]').on('change', function(){
                   var jobpositionid = $(this).val();
                   if(jobpositionid) {
                       $.ajax({
                           url: 'interviewer/get/' + jobpositionid,
                           type:"GET",
                           dataType:"json",
                            success:function(data) {
    
                            $('select[name="interviewer"]').empty();
                            $('select[name="interviewer"]').prepend('<option value="any">Any Interviewer</option>');
                            // $('select[name="interviewer"]').prepend('<option selected>Select Interviewer</option>');
                            
                            $.each(data, function(key,value){
                            $('select[name="interviewer"]').append('<option value="'+ key +'">' + value +  '</option>');
                            });
                           },
           
                       });
                   } else {
                        $('select[name="interviewer"]').append('<option value="select">NULL</option>');
                    }
            });
       });
</script>


 <script type="text/javascript">
$('#to_date').datepicker({
	autoclose:true,
	format:'dd-mm-yyyy'
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>