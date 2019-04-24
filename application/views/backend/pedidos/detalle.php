

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Detalle del pedido n° <?= $pedido[0]->id_pedido;?></h1>
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
                      ?>

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
				</p>


		</div>

</div>