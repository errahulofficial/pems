
<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo e(url('assets/css/calander.css')); ?>">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo e(url('theme/plugins/input-mask/jquery.inputmask.date.extensions.js')); ?>"></script>
<script src="<?php echo e(url('theme/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')); ?>"></script>
<style>

    .couponcode:hover .coupontooltip {
    display: block;
}
    .couponcode1:hover .coupontooltip1 {
    display: block;
}


.coupontooltip ul li{
     color: black;
}
.coupontooltip1 ul li{
     color: black;
}
.coupontooltip {
    display: none;
    background: #C8C8C8;
    padding: 10px;
    position: absolute;
    z-index: 1000;
    color: black;

}
.coupontooltip1 {
    display: none;
    background: #C8C8C8;
    padding: 10px;
    position: absolute;
    z-index: 1000;
    color: black;

}
.font18{
	font-size:18px;
}
.border1{
	border: 1px solid white;
	padding:5px;

}
.pr5{
	padding-right:15px;
}
    .ui-datepicker {
        width: 100%;
        padding: .2em .2em 0;
        display: none;
    }

    #ui-datepicker-div {
        position: inherit !important;
        display: block !important;
    }

    #datepicker2 {
        visibility: hidden !important;
        height: 0px;
        width: 0;
        margin: 0;
        display: -webkit-box;
    }

    select {
        direction: ltr;
    }
	.navcolor{
		color: white;
	}
	.pt10{
		padding-top: 10px;
	}
</style>
<style>
    .content.container-fluid.d-flex {
        display: block !important
    }

    .modal-dialog.widthi {
        width: 80%
    }

    .bg-transparent {
        background-color: transparent !important;
        margin-top: 20px;
    }

    a.text-white {
        color: #fff
    }

    a.text-white:hover {
        color: #00b9c3
    }
</style>
<div class="col-md-12 ">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Interviews</h3>
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






<div class="col-md-12">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Applicants</h3>
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

        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Job Position</th>
                    <th>Applicant</th>
                    <th>Location</th>
                    <th>Steps page time</th>
                    <th>Survey page time</th>
                    <th>Survey page Result</th>
                    <th>Interviewer</th>
                    <th>Interview Date</th>
                    <th>Status</th>
                    <th>Reschedule</th>
                    <th>Action</th>
                    <th>Email</th>
                </tr>

                <?php $__currentLoopData = $applicants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $applicantsView): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="background:<?php echo e($applicantsView->colorcode); ?>">
                        <div style="background:transparent;padding:2px 5px;border-radius:10px;color:#fff">
                            <?php echo e($applicantsView->add_interviewer_jobpositions_stepsCheck_steps_name); ?>

                            - <?php echo e($applicantsView->interviewstatusName); ?>

                            <br />
                            <?php echo e($applicantsView->jobpositionNameGet); ?>


                        </div>
                    </td>
                    <td>

                        <a class="label btn-warning" data-toggle="modal"
                            data-target="#modal-applicant-<?php echo e($applicantsView->careers_usersId); ?>"
                            href=""><?php echo e($applicantsView->careers_usersFname); ?>

                            <?php echo e($applicantsView->careers_usersLname); ?></a>
                        <div class="modal modal-primary fade" id="modal-applicant-<?php echo e($applicantsView->careers_usersId); ?>"
                            style="display: none;">
                            <div class="modal-dialog widthi">
                                <div class="modal-contents">
                                    <div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
									<ul class="nav nav-tabs">
									
											<li class="active"><a class="navcolor" data-toggle="tab" href="#home<?php echo e($applicantsView->careers_usersId); ?>">Applicant Details</a></li>
											<li><a class="navcolor" data-toggle="tab" href="#note<?php echo e($applicantsView->careers_usersId); ?>">Interviewer Notes</a></li>
											<li><a class="navcolor" data-toggle="tab" href="#question<?php echo e($applicantsView->careers_usersId); ?>">Interview Questions 1</a></li>
											<li><a class="navcolor" data-toggle="tab" href="#quiz<?php echo e($applicantsView->careers_usersId); ?>">Quiz</a></li>
										  </ul>

										  <div class="tab-content">
											<div id="home<?php echo e($applicantsView->careers_usersId); ?>" class="tab-pane fade in active">
											  

                                        <table class="table bg-transparent table-bordered">
                                            <tbody>
                                                <tr>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>City</th>
                                                    <th>State</th>
                                                    <th>Zip</th>
                                                    <th>Resume</th>
                                                    <th>Applicant Notes</th>
                                                </tr>
                                                <tr>
                                                    <td><?php echo e($applicantsView->careers_usersFname); ?></td>
                                                    <td><?php echo e($applicantsView->careers_usersLname); ?></td>
                                                    <td><?php echo e($applicantsView->careers_usersphone); ?></td>
                                                    <td><?php echo e($applicantsView->careers_usersemail); ?></td>
                                                    <td><?php echo e($applicantsView->careers_userscity); ?></td>
                                                    <td><?php echo e($applicantsView->careers_usersstate); ?></td>
                                                    <td><?php echo e($applicantsView->careers_userszipcode); ?></td>
                                                    <td>
                                                        <a class="text-white" target="_blank"
                                                            href="<?php echo e(url('careers_data')); ?>/<?php echo e($applicantsView->careers_usersresume); ?>">Download</a>
                                                    </td>
                                                    <td><?php echo e($applicantsView->careers_usersnote_for_interviewer); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
											</div>
											<div id="note<?php echo e($applicantsView->careers_usersId); ?>" class="tab-pane fade pt10">
											 <div class="col-md-6">
											 
											 <?php $__currentLoopData = $notes->where('applicant_id', $applicantsView->careers_usersId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												
													<div class='card border1'>
												<span><b><?php echo e($note->interviewer_fname); ?> <?php echo e($note->interviewer_lname); ?></b></span><br>
												<span><?php echo e($note->created_at); ?></span>
												<p class="font18"><?php echo e($note->descp); ?></p>
												</div>											
											 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											 
											 <p>Add a note using the form on the right →</p>
											 </div>
											 <div class="col-md-6">
											 <?php echo Form::open(['action' => 'ApplicantController@submitNotes','id'=>'form']); ?>

										<?php echo e(Form::token()); ?>

												
										<?php echo e(Form::hidden('careers_user', $applicantsView->careers_usersId, array('class' => 'form-control','required'=>'true',))); ?>

										
												<div class="col form-group">
													<label for="title">Title</label> <?php echo e(Form::text('title', '',array('class' => 'form-control','placeholder' => 'Title','required'=>'true'))); ?>


												</div>
												<div class="col form-group">
													<label for="title">Description</label> <?php echo e(Form::textarea('description', '',array('class' => 'form-control','placeholder' => 'Description','required'=>'true'))); ?>


												</div>

											<div class="col form-group">
												<?php echo e(Form::submit('Add Note',array('class' => 'btn btn-success'))); ?>

											</div>
										<?php echo Form::close(); ?>

											 </div>
											</div>
											<div id="question<?php echo e($applicantsView->careers_usersId); ?>" class="tab-pane fade">
											<?php echo Form::open(['action' => 'ApplicantController@scoreSave','id'=>'form']); ?>

										<?php echo e(Form::token()); ?>

										
										<?php echo e(Form::hidden('careers_user', $applicantsView->careers_usersId, array('class' => 'form-control'))); ?>

											  <table class="table bg-transparent table-bordered">
                                            <tbody>
											
                                                <tr>
                                                    <td style="width:25px">Q1.</td>
                                                    <td>"What do you understand about our company?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                            O candidato não apenas assistiu aos vídeos e leu todo o conteúdo na página de recrutamento, mas também analisou páginas adicionais em nosso site.
                                                        </li>
                                                        <li>
                                                            O candidato tem uma perspectiva muito clara sobre o que nossa empresa faz e sabe dos mercados em que atuamos.
                                                        </li>
                                                        <li>
                                                            O candidato é muito articulado ao descrever sua compreensão sobre nossa empresa.
                                                        </li>
                                                        <li>
                                                            O candidato está muito entusiasmado sobre a natureza dos produtos e serviços da empresa, bem como sobre a oportunidade de crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato apenas assistiu aos vídeos e leu o restante do conteúdo na página de recrutamento.
                                                        </li>
                                                        <li>
                                                            O candidato tem uma perspectiva clara sobre o que nossa empresa faz e sabe dos mercados em que atuamos.
                                                        </li>
                                                        <li>
                                                            O candidato é articulado ao descrever sua compreensão sobre nossa empresa.
                                                        </li>
                                                        <li>
                                                            O candidato está entusiasmado sobre a natureza dos produtos e serviços da empresa, bem como sobre a oportunidade de crescer em uma empresa como a nossa
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato apenas assistiu aos vídeos e leu o restante do conteúdo na página de recrutamento.
                                                        </li>
                                                        <li>
                                                           O candidato está um pouco confuso em relação ao que nossa empresa faz.
                                                        </li>
                                                        <li>
                                                           O candidato não é capaz de descrever seu entendimento sobre nossa empresa de maneira clara.
                                                        </li>
                                                        <li>
                                                           O candidato não está muito entusiasmado sobre a natureza dos produtos e serviços da empresa, e nem sobre a oportunidade de crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não assistiu aos vídeos da página de recrutamento, e nem leu o restante do conteúdo na página.
                                                        </li>
                                                        <li>
                                                           O candidato está muito confuso em relação ao que nossa empresa faz.
                                                        </li>
                                                        <li>
                                                           O candidato não é capaz de descrever seu entendimento sobre nossa empresa.
                                                        </li>
                                                        <li>
                                                           O candidato não está muito entusiasmado sobre a natureza dos produtos e serviços da empresa, e nem sobre a oportunidade de crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não gastou tempo algum na página de recrutamento e simplesmente agendou a entrevista sem se preparar.
                                                        </li>
                                                        <li>
                                                           O candidato está muito confuso em relação ao que nossa empresa faz.
                                                        </li>
                                                        <li>
                                                           O candidato não é capaz de descrever seu entendimento sobre nossa empresa.
                                                        </li>
                                                        <li>
                                                           O candidato não está nada entusiasmado com a natureza dos produtos e serviços da empresa, e nem com a oportunidade de crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo Form::radio($applicantsView->careers_usersId.'que1', '10',null); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que1">10</label> 
													<?php echo Form::radio($applicantsView->careers_usersId.'que1', '7',null); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que1">7</label> 
													<?php echo Form::radio($applicantsView->careers_usersId.'que1', '5',null); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que1">5</label>  
													<?php echo Form::radio($applicantsView->careers_usersId.'que1', '3',null); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que1">3</label> 
													<?php echo Form::radio($applicantsView->careers_usersId.'que1', '0',null); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que1">0</label> 
													</td>
                                                   
                                                </tr>
												<tr>
                                                    <td style="width:25px">Q2.</td>
                                                    <td>"What do you understand about the role you are applying for?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não apenas assistiu aos vídeos e leu todo o conteúdo na página de recrutamento, mas também analisou páginas adicionais em nosso site.
                                                        </li>
                                                        <li>
                                                           O candidato tem uma perspectiva muito clara sobre o cargo para qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato é muito articulado ao descrever sua compreensão sobre o cargo.
                                                        </li>
                                                        <li>
                                                           O candidato está muito entusiasmado com a possibilidade de ser capaz de ocupar o cargo em questão em nossa empresa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato apenas assistiu aos vídeos e leu o restante do conteúdo na página de recrutamento.
                                                        </li>
                                                        <li>
                                                           O candidato tem uma perspectiva clara sobre o cargo para qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato é articulado ao descrever sua compreensão sobre o cargo.
                                                        </li>
                                                        <li>
                                                           O candidato está entusiasmado com a possibilidade de ser capaz de ocupar o cargo em questão em nossa empresa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato apenas assistiu aos vídeos e leu o restante do conteúdo na página de recrutamento.
                                                        </li>
                                                        <li>
                                                           O candidato está um pouco confuso em relação ao cargo para qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato não consegue descrever com clareza o cargo para o qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato não está muito entusiasmado sobre o cargo ou sobre a oportunidade disponível para se crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não assistiu aos vídeos nem leu o restante do conteúdo na página de recrutamento.
                                                        </li>
                                                        <li>
                                                           O candidato está muito confuso em relação ao cargo para qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato não é capaz de descrever seu entendimento sobre o cargo disponível.
                                                        </li>
                                                        <li>
                                                           O candidato não está entusiasmado sobre o cargo ou sobre a oportunidade disponível para se crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não gastou tempo algum na página de recrutamento e simplesmente agendou a entrevista sem se preparar.
                                                        </li>
                                                        <li>
                                                           O candidato está 100% confuso em relação ao cargo para qual está se candidatando.
                                                        </li>
                                                        <li>
                                                           O candidato não é capaz de descrever seu entendimento sobre o cargo disponível.
                                                        </li>
                                                        <li>
                                                           O candidato não está nada entusiasmado sobre o cargo ou sobre a oportunidade disponível para se crescer em uma empresa como a nossa.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que2', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que2">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que2', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que2">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que2', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que2">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que2', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que2">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que2', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que2">0</label> 
													</td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td style="width:25px">Q3.</td>
                                                    <td>"How did you learn your sales skills?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato buscou e passou por um treinamento de vendas estruturado.  
                                                        </li>
                                                        <li>
                                                           O candidato demonstra uma tremenda profundidade de conhecimento sobre esse treinamento e utilizou esse treinamento no desenvolvimento de sistemas e processos de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato descreve como eles podem "consertar" facilmente um processo de vendas defeituoso por meio do treinamento que receberam.  
                                                        </li>
                                                        <li>
                                                           Na opinião dele, um processo estruturado de vendas é a única maneira de se vender algo eficientemente, utilizando roteiros ensaiados e modelos. 
                                                        </li>
                                                        <li>
                                                           O candidato acredita em testes constantes e monitoramento de métricas para a melhoria contínua.   
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato buscou e passou por um treinamento de vendas estruturado.  
                                                        </li>
                                                        <li>
                                                          O candidato demonstra algum conhecimento sobre esse treinamento e utilizou esse treinamento no desenvolvimento de sistemas e processos de vendas. 
                                                        </li>
                                                        <li>
                                                          O candidato entende é possível “consertar” um processo de vendas defeituoso através do sistema que estudou.  
                                                        </li>
                                                        <li>
                                                          O candidato entende que um processo de vendas estruturado é a maneira adequada de se realizar vendas, utilizando roteiros ensaiados e modelos.  
                                                        </li>
                                                        <li>
                                                          O candidato acredita nos conceitos de testes e monitoramento de métricas.   
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato tem algum treinamento formal de vendas, mas não via um sistema de vendas estruturado.  
                                                        </li>
                                                        <li>
                                                          O candidato demonstra pouco conhecimento sobre sistemas de vendas estruturados e não sabe trabalhar na construção de um processo de vendas estruturado.   
                                                        </li>
                                                        <li>
                                                          O candidato entende que um treinamento de vendas estruturado pode ser utilizado para “consertar” um processo de vendas defeituoso, mas não ele não sabe fazer isso. 
                                                        </li>
                                                        <li>
                                                          O candidato acredita que um processo de vendas estruturado é uma melhor forma de realizar vendas, mas nunca trabalhou com esse tipo de processo.  
                                                        </li>
                                                        <li>
                                                          Não necessariamente entende o conceito de testes e monitoramento.    
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não possui nenhum treinamento formal de vendas. 
                                                        </li>
                                                        <li>
                                                           O candidato demonstra pouco conhecimento sobre sistemas de vendas estruturados e não sabe trabalhar na construção de um processo de vendas estruturado.  
                                                        </li>
                                                        <li>
                                                           O candidato não necessariamente entende que um treinamento de vendas estruturado pode ser utilizado para “consertar” um processo de vendas defeituoso. 
                                                        </li>
                                                        <li>
                                                           O candidato acredita que um processo de vendas estruturado é uma melhor forma de realizar vendas, mas nunca trabalhou com esse tipo de processo.  
                                                        </li>
                                                        <li>
                                                           Não necessariamente entende o conceito de testes e monitoramento. 
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não possui nenhum treinamento formal de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato não tem conhecimento algum sobre sistemas de vendas estruturados e não sabe trabalhar na construção de um processo de vendas estruturado. 
                                                        </li>
                                                        <li>
                                                           O candidato não entende que um treinamento de vendas estruturado pode ser utilizado para “consertar” um processo de vendas defeituoso. 
                                                        </li>
                                                        <li>
                                                           O candidato não acredita que um processo de vendas estruturado é a melhor forma de realizar vendas.  
                                                        </li>
                                                        <li>
                                                           Não entende o conceito de testes e monitoramento.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que3', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que3">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que3', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que3">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que3', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que3">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que3', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que3">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que3', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que3">0</label> 
													</td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td style="width:25px">Q4.</td>
                                                    <td>"What part of the sales area do you like best?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato gosta de desenvolver relacionamentos, e também gosta do processo de "fechamento" de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato se sente atraído por atingir resultados frequentemente e se esforça para estar entre os melhores vendedores/gerentes da empresa.  
                                                        </li>
                                                        <li>
                                                           O candidato acredita que é de sua responsabilidade o aperfeiçoamento do processo de vendas, continuamente ajustando e testando o processo para obter melhorias constantes.  
                                                        </li>
                                                        <li>
                                                           O candidato é um estudante contínuo, consumindo todo o conteúdo ao qual conseguem ter acesso.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato gosta de desenvolver relacionamentos, e também gosta do processo de "fechamento" de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato se sente atraído por atingir resultados frequentemente e se esforça para estar entre os melhores vendedores/gerentes da empresa.  
                                                        </li>
                                                        <li>
                                                           O candidato entende que deve ter alguma responsabilidade sobre o aperfeiçoamento do processo de vendas, continuamente ajustando e testando o processo para obter melhorias constantes.  
                                                        </li>
                                                        <li>
                                                           O candidato é um estudante da área de vendas, consumindo o conteúdo que for recomendado para ele.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato entende que desenvolver relacionamentos é parte do trabalho de vendas e sabem que o fechamento é uma das funções do trabalho.  
                                                        </li>
                                                        <li>
                                                          Não esteve entre os melhores vendedores em empresas anteriores, mas se esforça para entregar resultados.  
                                                        </li>
                                                        <li>
                                                           O candidato entende que deve ter alguma responsabilidade sobre o aperfeiçoamento do processo de vendas, continuamente ajustando e testando o processo para obter melhorias constantes, mas nunca esteve envolvido nesse processo.  
                                                        </li>
                                                        <li>
                                                           O candidato é um estudante da área de vendas, consumindo o conteúdo que for recomendado para ele.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato entende que desenvolver relacionamentos é parte do trabalho, e sabe que o fechamento de vendas é uma função do trabalho mas não gosta dessa parte.  
                                                        </li>
                                                        <li>
                                                           Não esteve entre os melhores vendedores em empresas anteriores, mas se esforça para atingir as metas.
                                                        </li>
                                                        <li>
                                                           O candidato acredita que é o trabalho da gerência aperfeiçoar o processo de vendas, e que a gerência também é responsável por continuamente ajustar e testar o processo para obter melhorias constantes.  
                                                        </li>
                                                        <li>
                                                           O candidato é um estudante da área de vendas, consumindo o conteúdo que for recomendado para ele.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato entende que desenvolver relacionamentos é parte do trabalho, e sabe que o fechamento de vendas é uma função do trabalho mas não gosta dessa parte.
                                                        </li>
                                                        <li>
                                                          Não esteve entre os melhores vendedores em empresas anteriores, mas se esforça para atingir as metas. 
                                                        </li>
                                                        <li>
                                                          O candidato acredita que é o trabalho da gerência aperfeiçoar o processo de vendas, e que a gerência também é responsável por continuamente ajustar e testar o processo para obter melhorias constantes.  
                                                        </li>
                                                        <li>
                                                          O candidato não estuda nada relacionado à área de vendas.  
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que4', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que4">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que4', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que4">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que4', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que4">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que4', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que4">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que4', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que4">0</label> 
													</td>
                                                   
                                                </tr>
												
												<tr>
                                                    <td style="width:25px">Q5.</td>
                                                    <td>"What part of the sales process do you like least?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato é um profissional de vendas e percebe que todas as partes da área de vendas são elementos de um sistema maior. 
                                                        </li>
                                                        <li>
                                                           Não existe nenhuma parte do processo de vendas que ele não goste, ele entende genuinamente que a soma de todas as partes cria um ambiente de vendas eficiente.  
                                                        </li>
                                                        <li>
                                                           Ele gosta de participar de qualquer atividade relacionada à área de vendas.  
                                                        </li>
                                                        <li>
                                                           Tem orgulho de fazer parte da “comunidade de vendas” e se enxerga em uma carreira de longo prazo nessa área.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato é um profissional de vendas e percebe que todas as partes da área de vendas são elementos de um sistema maior.
                                                        </li>
                                                        <li>
                                                           Existem algumas partes da área de vendas que não são as “favoritas” do candidato, mas ele genuinamente entende que a soma de todas as partes cria um ambiente de vendas eficiente.  
                                                        </li>
                                                        <li>
                                                           Ele gosta de participar de qualquer atividade relacionada à área de vendas.  
                                                        </li>
                                                        <li>
                                                           Tem orgulho de fazer parte da “comunidade de vendas” e se enxerga em uma carreira de longo prazo nessa área.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato está tentando trabalhar na área de vendas, mas existem diversas partes dessa profissão que fazem com que ele se sinta desconfortável. 
                                                        </li>
                                                        <li>
                                                           Espera que a empresa forneça os contatos qualificados, e não acredita em ligações frias.  
                                                        </li>
                                                        <li>
                                                           Fica confortável em participar da maioria das atividades relacionadas à área de vendas. 
                                                        </li>
                                                        <li>
                                                           Não tem muito orgulho de fazer parte da “comunidade de vendas” e não necessariamente se enxerga em uma carreira de longo prazo nessa área.
                                                        </li>
                                                        
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato está tentando trabalhar na área de vendas, mas existem diversas partes dessa profissão que fazem com que ele se sinta desconfortável.  
                                                        </li>
                                                        <li>
                                                          Espera que a empresa forneça os contatos qualificados, e não acredita em ligações frias.  
                                                        </li>
                                                        <li>
                                                          Fica confortável em participar de algumas atividades relacionadas à área de vendas.  
                                                        </li>
                                                        <li>
                                                          Não necessariamente tem orgulho de fazer parte da “comunidade de vendas” e não necessariamente se enxerga em uma carreira de longo prazo nessa área.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato está tentando trabalhar na área de vendas, mas existem diversas partes dessa profissão que fazem com que ele se sinta desconfortável.  
                                                        </li>
                                                        <li>
                                                          Espera que a empresa forneça os contatos qualificados, e não acredita em ligações frias.  
                                                        </li>
                                                        <li>
                                                          Não fica necessariamente confortável em participar de diversas atividades importantes relacionadas à área de vendas. 
                                                        </li>
                                                        <li>
                                                          Não tem orgulho de fazer parte da “comunidade de vendas” e não necessariamente se enxerga em uma carreira de longo prazo nessa área.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que5', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que5">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que5', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que5">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que5', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que5">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que5', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que5">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que5', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que5">0</label> 
													</td>
                                                   
                                                </tr>
												<tr>
                                                    <td style="width:25px">Q6.</td>
                                                    <td>"How do you feel about giving presentations over the phone or the internet?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato acredita que o telefone e a internet são ferramentas essenciais para se realizar vendas de forma eficiente aos clientes.   
                                                        </li>
                                                        <li>
                                                           Gosta de tecnologia e utiliza da maneira que pode para automatizar procedimentos ou fazer um sistema de vendas mais eficiente e eficaz.  
                                                        </li>
                                                        <li>
                                                           O candidato entende que o telefone e a internet permitem que ele economize uma quantia enorme de tempo. 
                                                        </li>
                                                        <li>
                                                           O candidatou já gastou centenas ou milhares de horas no telefone e aperfeiçoou sua habilidade de apresentação de roteiros.  
                                                        </li>
                                                        <li>
                                                          O candidato teve experiência com múltiplas estratégias de vendas com base na internet e desenvolveu diversas formas criativas de se usar a web.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato acredita que o telefone e a internet são ferramentas essenciais para se realizar vendas de forma eficiente aos clientes.  
                                                        </li>
                                                        <li>
                                                           Utiliza a tecnologia quando solicitado, gosta das formas de automação de procedimentos, e sabe que a tecnologia pode aumentar a eficiência e eficácia de um sistema de venda. 
                                                        </li>
                                                        <li>
                                                           O candidato entende que o telefone e a internet permitem que ele economize uma quantia enorme de tempo. 
                                                        </li>
                                                        <li>
                                                           O candidatou já gastou muitas horas no telefone, e trabalhou para aperfeiçoar sua habilidade de apresentação de roteiros de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato teve experiência com múltiplas estratégias de vendas com base na internet.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato vê o telefone e a internet como ferramentas que pedirão para ele utilizar para realizar vendas.  
                                                        </li>
                                                        <li>
                                                           Utiliza a tecnologia quando solicitado.  
                                                        </li>
                                                        <li>
                                                           O candidato entende que o telefone e a internet permitem que ele economize uma quantia enorme de tempo, mas não tem muita experiência com nenhuma das duas ferramentas. 
                                                        </li>
                                                        <li>
                                                           Não gastou muitas horas no telefone e não possui um sistema muito bom para testar seus roteiros de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato não utilizou muitas estratégias de vendas com base na internet.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato vê o telefone e a internet como um mal necessário para se realizar vendas.  
                                                        </li>
                                                        <li>
                                                           Prefere fazer vendas pessoalmente do que utilizando a tecnologia. 
                                                        </li>
                                                        <li>
                                                           Não acredita que o telefone e a internet melhoram a eficiência do processo de vendas. 
                                                        </li>
                                                        <li>
                                                           O candidato não gastou muitas horas no telefone e não tem um sistema muito bom para testar seus roteiros de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato não utilizou muitas estratégias de vendas com base na internet
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                          O candidato vê o telefone e a internet como um mal necessário para se realizar vendas, e não está disposto a utilizar essas ferramentas. 
                                                        </li>
                                                        <li>
                                                          Prefere fazer vendas pessoalmente do que utilizando a tecnologia.  
                                                        </li>
                                                        <li>
                                                          Não acredita que o telefone e a internet melhoram a eficiência do processo de vendas.  
                                                        </li>
                                                        <li>
                                                          O candidato não gastou muitas horas no telefone e não tem um sistema muito bom para testar seus roteiros de vendas.  
                                                        </li>
                                                        <li>
                                                          O candidato não utilizou muitas estratégias de vendas com base na internet, e não está disposto a utilizar esse tipo de estratégia.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que6', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que6">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que6', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que6">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que6', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que6">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que6', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que6">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que6', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que6">0</label> 
													</td>
                                                   
                                                </tr>
												<tr>
                                                    <td style="width:25px">Q7.</td>
                                                    <td>"How do you feel about prospecting?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não apenas gosta de prospecção, mas também criou diversos sistemas de prospecção ao longo dos anos. 
                                                        </li>
                                                        <li>
                                                           O candidato enxerga a prospecção como um pilar de uma carreira de vendas bem-sucedida e está constantemente identificando diferentes métodos e canais de prospecção.  
                                                        </li>
                                                        <li>
                                                           O candidato sabe múltiplas formas de utilizar a tecnologia para realizar a prospecção.  
                                                        </li>
                                                        <li>
                                                           O candidato é um inovador e está constantemente buscando novas formas de criar diferentes métodos de inovar na área de prospecção.  
                                                        </li>
                                                        <li>
                                                           O candidato continuamente define metas de prospecção, e geralmente supera essas metas.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato gosta de realizar prospecção, e criou alguns sistemas de prospecção ao longo dos anos.  
                                                        </li>
                                                        <li>
                                                           O candidato enxerga a prospecção como uma parte importante de uma carreira de vendas bem-sucedida e ocasionalmente identifica diferentes métodos e canais de prospecção.  
                                                        </li>
                                                        <li>
                                                           O candidato parece utilizar a tecnologia quando disponível para prospectar.
                                                        </li>
                                                        <li>
                                                           O candidato é um inovador e frequentemente busca novas formas de criar diferentes métodos de inovar na área de prospecção. 
                                                        </li>
                                                        <li>
                                                           O candidato define metas de prospecção e muitas vezes consegue superar essas metas.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato entende que a prospecção faz parte das vendas e faz o que é necessário.     
                                                        </li>
                                                        <li>
                                                           Enxerga a prospecção como uma parte do processo de vendas.  
                                                        </li>
                                                        <li>
                                                           O candidato segue métodos de rotina da prospecção e não busca inovar com ou sem a tecnologia.  
                                                        </li>
                                                        <li>
                                                          O candidato não define metas de prospecção para ele mesmo. 
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato entende que a prospecção faz parte das vendas e faz o que é necessário.   
                                                        </li>
                                                        <li>
                                                          Enxerga a prospecção como uma parte do processo de vendas, mas acredita que a empresa deveria fornecer todos os contatos qualificados para os vendedores.  
                                                        </li>
                                                        <li>
                                                          O candidato segue métodos de rotina da prospecção e não busca inovar com ou sem a tecnologia.  
                                                        </li>
                                                        <li>
                                                          O candidato não define metas de prospecção para ele mesmo.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato entende que a prospecção faz parte das vendas, mas acredita que a empresa deveria marcar compromissos qualificados para os vendedores.  
                                                        </li>
                                                        <li>
                                                           Não acredita que a prospecção deveria ser uma tarefa de responsabilidade do vendedor.  
                                                        </li>
                                                        <li>
                                                           Não segue qualquer método de prospecção já que não acredita que seja sua responsabilidade.  
                                                        </li>
                                                        <li>
                                                           O candidato não define metas de prospecção para ele mesmo.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que7', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que7">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que7', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que7">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que7', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que7">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que7', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que7">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que7', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que7">0</label> 
													</td>
                                                   
                                                </tr>
												<tr>
                                                    <td style="width:25px">Q8.</td>
                                                    <td>"What made you become what you are today?" <span class="couponcode"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip">
                                        <table class="table bg-transparent table-bordered"><b>Score</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    10
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato tem uma clara definição de “si mesmo” e pode facilmente comunicar o que o transformou no adulto e profissional que é hoje. 
                                                        </li>
                                                        <li>
                                                           O candidato é comunicativo, e sabe conversar bem para comunicar o que deseja.  
                                                        </li>
                                                        <li>
                                                           O candidato demonstra uma tremenda autoconfiança quando se refere ao que o moldou e tem bastante orgulho disso.  
                                                        </li>
                                                        <li>
                                                           O candidato entende a importância dos eventos que ocorreram em seu passado para sua formação em geral como adulto. 
                                                        </li>
                                                        <li>
                                                           O candidato foi  extremamente franco e honesto ao compartilhar sua história.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    7
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato tem uma clara definição de “si mesmo” e pode facilmente comunicar o que o transformou no adulto e profissional que é hoje.  
                                                        </li>
                                                        <li>
                                                           O candidato é comunicativo, e sabe conversar bem para comunicar o que deseja.
                                                        </li>
                                                        <li>
                                                           O candidato demonstrou autoconfiança ao se referir ao que o moldou e tem orgulho disso.  
                                                        </li>
                                                        <li>
                                                           O candidato entende a importância dos eventos que ocorreram em seu passado para sua formação em geral como adulto.  
                                                        </li>
                                                        <li>
                                                           O candidato foi honesto ao compartilhar sua história.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    5
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não parece ter uma clara definição de “si mesmo” e teve dificuldade em comunicar o que o transformou no que ele é hoje.  
                                                        </li>
                                                        <li>
                                                           O candidato não foi muito comunicativo, e não soube conversar bem para comunicar o que queria.  
                                                        </li>
                                                        <li>
                                                           O candidato não demonstrou autoconfiança ao se referir ao que o moldou. 
                                                        </li>
                                                        <li>
                                                           O candidato entende a importância dos eventos que ocorreram em seu passado para sua formação em geral como adulto, mas não soube comunicar isso claramente.  
                                                        </li>
                                                        <li>
                                                           O candidato teve dificuldade com essa pergunta.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    3
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não parece ter uma clara definição de “si mesmo” e teve dificuldade em comunicar o que o transformou no que ele é hoje.  
                                                        </li>
                                                        <li>
                                                           O candidato não foi muito comunicativo, e não soube conversar bem para comunicar o que queria.  
                                                        </li>
                                                        <li>
                                                           O candidato não demonstrou autoconfiança ao se referir ao que o moldou. 
                                                        </li>
                                                        <li>
                                                           O candidato não necessariamente entende a importância dos eventos na infância e no passado para formação de quem somos como adultos. 
                                                        </li>
                                                        <li>
                                                           O candidato teve dificuldade com a pergunta e não entendeu a relevância dela.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:3px">
                                                    0
                                                </td>
                                                <td style="padding:3px">
                                                    <ul>
                                                        <li>
                                                           O candidato não parece ter uma clara definição de “si mesmo” e teve dificuldade em comunicar o que o transformou no que ele é hoje.  
                                                        </li>
                                                        <li>
                                                           O candidato não foi muito comunicativo, e não soube conversar bem para comunicar o que queria.   
                                                        </li>
                                                        <li>
                                                           O candidato não demonstrou autoconfiança ao se referir ao que o moldou. 
                                                        </li>
                                                        <li>
                                                           O candidato não necessariamente entende a importância dos eventos na infância e no passado para formação de quem somos como adultos.  
                                                        </li>
                                                        <li>
                                                           O candidato teve dificuldade com essa pergunta e não entendeu a relevância dela.
                                                        </li>
                                                    </ul>
                                                    
                                                </td>
                                            </tr>
                                          
                                        </table>
                                        </span>
                                        </span><br>
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que8', '10',false, array('class' => 'form-control','required'=>'true',))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que8">10</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que8', '7',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que8">7</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que8', '5',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que8">5</label>  
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que8', '3',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que8">3</label> 
													<?php echo e(Form::radio($applicantsView->careers_usersId.'que8', '0',false, array('class' => 'form-control'))); ?> <label class="pr5" for="<?php echo e($applicantsView->careers_usersId); ?>que8">0</label> 
													</td>
                                                   
                                                </tr>
												
												<tr>
												<td></td>
												<td>
												<?php echo e(Form::submit('Save',array('class' => 'btn btn-success'))); ?>

											</td>
												</tr>
												
												
                                            </tbody>
                                        </table>
										
										<?php echo Form::close(); ?>

											</div>
											<div id="quiz<?php echo e($applicantsView->careers_usersId); ?>" class="tab-pane fade">
												<?php $__currentLoopData = $scores->where('applicant', $applicantsView->careers_usersId); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $score): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php
										   $s = $score->score;
                                           $s = explode( ',', $s );
                                           
                                           for($i=0; $i<sizeof($s); $i++)
                                           {
                                              echo "<script>". '$("input[name='.$applicantsView->careers_usersId.'que'.($i+1).'][value='.$s[$i].']").attr("checked", "checked")'."</script>";
                                           }
										   ?>
										   											
											<?php if($score->int_ques1 == ''): ?>
											  <h3>Not Answered Yet!</h3>
										  <?php else: ?>
											
											  <table class="table bg-transparent table-bordered">
					    <h3>Questionário</h3>
							
							<tr>
							    <td>
							        Q.1 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Como você se descreveria em apenas uma palavra?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques1); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.2 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Como essa posição se compara em relação às outras para que você também se candidatou?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques2); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.3 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Quais são os principais três pontos fortes e três pontos fracos sobre você?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques3); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.4 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Por que você quer trabalhar na Neovora?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques4); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.5 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Além dos benefícios padrão, quais benefícios uma empresa deveria oferecer aos seus empregados na sua opinião?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques5); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.6 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Por que você deseja deixar o seu trabalho atual?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques6); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.7 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Do que você mais se orgulha em sua carreira?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques7); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.8 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Com que tipo de chefe e colegas de trabalho você teve mais e menos sucesso e por quê?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques8); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.9 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Você já foi pedido para comprometer sua integridade por algum supervisor ou colega de trabalho? Caso sim, conte mais sobre o que aconteceu..”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques9); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.10 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Você pode nos dar algum motivo para que alguém não goste de trabalhar com você?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques10); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.11 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Qual uma situação difícil que você conseguiu reverter em sua carreira? Descreva a situação para nós. ”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques11); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.12 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Qual sua definição de sucesso?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques12); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.13 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Qual deveria ser o salário mínimo nacional em sua opinião?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques13); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.14 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Quantos dias de faltas justificadas por doença você acha que devem ser concedidos aos funcionários?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques14); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.15 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Com que frequência os funcionários da área de vendas devem ganhar aumentos salariais?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                  <?php echo e($score->int_ques15); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.16 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Em um ambiente criativo como a Neovora, como você imagina que seja o tipo de roupa utilizado pelos funcionários?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques16); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.17 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Você acha que devemos utilizar “advertências” antes de publicar conteúdo para os clientes ou conteúdo interno que possa ser considerado polêmico?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques17); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.18 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Se você fosse o dono da empresa e descobrisse que um cliente que gera muita receita está operando de maneira antiética, como você lidaria com a situação?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                  <?php echo e($score->int_ques18); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.19
							    </td>
							    <td>
							        <b style="padding-right:10px">“Em sua opinião, qual a melhor maneira de se comunicar com os clientes?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques19); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.20 
							    </td>
							    <td>
							        <b style="padding-right:10px">“O que você mais gosta de fazer em seu tempo livre?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques20); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.21 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Como você reage quando suas ideias não são acolhidas pela sua equipe?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques21); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.22
							    </td>
							    <td>
							        <b style="padding-right:10px">“O que você faz se um colega de trabalho apresenta uma ideia, e essa ideia é horrível?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                     <?php echo e($score->int_ques22); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.23 
							    </td>
							    <td>
							        <b style="padding-right:10px">“Quem você considera como um modelo para sua vida e por quê?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques23); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.24 
							    </td>
							    <td>
							        <b style="padding-right:10px">“O que é mais importante, conhecimento teórico ou conhecimento prático? E por quê?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
                                                    <?php echo e($score->int_ques24); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
							<tr>
							    <td>
							        Q.25 
							    </td>
							    <td>
							        <b style="padding-right:10px">“O que você acha do ambiente atual nas universidades em relação à força de trabalho do futuro?”</b><span class="couponcode1"><i class="fa fa-info-circle"></i>
							        <span class="coupontooltip1">
                                        <table><b>Resposta</b>
                                            <tr>
                                                <td style="padding:3px">
												<?php echo e($score->int_ques25); ?>

                                                </td>
                                            
                                            </tr>
                                        </table>
                                    </span>
                                </span>
                            </td>
                        </tr>
					</table>
					 <?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
											</div>
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
                    <td><?php echo e($applicantsView->city); ?></td>
                    <?php
                    $stepsTime1 = $applicantsView->time_on_steps_page;
                    $stepsTime2 = substr($stepsTime1, 0, strpos($stepsTime1, '.'));

                    $stepsTime3 = explode(':', $stepsTime1);
                    $stepsTime3 = end($stepsTime3);

                    if(strlen((string)$stepsTime3) == 1){
                    $time_step = $stepsTime3.'';
                    }
                    else{
                    $time_step = $stepsTime3;
                    }

                    ?>
                    <td><?php echo e($applicantsView->time_on_steps_page); ?>s</td>

                    <?php
                    $stepsTime1 = $applicantsView->time_on_survey_page;
                    $stepsTime2 = substr($stepsTime1, 0, strpos($stepsTime1, '.'));

                    $stepsTime3 = explode(':', $stepsTime1);
                    $stepsTime3 = end($stepsTime3);

                    if(strlen((string)$stepsTime3) == 1){
                    $time_step = $stepsTime3.'';
                    }
                    else{
                    $time_step = $stepsTime3;
                    }

                    ?>
                    <td><?php echo e($applicantsView->time_on_survey_page); ?>s</td>
                    <td>
                        <?php
                        echo "Total: " . ($applicantsView->careers_userssurvey_questions_correct +
                        $applicantsView->careers_userssurvey_questions_wrong);

                        ?>
                        <br />

                        Correct: <?php echo e($applicantsView->careers_userssurvey_questions_correct); ?>, Wrong:
                        <?php echo e($applicantsView->careers_userssurvey_questions_wrong); ?> </td>

                    <td>
                        <a class="label btn-warning" data-toggle="modal"
                            data-target="#modal-interviewer-<?php echo e($applicantsView->careers_usersId); ?>"
                            href=""><?php echo e($applicantsView->employeeFname); ?> <?php echo e($applicantsView->employeeNname); ?></a>
                        <div class="modal modal-primary fade"
                            id="modal-interviewer-<?php echo e($applicantsView->careers_usersId); ?>" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Change Interviewer</h4>

                                        <h5>Available interviewers</h5>

                                        <?php echo Form::open(['action' =>
                                        ['interviews@changeInterviewer',$applicantsView->careers_usersId],'files'=>'true']); ?>

                                        <?php echo e(Form::token()); ?>

                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <?php echo e(Form::select('interviewer',$addinterviewerArray, NULL, array('class'=>'form-control','id'=>'jobposition'))); ?>

                                                </div>
                                                <p>*You can select any interviewer that has free schedule. It doesn't
                                                    need for the interviewer to have the selected position in his
                                                    settings. This way you can override the auto assignment.</p>
                                                <div class="form-group d-flex">
                                                    <?php echo e(Form::submit('Assign',array('class' => 'btn btn-success'))); ?>

                                                </div>
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


                    <td><?php echo e($applicantsView->day); ?> <?php echo e($applicantsView->interview_date); ?> at
                        <?php echo e($applicantsView->careers_usersInterview_time_select); ?>:00</td>
                    <td>
                        <a style="background:<?php echo e($applicantsView->colorcode); ?>" class="label btn-warning"
                            data-toggle="modal" data-target="#modal-status-<?php echo e($applicantsView->careers_usersId); ?>"
                            href=""><?php echo e($applicantsView->interviewstatusName); ?> </a>
                        <div class="modal modal-primary fade" id="modal-status-<?php echo e($applicantsView->careers_usersId); ?>"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Change Status</h4>

                                        <h5>Status</h5>
                                        <?php echo Form::open(['action' =>
                                        ['interviews@changeStatus',$applicantsView->careers_usersId],'files'=>'true']); ?>

                                        <?php echo e(Form::token()); ?>

                                        <div class="box-body">
                                            <div class="row">
                                                <div class="form-group">
                                                    <?php echo e(Form::select('status',$interviewStatusArray, NULL, array('class'=>'form-control','id'=>'jobposition'))); ?>

                                                </div>
                                                <p>Note From Interviewer : </p>
                                                <p>*Will appear in emails only if filled in</p>
                                                <p>**Will be preceded in emails by the header : "Note From Interviewer:"
                                                </p>

                                                <div class="form-group">
                                                    <?php echo e(Form::textarea('city', '',array('class' => 'form-control','placeholder'
                                                                    => ''))); ?>

                                                </div>



                                                <div class="form-group d-flex">
                                                    <?php echo e(Form::submit('Save',array('class' => 'btn btn-success'))); ?>

                                                </div>
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

                        <a class="label btn-warning" data-toggle="modal"
                            data-target="#modal-reschedule-<?php echo e($applicantsView->careers_usersId); ?>" href="">Reschedule</a>
                        <div class="modal modal-primary fade"
                            id="modal-reschedule-<?php echo e($applicantsView->careers_usersId); ?>" style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Reschedule Interview</h4>
                                        <p></p>
                                        <a target="_blank"
                                            href="<?php echo e(url('interviews/view')); ?>/<?php echo e($applicantsView->careers_usersId); ?>/<?php echo e($jobposition); ?>/<?php echo e($status); ?>/<?php echo e($applicantsView->careers_usersemployee_id); ?>/<?php echo e($from_date); ?>/<?php echo e($to_date); ?>/reschedule">
                                            <button class="btn btn-warning">Select Date</button>
                                        </a>
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
                        <a class="label label-danger" data-toggle="modal"
                            data-target="#modal-delete-<?php echo e($applicantsView->careers_usersId); ?>">Delete</a>




                        <div class="modal modal-primary fade" id="modal-delete-<?php echo e($applicantsView->careers_usersId); ?>"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Delete Applicant</h4>
                                        <p></p>
                                        <a target=""
                                            href="<?php echo e(url('interviews/view/delete')); ?>/<?php echo e($applicantsView->careers_usersId); ?>">
                                            <button class="btn btn-warning">Delete</button>
                                        </a>
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
                        <a class="label label-success" data-toggle="modal"
                            data-target="#modal-mail-<?php echo e($applicantsView->careers_usersId); ?>">Send</a>
               
                        <div class="modal modal-success fade" id="modal-mail-<?php echo e($applicantsView->careers_usersId); ?>"
                            style="display: none;">
                            <div class="modal-dialog">
                                <div class="modal-contents">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span></button>
                                        <h4 class="modal-title">Send Email of <?php echo e($applicantsView->interviewstatusName); ?>

                                            Status</h4>
                                        <p></p>
                                        <a
                                            href="<?php echo e(url('interviews/send/email')); ?>/<?php echo e($applicantsView->careers_usersId); ?>">
                                            <button class="btn btn-warning">Send</button>
                                        </a>
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

    </div>
</div>

<script>
    $(document).ready(function () {

        $('select[name="jobposition"]').on('change', function () {
            var jobpositionid = $(this).val();
            if (jobpositionid) {
                $.ajax({
                    url: "<?php echo e(url('jobposition/interviewer/get')); ?>" + '/' + jobpositionid,
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
                            // console.log(i);
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

    $('select[name="jobposition"]').prepend('<option value="" selected>Any Job Position</option>');
    $('select[name="status"]').prepend('<option value="any" selected>Any Status</option>');
    $('select[name="interviewer"]').prepend('<option value="any">Any Interviewer</option>');

</script>



<script>
    $(document).ready(function() {
           $('select[name="jobposition"]').on('change', function(){
                   var jobpositionid = $(this).val();
                   if(jobpositionid) {
                       $.ajax({
                           url: "<?php echo e(url('interviewer/get')); ?>" + '/' + jobpositionid,
                           type:"GET",
                           dataType:"json",
                            success:function(data) {
    
                            $('select[name="interviewer"]').empty();
                            $('select[name="interviewer"]').prepend('<option value="any">Any Interviewer</option>');
                            // $('select[name="interviewer"]').prepend('<option>Select Interviewer</option>');
                            
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