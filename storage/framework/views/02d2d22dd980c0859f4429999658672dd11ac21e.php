<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>PEMS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/dist/css/skins/skin-blue.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/plugins/iCheck/square/blue.css')); ?>">
    <link rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    
    <body class="hold-transition login-page">

  <section class="content container-fluid">
    <?php echo $__env->yieldContent('content'); ?>
  </section>


<script src="<?php echo e(url('theme/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/bower_components/bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/dist/js/adminlte.min.js')); ?>"></script>
<script src="<?php echo e(url('theme/plugins/iCheck/icheck.min.js')); ?>"></script>
<script>
$(function () {
$('input').iCheck({
checkboxClass: 'icheckbox_square-blue',
radioClass: 'iradio_square-blue',
increaseArea: '20%' /* optional */
});
});
</script>
</body>
</html>