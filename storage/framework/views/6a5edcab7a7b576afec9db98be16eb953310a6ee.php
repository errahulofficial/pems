 
<?php $__env->startSection('content'); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="<?php echo e(url('theme/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<div class="col-md-12 d-flex">

    <div class="box box-primary">
        <div class="box-header with-border d-flex align-items-center">
            <h3 class="box-title col-xs-6 d-flex align-items-center p-0">Add Portals</h3>
			<span class="col-xs-8 text-right p-0">
                <a class="btn btn-primary" href="<?php echo e(url('portal-cities')); ?>">Add/View Portal Cities</a>
                <a class="btn btn-primary" href="<?php echo e(url('portal-name')); ?>">Add/View Portal Names</a>
            </span>
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
       <?php echo Form::open(['action' => 'PortalController@store','id'=>'form']); ?> 
        <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row">
			<?php echo e(Form::hidden('shortcode', '',array('class' => 'form-control','required'=>'true'))); ?>

			<div class="col-md-3 form-group">
                    <label for="territory">Territory</label> <?php echo e(Form::select('territory', $territory ,null,array('class' => 'form-control','id'=>'territory','placeholder'
                    => '- Select Territory - ','required'=>'true'))); ?>

                </div>
				
                <div class="col-md-3 form-group">
                    <label for="city">City</label> <?php echo e(Form::select('city',[] ,null,array('class' => 'form-control','id'=>'city','placeholder'
                    => '- Select City -','required'=>'true', 'onchange'=>"showLinks();"))); ?>

                </div>
				
					<div class="col-md-3 form-group">
                    <label for="portal_name">Portal Name</label> <?php echo e(Form::select('portal_name',$pnames ,null,array('class' => 'form-control','id'=>'portal','placeholder'
                    => '- Select Portal Name -','required'=>'true', 'onchange'=>"showLinks();"))); ?>

                </div>
				<div class="col-md-3 form-group">
                   <label for="position">Position</label> <?php echo e(Form::select('position',$position ,null,array('class' => 'form-control','id'=>'position','placeholder'
                    => '- Select Position -','required'=>'true', 'onchange'=>"showLinks();"))); ?>

                </div>
				
				<div class="col-md-6 form-group">
                    <label for="inbound">Inbound URL</label> <?php echo e(Form::text('inbound','',array('class' => 'form-control','placeholder'
                    => 'Inbound URL','required'=>'true','readonly'=>'true'))); ?>

                </div>
				<div class="col-md-6 form-group">
                    <label for="outbound">Outbound URL </label> <?php echo e(Form::text('outbound','',array('class' => 'form-control','placeholder'
                    => 'Outbound URL','required'=>'true','readonly'=>'true'))); ?>

                </div>
				
                <div class="col-md-6 form-group">
                    <label for="url">URL</label> <?php echo e(Form::text('url','',array('class' => 'form-control','placeholder'
                    => 'URL','required'=>'true'))); ?>

                </div>
				
				<div class="col-md-3 form-group">
                    <label for="status">Status</label> <?php echo e(Form::select('status',array('untested'=>'Untested','tested'=>'Tested','posted'=>'Posted'),null,array('class' => 'form-control','required'=>'true'))); ?>

                </div>
				
				<div class="col-md-3 form-group">
                    <label for="date">Date</label> <?php echo e(Form::text('date',date("d-m-Y"),array('class' => 'form-control','id'=>'to_date','placeholder'=> 'Date','required'=>'true'))); ?>

                </div>
                
                <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('Save',array('class' => 'btn btn-primary'))); ?>

                </div>
            </div>
        </div>
		
        <?php echo Form::close(); ?>

    </div>
</div>
<div class="col-md-12 d-flex">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Portals</h3>
           
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
                        <th>Portal</th>
                        <th>Position</th>
                        <th>URL</th>
                        <th>Territory</th>
                        <th>City</th>
                        <th>Shortcode</th>
                        <th>Visits</th>
						<th>Action</th>
                    </tr>
					
                    <?php $__currentLoopData = $portal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pnames[$name->portal]); ?></td>
                        <td><?php echo e($position[$name->position]); ?></td>
                        <td><?php echo e($name->url); ?></td>
                        <td><?php echo e($territory[$name->division_id]); ?></td>
						<td><?php echo e($pcity[$name->city]); ?> </td>
						<td><?php echo e($name->shortcode); ?> </td>
						<td><?php echo e($name->counts); ?> </td>
						
                        <td>
                            <a data-toggle="modal" data-target="#modal-delete-<?php echo e($name->id); ?>" href=""> <span class="label label-danger"><i class="fa fa-trash "></i></span></a>
                            <div class="modal modal-danger fade" id="modal-delete-<?php echo e($name->id); ?>" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-contents">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">Delete from list</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                            <a href="<?php echo e(url('portal-del')); ?>/<?php echo e($name->id); ?>"><button type="button" class="btn btn-outline">Sure to Delete !</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <div class="px-10 py-0"> <?php echo e($portal->links()); ?></div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>

 <script type="text/javascript">
$('#to_date').datepicker({
	autoclose:true,
	format:'dd-mm-yyyy'
});
</script>

<script type="text/javascript">
var territory = "";
$('#territory').on('change',function(){
    territory = $(this).val();
    if(territory){
        $.ajax({
           type:"GET",
           url:'get-cities/'+territory,
		   dataType: "json",
           success:function(res){               
            if(res){
				
                $("#city").empty();
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
		});
	}
});
		
</script>
<script type="text/javascript">

  var rand_no = Math.random().toString(36).substring(7);
  $('input[name="shortcode"]').val(rand_no);
function showLinks(){
  var division_id = $('#territory').val();
  var portal_city = $('#city').val();
  var portal_id = $('#portal').val();
  var position_id = $('#position').val();
  var ter = JSON.parse('<?php echo json_encode($territory); ?>');
  var por = JSON.parse('<?php echo json_encode($portal); ?>');
  var pos = JSON.parse('<?php echo json_encode($position); ?>');
  var tok = JSON.parse('<?php echo json_encode($token); ?>');
  if ( portal_city != '0' && portal_id != '' && position_id != '') {
	  
  $('input[name="inbound"]').val('<?php echo e(url('/careers')); ?>'+"/"+position_id+"/"+tok[position_id]+"?s="+rand_no);
  $('input[name="outbound"]').val('<?php echo e(url('/careers')); ?>'+"/"+position_id+"/"+tok[position_id]+"?s="+rand_no);
	  
	  
  }

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>