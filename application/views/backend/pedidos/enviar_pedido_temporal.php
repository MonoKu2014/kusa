

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Detalle del pedido TEMPORAL n° <?= $pedido[0]->id_pedido;?></h1>
			<b>FECHA DE ENTREGA: <?= $pedido[0]->fecha_despacho;?></b><br>
			<b>CÓDIGO TRANSFERENCIA: <?= $pedido[0]->codigo_transferencia;?></b>
				<a href="<?= base_url();?>pedidos/pendientes" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
            <?php if($pedido[0]->canasta != 0){ ?>
            <p>OBSERVACIONES: este pedido fue realizado con la compra de una canasta a través de tu sitio web, la canasta es:
                <strong><?= $this->functions->nombre_canasta($pedido[0]->canasta); ?></strong>
            </p>
            <?php } ?>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

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
                            <td><?= $p->precio_producto;?></td>
                            <td><?= $p->cantidad_producto * $p->precio_producto;?></td>
                        </tr>

                      <?php
                      $subtotal = $subtotal + ($p->precio_producto * $p->cantidad_producto);
                      $subtotal_parcial = $subtotal;
                      ?>


                    <?php endforeach ?>

                      <?php
                      $subtotal = $this->functions->suma_despacho($subtotal, $p->comuna_dato);
                      $descuento = $pedido[0]->descuento_pedido;
                      if($descuento > 0){
                        $subtotal = ceil($subtotal - ($subtotal * $descuento / 100));
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

                <div class="col-lg-12">
                    <a class="btn btn-success" href="<?= base_url();?>pedidos/enviar_pendiente/<?= $pedido[0]->id_pedido;?>">Enviar Pedido</a>
                </div>
                </p>


		</div>

</div>