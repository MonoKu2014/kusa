

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
				<p style="font-size: 14px;">
				Nombre: <?= $pedido[0]->nombre_cliente;?><br>
				Email: <?= $pedido[0]->email_cliente;?><br>
				Fono: <?= $pedido[0]->fono_cliente;?><br>
                Dirección de entrega:
                <?= $pedido[0]->calle_direccion;?> <?= $pedido[0]->numero_direccion;?>,
                <?= region($pedido[0]->region_direccion);?>, <?= commune($pedido[0]->comuna_direccion);?>
				</p>

				<h4>Pedido del carro</h4>
                <table class="table-own table-bordered">
                    <thead>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>SubTotal</th>
                    </thead>
                    <tbody>
                    <?php $subtotal = 0; ?>
                    <?php foreach ($productos as $p): ?>
                        <tr>
                            <td><?= $p->nombre;?></td>
                            <td><?= $p->cantidad;?></td>
                            <td><?= $this->functions->moneda($p->precio);?></td>
                            <td><?= $this->functions->moneda($p->cantidad * $p->precio);?></td>
                        </tr>

                      <?php
                      $subtotal = $subtotal + ($p->precio * $p->cantidad);
                      ?>


                    <?php endforeach ?>

                    <tr>
                        <td colspan="4" class="text-right">
                        <b>Total: $ <?= $this->functions->moneda($subtotal);?></b>
                        </td>
                    </tr>
                    </tbody>
                </table>


		</div>

</div>