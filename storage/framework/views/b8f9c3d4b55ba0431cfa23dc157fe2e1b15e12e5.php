<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CAREERS</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/bootstrap/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/font-awesome/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/bower_components/Ionicons/css/ionicons.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/dist/css/AdminLTE.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/dist/css/skins/skin-blue.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('theme/plugins/iCheck/square/blue.css')); ?>">
    
    <link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
        textarea {
            resize: none;
            width: 100%;
            min-height: 100px;
            max-height: 150px
        }
    </style>
    <script src="<?php echo e(url('theme/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="<?php echo e(url('theme/index2.html')); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>PEMS</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>PEMS</b></span>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->

                <!-- Navbar Right Menu -->

            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0">
            <!-- Main content -->
            <section class="content container-fluid">
                <?php echo $__env->yieldContent('content'); ?>
            </section>
        </div>
        <footer class="main-footer" style="margin:0">
            <strong>Copyright &copy; <?php echo e(date("Y")); ?> <a href="<?php echo e(url('')); ?>">PEMS</a>.</strong> All rights reserved.
        </footer>
        <div class="control-sidebar-bg"></div>
    </div>

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
    <!-- CK Editor -->
    <script src="<?php echo e(url('theme/bower_components/ckeditor/ckeditor.js')); ?>"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?php echo e(url('theme/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')); ?>"></script>
    
</body>

</html>