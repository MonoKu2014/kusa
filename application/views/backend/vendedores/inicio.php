

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Vendedores</h1>
			<p>
				<a href="vendedores/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar Vendedor</a>
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
				                <th>Nombre</th>
				                <th>Email</th>
				                <th>Fono</th>
				                <th>Estado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($vendedores as $u){ ?>
				            <tr>
				                <td><?= $u->nombre_vendedor;?></td>
				                <td><?= $u->email_vendedor;?></td>
				                <td><?= $u->fono_vendedor;?></td>
				                <td><?= $u->estado;?></td>
				                <td>
				                	<!--<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $u->id_vendedor;?>"><i class="fa fa-trash"></i></button>-->
				                	<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar registro" href="vendedores/editar/<?= $u->id_vendedor;?>"><i class="fa fa-pencil"></i></a>
									<?php if($u->id_estado == 2){ ?>
										<button class="btn btn-success activar" data-toggle="tooltip" data-placement="top" title="Activar registro" data-id="<?= $u->id_vendedor;?>"><i class="fa fa-power-off"></i></button>
								  	<?php } else { ?>
										<button class="btn btn-warning desactivar" data-toggle="tooltip" data-placement="top" title="Desactivar registro" data-id="<?= $u->id_vendedor;?>"><i class="fa fa-power-off"></i></button>
									<?php } ?>
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
		ConfirmAlert(id_delete, 'vendedores/eliminar');
	});

	$('.activar').on('click', function(){
		id_delete = $(this).attr('data-id');
		activar(id_delete, 'vendedores/activar');
	});

	$('.desactivar').on('click', function(){
		id_delete = $(this).attr('data-id');
		desactivar(id_delete, 'vendedores/desactivar');
	});

});
</script>