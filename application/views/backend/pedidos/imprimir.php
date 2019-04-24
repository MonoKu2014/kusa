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
            <h1>Detalle del pedido n° <?= $pedido[0]->id_pedido;?></h1>
            <b>FECHA DE ENTREGA: <?= $pedido[0]->fecha_despacho;?></b><br>
            <b>CÓDIGO TRANSFERENCIA: <?= $pedido[0]->codigo_transferencia;?></b>
            <?php if($pedido[0]->canasta != 0){ ?>
            <p>OBSERVACIONES: este pedido fue realizado con la compra de una canasta a través de tu sitio web, la canasta es:
                <strong><?= $this->functions->nombre_canasta($pedido[0]->canasta); ?></strong>
            </p>
            <?php } ?>
            <button class="btn btn-primary" onclick="window.print()">IMPRIMIR REPORTE</button>
            <a href="<?= base_url(); ?>pedidos" class="btn btn-default">Volver Atrás</a>
        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron" style="background: #fff;">

                <h4>Datos del cliente</h4>
                <p>
                Nombre: <?= $pedido[0]->nombre_cliente;?><br>
                Email: <?= $pedido[0]->email_cliente;?><br>
                Fono: <?= $pedido[0]->fono_cliente;?>
                </p>

                <h4>Pedido del carro</h4>
                <table class="table-own table-bordered">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                    </thead>
                    <tbody>
                    <?php $subtotal = 0; ?>
                    <?php foreach ($pedido as $p): ?>
                        <tr>
                            <td><?= $p->nombre_producto;?></td>
                            <td><?= $p->cantidad_producto;?></td>
                            <td><?= $p->valor_venta;?></td>
                            <td><?= $p->cantidad_producto * $p->valor_venta;?></td>
                        </tr>

                      <?php
                      $subtotal = $subtotal + ($p->valor_venta * $p->cantidad_producto);
                      $subtotal_parcial = $subtotal;
                      ?>


                    <?php endforeach ?>

                      <?php
                      $subtotal = $this->functions->suma_despacho($subtotal, $p->comuna_dato);
                      $descuento = $pedido[0]->descuento_pedido;
                      if($descuento > 0){
                        $subtotal = ceil($subtotal - ($subtotal * $descuento / 100));
                      }
                      if($pedido[0]->canasta != 0 && $pedido[0]->descuento_canasta != 0){
                        $subtotal = $subtotal - $pedido[0]->descuento_canasta;
                      }
                      ?>

                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Subtotal <?= $this->functions->moneda($subtotal_parcial); ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Despacho <?= $this->functions->moneda($this->functions->mostrar_valor_despacho($subtotal_parcial, $pedido[0]->comuna_dato)); ?></b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Descuento (<?= $pedido[0]->descuento_pedido;?>%) <?= $this->functions->moneda(ceil($subtotal * $descuento / 100)); ?>
                        </b>
                        </td>
                    </tr>

                    <?php if($pedido[0]->canasta != 0 && $pedido[0]->descuento_canasta != 0){ ?>
                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Descuento Canasta <?= $this->functions->moneda($pedido[0]->descuento_canasta); ?>
                        </b>
                        </td>
                    </tr>
                    <?php } ?>

                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Total: $ <?= $this->functions->moneda($subtotal);?></b>
                        </td>
                    </tr>
                    </tbody>
                </table>


                <h4>Datos de despacho</h4>

                <div class="clearfix"></div>

                <p>
                Nombre: <?= $pedido[0]->nombre_dato;?><br>
                Comuna: <?= $pedido[0]->comuna_dato;?><br>
                Dirección: <?= $pedido[0]->direccion_dato;?><br>
                Fono: <?= $pedido[0]->fono_dato;?><br>
                Comentarios: <?= $pedido[0]->comentario_dato;?><br>
                <b>FECHA DE ENTREGA: <?= $pedido[0]->fecha_despacho;?></b>
                </p>

                <p>Ingrese sus observaciones</p>
                <textarea class="form-control" rows="6"></textarea>


        </div>

</div>




</body>
</html>
