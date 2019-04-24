

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Pedidos</h1>
			<p>Listado de pedidos
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
				                <th>Estado</th>
				                <th>Acciones</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php foreach($pedidos as $p){ ?>
				            <tr>
				                <td><?= $p->id_pedido;?></td>
				                <td><?= $p->nombre_cliente;?></td>
				                <td><?= $p->fecha_pedido;?></td>
				                <td><?= $this->functions->estado_pedido($p->estado_pedido);?></td>
				                <td>
								<div class="dropdown">
								  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
								  Acciones
								  <span class="caret"></span></button>
								  <ul class="dropdown-menu" style="font-size: 12px;">
								  <li><a href="<?= base_url();?>pedidos/detalle/<?= $p->id_pedido;?>">Ver Detalle</a></li>
								  <li><a href="#" data-id="<?= $p->id_pedido;?>" class="confirmar">Confirmar pago</a></li>
								  <li><a href="#" data-id="<?= $p->id_pedido;?>" class="cancelar">Cancelar pedido</a></li>
								  <li><a href="#" data-id="<?= $p->id_pedido;?>" class="entregado">Marcar como entregado</a></li>
								  </ul>
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

	$('.entregado').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		entregado(id, 'pedidos/entregado');
	});


	$('.confirmar').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		confirmar(id, 'pedidos/confirmar');
	});


	$('.cancelar').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		cancelar(id, 'pedidos/cancelar');
	});


	$('#pdf').on('click', function(e){
		e.preventDefault();
		fecha = $('#fecha').val();
		pdf(fecha, 'pdf/reporte');
	});


});




</script>