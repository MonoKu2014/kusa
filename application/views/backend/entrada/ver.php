

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Ver detalle de orden de entrada</h1>
				<a href="<?= base_url();?>entrada" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

				<p style="font-size: 12px;">Orden de entrada N° <?= $entrada[0]->id_entrada; ?></p>
				<p style="font-size: 12px;">Fecha: <?= $entrada[0]->fecha_entrada; ?></p>

				<p style="font-size: 12px;">Cantidad de productos: <?= $this->functions->cantidad_productos($entrada[0]->id_entrada);?></p>
				<p style="font-size: 12px;">Monto total: <?= $this->functions->monto_entrada($entrada[0]->id_entrada);?></p>

				<br>

				<p>Detalle de Orden</p>

				<table class="table table-bordered">
					<thead>
						<th>Producto</th>
						<th>Descripción</th>
						<th>Valor Unitario</th>
						<th>Cantidad</th>
						<th>Total</th>
					</thead>
					<tbody>
						<?php foreach ($detalle as $key => $value): ?>

							<?php $producto = $this->functions->datos_producto($value->id_producto); ?>

							<tr>
								<td><?= $producto->nombre_producto; ?></td>
								<td><?= substr(strip_tags($producto->descripcion_producto), 0, 100);?>...</td>
								<td><?= $producto->precio_producto; ?></td>
								<td><?= $value->cantidad_detalle; ?></td>
								<td><?= $value->monto_detalle; ?></td>
							</tr>

						<?php endforeach ?>
					</tbody>
				</table>

				<div class="clearfix"></div>
			</form>


		</div>

</div>