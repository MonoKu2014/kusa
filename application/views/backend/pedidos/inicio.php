

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
									<?php if($p->estado_pedido == 0):?>
										<li><a href="#" data-id="<?= $p->id_pedido;?>" class="pagado">Pagado</a></li>
									<?php endif;?>
									<?php if($p->estado_pedido == 1):?>
										<li><a href="#" data-id="<?= $p->id_pedido;?>" class="preparando_productos">Preparando productos</a></li>
									<?php endif;?>
									<?php if($p->estado_pedido == 2):?>
										<li><a href="#" data-id="<?= $p->id_pedido;?>" class="despachados">Productos despachados</a></li>
									<?php endif;?>
									<?php if($p->estado_pedido == 3):?>
										<li><a href="#" data-id="<?= $p->id_pedido;?>" class="entregado">Productos entregados</a></li>
									<?php endif;?>
									<?php if($p->estado_pedido == 0):?>
										<li><a href="#" data-id="<?= $p->id_pedido;?>" class="cancelar">Cancelar pedido</a></li>
									<?php endif;?>

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


	//estado 0 permite marcar pagado
	$('.pagado').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		pagado(id, 'pedidos/pagado');
	});


	//estado 1 permite preparar productos
	$('.preparando_productos').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		preparando_productos(id, 'pedidos/preparando_productos');
	});


	//estado 2 permite marcar como despachados
	$('.despachados').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		despachados(id, 'pedidos/despachados');
	});


	//estado 3 permite marcar como entregados
	$('.entregado').on('click', function(e){
		e.preventDefault();
		id = $(this).attr('data-id');
		entregado(id, 'pedidos/entregado');
	});


	//estado 0 permite marcar cancelar
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