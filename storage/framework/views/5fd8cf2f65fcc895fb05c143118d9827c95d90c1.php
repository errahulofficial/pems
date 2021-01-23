<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="<?php echo e(url('assets/css/calander.css')); ?>">

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style>
    .ui-state-highlight::after {
    content: "*";
    color: white;
  margin-left:2px
}
td[data-handler="selectDay"] {
    /* background: #00a1ff; */
}
td[data-handler="selectDay"]>.ui-state-default {
    background: #00a1ff !important;
    font-weight: bold;
    color: white !important;
}
td[data-handler="selectDay"]>.ui-state-highlight {
    background: #00a1ff !important;
    color: white !important;
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
</style>
<?php if($applicant->job_position_step % 2 == 0 && $score->int_ques1 == "" && $score->int_ques2 == ""): ?>
	<style>
	.step2{
		display: none;
	}
</style>
<div class="col-md-9 m-auto step1" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Questionário</h3>
        </div>

<?php echo Form::open(['action' => 'ApplicantController@scoreupdate','id'=>'form']); ?> <?php echo e(Form::token()); ?>

        <div class="box-body">
            <div class="row ">

                <div class="col-md-12 form-group">
                    <label for="First Name">Q.1  “Como você se descreveria em apenas uma palavra?”</label> <?php echo e(Form::textarea('que1', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.2  “Como essa posição se compara em relação às outras para que você também se candidatou?”</label> <?php echo e(Form::textarea('que2', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.3  “Quais são os principais três pontos fortes e três pontos fracos sobre você?”</label> <?php echo e(Form::textarea('que3', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.4  “Por que você quer trabalhar na Neovora?”</label> <?php echo e(Form::textarea('que4', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.5  “Além dos benefícios padrão, quais benefícios uma empresa deveria oferecer aos seus empregados na sua opinião?”</label> <?php echo e(Form::textarea('que5', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.6  “Por que você deseja deixar o seu trabalho atual?”</label> <?php echo e(Form::textarea('que6', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.7  “Do que você mais se orgulha em sua carreira?”</label> <?php echo e(Form::textarea('que7', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.8  “Com que tipo de chefe e colegas de trabalho você teve mais e menos sucesso e por quê?”</label> <?php echo e(Form::textarea('que8', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.9  “Você já foi pedido para comprometer sua integridade por algum supervisor ou colega de trabalho? Caso sim, conte mais sobre o que aconteceu..”</label> <?php echo e(Form::textarea('que9', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.10  “Você pode nos dar algum motivo para que alguém não goste de trabalhar com você?”</label> <?php echo e(Form::textarea('que10', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.11  “Qual uma situação difícil que você conseguiu reverter em sua carreira? Descreva a situação para nós. ”</label> <?php echo e(Form::textarea('que11', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.12  “Qual sua definição de sucesso?”</label> <?php echo e(Form::textarea('que12', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.13  “Qual deveria ser o salário mínimo nacional em sua opinião?”</label> <?php echo e(Form::textarea('que13', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.14  “Quantos dias de faltas justificadas por doença você acha que devem ser concedidos aos funcionários?”</label> <?php echo e(Form::textarea('que14', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.15  “Com que frequência os funcionários da área de vendas devem ganhar aumentos salariais?”</label> <?php echo e(Form::textarea('que15', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.16  “Em um ambiente criativo como a Neovora, como você imagina que seja o tipo de roupa utilizado pelos funcionários?”</label> <?php echo e(Form::textarea('que16', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.17  “Você acha que devemos utilizar “advertências” antes de publicar conteúdo para os clientes ou conteúdo interno que possa ser considerado polêmico?”</label> <?php echo e(Form::textarea('que17', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.18  “Se você fosse o dono da empresa e descobrisse que um cliente que gera muita receita está operando de maneira antiética, como você lidaria com a situação?”</label> <?php echo e(Form::textarea('que18', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.19  “Em sua opinião, qual a melhor maneira de se comunicar com os clientes?”</label> <?php echo e(Form::textarea('que19', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.20  “O que você mais gosta de fazer em seu tempo livre?”</label> <?php echo e(Form::textarea('que20', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.21  “Como você reage quando suas ideias não são acolhidas pela sua equipe?”</label> <?php echo e(Form::textarea('que21', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.22  “O que você faz se um colega de trabalho apresenta uma ideia, e essa ideia é horrível?”</label> <?php echo e(Form::textarea('que22', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.23  “Quem você considera como um modelo para sua vida e por quê?”</label> <?php echo e(Form::textarea('que23', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.24  “O que é mais importante, conhecimento teórico ou conhecimento prático? E por quê?”</label> <?php echo e(Form::textarea('que24', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				<div class="col-md-12 form-group">
                    <label for="First Name">Q.25  “O que você acha do ambiente atual nas universidades em relação à força de trabalho do futuro?”</label> <?php echo e(Form::textarea('que25', '',array('class'
                    => 'form-control','placeholder' => 'Answer above Question', 'rows' => 1,'required'=>'true'))); ?>

                </div>
				
				
				 <div class="col-md-12 form-group">
                    <?php echo e(Form::submit('Submit Test',array('class' => 'btn btn-success'))); ?>

                   
                </div>
            </div>
        </div>
        <?php echo Form::close(); ?>

  </div>
        </div>
		
		<?php else: ?> 
			
		<style>
	.step1{
		display: none;
	}
</style>
	
<?php endif; ?>
<div class="col-md-8 m-auto step2" style="margin:auto;float:none">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Schedule Your Interview</h3>
        </div>
        <div class="row">
            <div class="box-body">
                <input type="text" id="datepicker2" />
                <div class="col-md-12">
                    <p>Select Date for Interview</p>
                    <div id="date-data-destination">
                        <div class="datebox-off">
                        </div>
                    </div>
                </div>

<script>
$(document).ready(function(){
var weekday=new Array(7);
weekday[0]="monday";
weekday[1]="tuesday";
weekday[2]="wednesday";
weekday[3]="thursday";
weekday[4]="friday";
weekday[5]="saturday";
weekday[6]="sunday";
$("#datepicker2").datepicker({
        dateFormat: "dd-mm-yy",
        minDate: 0,
        onSelect: function (dateText, inst) {
            var date = $(this).datepicker('getDate');
            window.open('<?php echo url('careers/schedule-interview'.'/'.$id.'/'.$random_token.'/'.$s_token); ?>' + '/date/' + this.value +'/'+ weekday[date.getUTCDay()], "_self");
        }
    });
});
$(document).ready(function () {
    $input = $("#datepicker2");
    $input.datepicker({
        format: 'dd MM yyyy',
        minDate: 0
    });
    $input.data('datepicker').hide = function () {};
    $input.datepicker('show');
    $("#ui-datepicker-div").wrap("<div id='date-data'></div>");
});
$(document).ready(function () {
    $("#date-data").appendTo("#date-data-destination");
});
</script>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('careers_views/master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>