<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>REPORTE</title>
    <link href="<?= base_url();?>public/css/bootstrap_backend.css" rel="stylesheet">
</head>
<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
}
</style>
<body>

    <div id="main-content">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h3>REPORTE DESPACHO DIARIO - FECHA <?= $fecha;?></h3>
            <h3>Este reporte incluye los pedidos N°:
            <?php foreach ($numeros as $n): ?>
                <b><?= $n->id_pedido;?>, </b>
            <?php endforeach ?>
            </h3>
            </p>
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

        <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width: 100%;">
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