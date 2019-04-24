<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Productos a la Orden de Salida <?= $salida[0]->id_salida; ?></h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>salida" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>


			<form id="add-user" method="post" action="<?= base_url();?>salida/guarda_productos">

				<div class="col-lg-12">
				<a href="#" id="add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Agregar un nuevo registro</a>
				</div>
				<div class="clearfix"></div>

				<input type="hidden" name="id_salida" value="<?= $salida[0]->id_salida;?>">

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<span>Producto(*):</span>
					<select name="producto[]" class="form-control selector" required id="producto_1" data-id="1">
						<option value="">Seleccione...</option>
		                <?php foreach ($this->functions->productos() as $c) { ?>
							<option value="<?= $c->id_producto;?>" data-valor="<?= $c->precio_producto;?>"><?= $c->nombre_producto;?></option>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<span>Cantidad(*):</span>
					<input type="number" id="cantidad_1" name="cantidad[]" class="form-control required cantidad" required data-id="1">
				</div>

				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<span>Monto(*):</span>
					<input type="number" id="monto_1" name="monto[]" class="form-control required disabled" readonly placeholder="cálculo automático">
				</div>

				<div id="contenido"></div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>

<script>

var aux = 2;

$('#add').on('click', function(e){

	e.preventDefault();

	$.ajax({
		type: 'post',
		url:  '<?php echo base_url();?>salida/agregar_fila',
		data:{ aux:aux },
		success: function(res){
			$('#contenido').append(res);
			aux++;
		}
	});


});

$('.cantidad').on('keyup', function(){
	var dataId = $(this).data('id');
	var cantidad = $(this).val();
	var valor = $('#producto_' + dataId + ' option:selected').data('valor');
	var total = valor * cantidad;
	$('#monto_' + dataId).val(total);
});

$(document).ready(function() {
    $('.selector').select2();
});

</script>