

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Tipos de Gastos</h1>
			<p>Listado de tipos de gastos por sucursal
				<a href="tipogastos/agregar" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Agregar tipo de gasto</a>
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
				                <th>Tipo de Gasto</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($tipogastos as $c){ ?>
				            <tr>
				            	<td><?= $c->id_tipo_gasto;?></td>
				                <td><?= $c->tipo_gasto;?></td>
				                <td>
				                	<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $c->id_tipo_gasto;?>"><i class="fa fa-trash"></i></button>
				                	<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Editar registro" href="tipogastos/editar/<?= $c->id_tipo_gasto;?>"><i class="fa fa-pencil"></i></a>
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
		ConfirmAlert(id_delete, 'tipogastos/eliminar');
	});
});
</script>