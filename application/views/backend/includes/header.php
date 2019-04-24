<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Panel de control</title>

    <!-- ARCHIVOS DE JS PARA PANEL DE CONTROL -->
    <script type="text/javascript" src="<?= base_url();?>assets/manager/js/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/data-tables/jquery.dataTables.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/data-tables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/js/scripts.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/js/jquery-confirm.min.js"></script>
    <script src="<?= base_url(); ?>assets/manager/multifile/jquery.MultiFile.js"></script>


    <!-- ARCHIVOS DE CSS PARA PANEL DE CONTROL -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/css/main_backend.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/data-tables/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/css/jquery-confirm.min.css">

    <link rel="shortcut icon" href="<?= base_url();?>assets/manager/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= base_url();?>assets/manager/images/favicon.ico" type="image/x-icon">

</head>

<script>
    $(document).ready(function(){
        var APP_URL = "<?php echo base_url();?>";
    });
</script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
          selector: "textarea",  // change this value according to your html
          plugins: "paste",
          paste_enable_default_filters: false,
          paste_word_valid_elements: "b,strong,i,em,h1,h2,h3,h4,h5,h6,p,span"
        });</script>

<body>
<!--  INICIO DEL BODY -->

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
        KUSA
      </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
          <span class="glyphicon glyphicon-link" aria-hidden="true"></span> Links<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.google.ch" target="_blank">My Webmail</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="http://www.google.ch" target="_blank">Timelogger</a></li>
            <li><a href="http://www.cubetech.ch" target="_blank">cubetech.ch</a></li>
         </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <?= $this->session->nombre;?><span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="http://www.fgruber.ch/" target="_blank"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> User Settings</a></li>
            <li><a href="/logout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Logout</a></li>
         </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>