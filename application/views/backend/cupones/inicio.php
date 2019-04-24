

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Cupones de descuento</h1>
				<a href="cupones/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar Cupón</a>
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
				                <th>Código</th>
				                <th>Descuento</th>
								<th>Fecha Vencimiento</th>
								<th>Vendedor</th>
				                <th>Estado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($cupones as $c){ ?>
				            <tr>
				            	<td><?= $c->id_cupon;?></td>
				                <td><?= $c->codigo_cupon;?></td>
								<td><?= $c->descuento_cupon;?></td>
								<td><?= $c->fecha_vigencia;?></td>
								<td><?= seller_name($c->id_vendedor);?></td>
				                <td><?= $c->estado;?></td>
				                <td>
				                	<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $c->id_cupon;?>"><i class="fa fa-trash"></i></button>
				                	<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar registro" href="cupones/editar/<?= $c->id_cupon;?>"><i class="fa fa-pencil"></i></a>
				                </td>
				            </tr>
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
		ConfirmAlert(id_delete, 'cupones/eliminar');
	});
});
</script>