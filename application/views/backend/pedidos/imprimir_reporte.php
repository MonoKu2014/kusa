<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title>PEDIDO</title>

    <!-- ARCHIVOS DE JS PARA PANEL DE CONTROL -->
    <script type="text/javascript" src="<?= base_url();?>components/js/jquery.js"></script>
    <script type="text/javascript" src="<?= base_url();?>components/bootstrap/js/bootstrap.js"></script>

    <!-- ARCHIVOS DE CSS PARA PANEL DE CONTROL -->
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>components/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>components/css/main_backend.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>components/font-awesome/css/font-awesome.min.css">


</head>

<body>

<div id="main-content">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header" style="background: #fff;">
            <h3>REPORTE DESPACHO DIARIO - FECHA <?= $fecha;?></h3>
            <h3>Este reporte incluye los pedidos N°:
            <?php foreach ($numeros as $n): ?>
                <b><?= $n->id_pedido;?>, </b>
            <?php endforeach ?>
            </h3>
            <button class="btn btn-primary" onclick="window.print()">IMPRIMIR REPORTE</button>
            <a href="<?= base_url(); ?>pedidos" class="btn btn-default">Volver Atrás</a>
            </p>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron" style="background: #fff;">

        <div class="table-responsive" style="min-height: 500px;">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>PRODUCTO</th>
                        <th>PRECIO UNITARIO</th>
                        <th>CANTIDAD</th>
                        <th>TOTAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pedidos as $p): ?>
                    <tr>
                        <td><?= $p->nombre_producto;?></td>
                        <td><?= $this->functions->moneda($p->precio_producto);?></td>
                        <td><?= $p->cantidad;?></td>
                        <td><?= $this->functions->moneda($p->precio_producto * $p->cantidad);?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

        </div>

</div>




</body>
</html>
