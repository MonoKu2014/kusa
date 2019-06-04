

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Clientes</h1>
			<p>Listado de clientes de tu sitio web
				<a href="<?= base_url();?>clientes/agregar" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar Cliente</a>
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
								<th>Rut</th>
				                <th>Email</th>
                                <th>Fono</th>
				                <th>Estado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($clientes as $c){ ?>
				            <tr>
				                <td><?= $c->nombre_cliente;?> <?= $c->apellidop_cliente;?> <?= $c->apellidom_cliente;?></td>
								<td><?= $c->rut_cliente;?></td>
				                <td><?= $c->email_cliente;?></td>
                                <td><?= $c->fono_cliente;?></td>
				                <td><?= $c->estado;?></td>
				                <td>
				                	<button class="btn btn-danger delete" data-toggle="tooltip" data-placement="top" title="Eliminar registro" data-id="<?= $c->id_cliente;?>"><i class="fa fa-trash"></i></button>
				                	<a href="<?= base_url();?>clientes/ver/<?= $c->id_cliente;?>" class="btn btn-success"><i class="fa fa-eye"></i></a>
                                    <!--<a href="<?= base_url();?>clientes/editar/<?= $c->id_cliente;?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>-->
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
		ConfirmAlert(id_delete, 'clientes/eliminar');
	});
});
</script>