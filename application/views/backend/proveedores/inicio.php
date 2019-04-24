

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Proveedores</h1>
			<p>
				<a href="proveedores/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar Proveedor</a>
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
				            	<th>Rut</th>
				                <th>Nombre</th>
				                <th>Email</th>
				                <th>Fono</th>
				                <th>Dirección</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($proveedores as $u){ ?>
				            <tr>
				            	<td><?= $u->id_proveedor;?></td>
				            	<td><?= $u->rut_proveedor;?></td>
				                <td><?= $u->nombre_proveedor;?></td>
				                <td><?= $u->email_proveedor;?></td>
				                <td><?= $u->fono_proveedor;?></td>
				                <td><?= $u->direccion_proveedor;?></td>
				                <td>
				                	<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $u->id_proveedor;?>"><i class="fa fa-trash"></i></button>
				                	<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar registro" href="proveedores/editar/<?= $u->id_proveedor;?>"><i class="fa fa-pencil"></i></a>
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
		ConfirmAlert(id_delete, 'proveedores/eliminar');
	});
});
</script>