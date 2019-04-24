

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Cupón de Descuento</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>cupones" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>cupones/guarda_cupon" enctype="multipart/form-data">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Código(*):</span>
					<input type="text" id="codigo" name="codigo" class="form-control required" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Descuento(*):</span>
					<input type="text" id="descuento" name="descuento" class="form-control required" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Fecha expiración(*):</span>
					<input type="date" id="fecha" name="fecha" class="form-control required" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Estado(*):</span>
					<select name="estado" id="estado" class="form-control required">
						<?php foreach($estados as $e){ ?>
							<option value="<?= $e->id_estado;?>"><?= $e->estado;?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Vendedor(*):</span>
					<p class="bg-info" style="font-size:12px;">Puedes asociar un vendedor o simplemente dejar un cupón libre</p>
					<select name="vendedor" id="vendedor" class="form-control required">
						<option value="">Selecciona...</option>
						<option value="0">Cupón de venta libre</option>
						<?php foreach($vendedores as $e){ ?>
							<option value="<?= $e->id_vendedor;?>"><?= $e->nombre_vendedor;?></option>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>cupones" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>