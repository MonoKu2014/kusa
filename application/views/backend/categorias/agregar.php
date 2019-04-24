

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Categoría</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>categorias" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>categorias/guarda_categoria" enctype="multipart/form-data">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Nombre(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control required" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Estado(*):</span>
					<select name="estado" id="estado" class="form-control required" required>
						<?php foreach($estados as $e){ ?>
							<option value="<?= $e->id_estado;?>"><?= $e->estado;?></option>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Tipo Categoría(*):</span>
					<select name="tipo" id="tipo" class="form-control required">
						<option value="plan">Plan</option>
						<option value="producto">Producto</option>
					</select>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Imagen(*):</span>
					<input type="file" name="imagen" class="form-control" required>
					<p class="bg-info" style="font-size:12px;">
						La imagen debe ser cuadrada para mantener el aspecto ordenado del sitio (por ejemplo 400x400, 600x600, etc...), sólo se aceptan jpg y png
					</p>
				</div>



				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>categorias" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>