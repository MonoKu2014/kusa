

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Pedidos Pendientes</h1>
			<p>Listado de pedidos pendientes
            <br><br>
			</p>
		</div>



			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

				<?= $this->session->flashdata('mensaje'); ?>

				<div class="clearfix"></div>

				<div class="table-responsive" style="min-height: 500px;">
					<table class="table table-striped table-bordered">
				        <thead>
				            <tr>
				                <th>N°</th>
				                <th>Cliente</th>
				                <th>Fecha pedido</th>
				                <th>Fecha despacho</th>
				                <th>Canasta</th>
				                <th>Estado</th>
				                <th>Correo Enviado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($pedidos as $p){ ?>
				            <tr>
				                <td><?= $p->id_pedido;?></td>
				                <td><?= $p->nombre_cliente;?></td>
				                <td><?= $p->fecha_pedido;?></td>
				                <td><?= $p->fecha_despacho;?></td>
				                <td>
				                	<?php
				                		if($p->canasta != 0){
				                			echo $this->functions->nombre_canasta($p->canasta);
				                		} else {
				                			echo 'N/A';
				                		}
				                	?>
				                </td>
				                <td><?= $this->functions->estado_pedido($p->estado_pedido);?></td>
				                <td>
				                	<?php
				                		if($p->enviado != 0){
				                			echo '<span class="label label-success">Enviado</span>';
				                		} else {
				                			echo '<span class="label label-danger">No Enviado</span>';
				                		}
				                	?>
				                </td>
				                <td>
				                <div class="btn-group-vertical">
				                <a class="btn btn-primary" href="<?= base_url();?>pedidos/enviar_pedido_temporal/<?= $p->id_pedido;?>">Generar Pedido</a>
				                <a data-id="<?= $p->id_pedido;?>" class="btn btn-danger delete">Eliminar</a>
				                <a data-id="<?= $p->id_pedido;?>" class="btn btn-success email">Enviar Email</a>
				                </div>
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
		ConfirmAlert(id_delete, '<?php echo base_url();?>pedidos/eliminar_pedido_temporal');
	});

	$('.email').on('click', function(){
		id_delete = $(this).attr('data-id');
		SendEmail(id_delete, '<?php echo base_url();?>pedidos/enviar_email_pendiente');
	});

});
</script>