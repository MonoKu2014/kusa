<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>Panel de control</title>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/js/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url();?>assets/manager/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/css/main_backend.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/manager/font-awesome/css/font-awesome.min.css">
</head>
<body id="login-bg">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="container text-center">
            <form method="post" action="login">
                    <div class="col-lg-4 col-md-4 col-sm-1 hidden-xs"></div>
                    <div class="col-lg-4 col-md-4 col-sm-10 col-xs-12" id="login-box">
                        <img src="<?= base_url();?>assets/manager/images/logo-kusa.svg" class="img-responsive" style="width: 100%;">
                        <h5>Ingresa tus datos</h5>
                        <select name="tipo" id="tipo" class="form-control" required>
                            <option value="">Selecciona Tipo</option>
                            <option value="usuario">Administrador</option>
                            <option value="vendedor">Vendedor</option>
                        </select>
                        <br>
                        <input type="text" placeholder="Ingrese su E-mail" name="email" class="form-control" autocomplete="off" required>
                        <br>
                        <input type="password" placeholder="Ingrese su contraseña" name="password" class="form-control" autocomplete="off" required>
                        <br>
                        <input type="submit" value="Acceder" class="btn btn-success">
                        <div class="clearfix"></div>
                        <br>
                        <!--<p class="remember_password">Olvido su contraseña? Ingrese <a href="recuperar">Aquí</a></p>-->
                        <p></p>
                        <?= $this->session->flashdata('mensaje'); ?>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-1 hidden-xs"></div>
            </form>
        </div>
    </div>

</body>
</html>