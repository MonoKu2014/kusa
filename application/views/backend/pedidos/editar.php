

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Editar pedido n° <?= $pedido[0]->id_pedido;?></h1>
				<a href="<?= base_url();?>pedidos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <?= $this->session->flashdata('mensaje');?>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

        <div class="row">
            <form method="post" action="<?= base_url();?>pedidos/guarda_direccion_descuento">
            <input type="hidden" name="id_pedido" value="<?= $pedido[0]->id_pedido;?>">
            <input type="hidden" name="es_canasta" value="<?= $pedido[0]->canasta;?>">
            <div class="col-md-12">
            <h4>Editar Dirección de Entrega</h4>
            <p>Estos son los datos de dirección que registró tu cliente al realizar el pedido.</p>
            <div class="row">
                <div class="col-md-4">
                    <select class="form-control" name="comuna">
                        <?php foreach ($this->functions->listarComunas() as $c) { ?>
                            <option <?php if($c->nombre_comuna == $pedido[0]->comuna_dato){ echo 'selected'; } ?> value="<?= $c->nombre_comuna;?>"><?= $c->nombre_comuna;?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="direccion" class="form-control" value="<?= $pedido[0]->direccion_dato;?>">
                </div>
            </div>


            <h4>Agregar Descuento <small>(Solo las canastas pueden tener descuento)</small></h4>
            <div class="row">
                <div class="col-md-4">
                    <input <?php if($pedido[0]->canasta == 0){ echo 'disabled'; } ?> type="number" name="descuento" class="form-control" value="<?= $pedido[0]->descuento_canasta;?>">
                </div>
            <div class="col-md-2">
                <input type="submit" value="Guardar dirección y descuento" class="btn btn-success">
            </div>
            </div>
            </form>
            <hr>
            </div>
        </div>

        <div class="row">
        <form method="post" action="<?= base_url();?>pedidos/agregar_producto_edicion">
        <div class="col-md-12">
            <?php if($pedido[0]->canasta != 0){ ?>
            <p>OBSERVACIONES: este pedido fue realizado con la compra de una canasta a través de tu sitio web, la canasta es:
                <strong><?= $this->functions->nombre_canasta($pedido[0]->canasta); ?></strong>
            </p>
            <?php } ?>

        <h4>Agregar un producto al pedido</h4>
        </div>
            <div class="col-md-6">
                <select name="producto" class="form-control" required>
                    <?php foreach ($productos as $producto): ?>
                        <option value="<?= $producto->id_producto;?>"><?= $producto->nombre_producto;?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="col-md-4">
                <input type="number" name="cantidad" class="form-control" required>
                <input type="hidden" name="id_pedido" value="<?= $pedido[0]->id_pedido;?>">
            </div>
            <div class="col-md-2">
                <input type="submit" value="Agregar" class="btn btn-success">
            </div>
        </form>
        </div>

        <hr>

        <form method="post" action="<?= base_url();?>pedidos/guardar_edicion">

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
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                    <?php $subtotal = 0; ?>
                    <?php foreach ($pedido as $p): ?>
                        <tr>
                            <td><?= $p->nombre_producto;?></td>
                            <td>
                            <input type="hidden" name="id[]" value="<?= $p->id_producto_pedido;?>">
                            <input type="number" name="cantidad[]" class="form-control" value="<?= $p->cantidad_producto;?>">
                            </td>
                            <td><?= $p->valor_venta;?></td>
                            <td><?= $p->cantidad_producto * $p->valor_venta;?></td>
                            <td><a class="btn btn-danger" href="<?= base_url();?>pedidos/eliminar_producto/<?= $p->id_producto_pedido;?>">Eliminar producto</a></td>
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

                <p><input type="submit" name="submit" class="btn btn-success" value="Guardar"></p>



        </form>
		</div>

</div>