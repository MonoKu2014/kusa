

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Productos</h1>
			<p>Crea, edita y elimina los productos de tu sitio web<br>
				<a href="<?= base_url();?>productos/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar Producto</a>
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
				                <th>Imagen</th>
				                <th>Código</th>
				                <th>Producto</th>
								<th>Stock</th>
				                <th>Precio</th>
				                <th>Categoría</th>
				                <th>Estado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($productos as $u){ ?>
				            <tr>
				                <td><?= $u->imagen_1;?></td>
				                <td><?= $u->codigo_producto;?></td>
				                <td><?= $u->nombre_producto;?></td>
				                <td><?= $u->stock_real;?></td>
				                <td><?= $u->precio_producto;?></td>
				                <td><?= $u->nombre_categoria;?></td>
				                <td><?= ($u->id_estado == 0) ? '<span class="label label-danger">Inactivo</span>' : '<span class="label label-success">Activo</span>'; ?></td>
				                <td>


								  <a href="#" data-id="<?= $u->id_producto;?>" class="delete btn btn-danger"><i class="fa fa-trash"></i></a>
								  <a href="productos/editar/<?= $u->id_producto;?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
								  	<?php if($u->id_estado == 0){ ?>
								  		<a title="ACTIVAR" href="#" data-id="<?= $u->id_producto;?>" class="activar btn btn-success"><i class="fa fa-power-off"></i></a>
								  	<?php } else { ?>
										<a title="DESACTIVAR" href="#" data-id="<?= $u->id_producto;?>" class="desactivar btn btn-danger"><i class="fa fa-power-off"></i></a>
									<?php } ?>
									<a title="RELACIONAR PRODUCTOS" href="productos/relacionar/<?= $u->id_producto;?>" class="btn btn-success"><i class="fa fa-exchange"></i></a>
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

	$('.delete').on('click', function(e){
		e.preventDefault();
		id_delete = $(this).attr('data-id');
		ConfirmAlert(id_delete, 'productos/eliminar');
	});

	$('.activar').on('click', function(e){
		e.preventDefault();
		id_delete = $(this).attr('data-id');
		activar(id_delete, 'productos/activar');
	});

	$('.desactivar').on('click', function(e){
		e.preventDefault();
		id_delete = $(this).attr('data-id');
		desactivar(id_delete, 'productos/desactivar');
	});



	$('.destacar').on('click', function(e){
		e.preventDefault();
		id_delete = $(this).attr('data-id');
		destacar(id_delete, 'productos/destacar');
	});

	$('.no_destacar').on('click', function(e){
		e.preventDefault();
		id_delete = $(this).attr('data-id');
		no_destacar(id_delete, 'productos/no_destacar');
	});



});
</script>