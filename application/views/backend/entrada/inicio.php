

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Ordenes de Entrada</h1>
			<p>Listado de ordenes de entradas
				<a href="entrada/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar orden de entrada</a>
				<div class="clearfix"></div>
			</p>
		</div>



			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

				<?= $this->session->flashdata('mensaje'); ?>

				<div class="clearfix"></div>

				<div class="table-responsive">
					<table class="table table-striped table-bordered">
				        <thead>
				            <tr>
				            	<th>ID</th>
				                <th>Fecha</th>
				                <th>Cantidad Productos</th>
				                <th>Monto Total</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($entradas as $c){ ?>
								<?php $cantidad = $this->functions->cantidad_productos($c->id_entrada);?>
								<?php if($cantidad > 0){ ?>
								<tr>
									<td><?= $c->id_entrada;?></td>
									<td><?= $c->fecha_entrada;?></td>
									<td><?= $cantidad;?></td>
									<td><?= $this->functions->monto_entrada($c->id_entrada);?></td>
									<td>
										<!--<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $c->id_entrada;?>"><i class="fa fa-trash"></i></button>-->
										<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Ver registro" href="entrada/ver/<?= $c->id_entrada;?>"><i class="fa fa-eye"></i></a>
									</td>
								</tr>
								<?php } ?>
				        	<?php } ?>
				        </tbody>
					</table>
				</div>
			</div>

</div>

<script>
$(document).ready(function(){
	$('.delete').on('click', function(){
		id_delete = $(this).attr('data-id');
		ConfirmAlert(id_delete, 'entrada/eliminar');
	});
});
</script>