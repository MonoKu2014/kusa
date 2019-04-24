

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Editar Categoría</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>categorias" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>categorias/editar_categoria" enctype="multipart/form-data">
				<input type="hidden" name="id_categoria" value="<?= $categoria[0]->id_categoria;?>">
				<input type="hidden" name="imagen_actual" value="<?= $categoria[0]->imagen_categoria;?>">
				<p class="bg-info col-md-6" style="font-size:12px;">
				Esta es la imagen actual de esta categoría, para cambiarla sólo debes subir una nueva imagen y se cambiará automáticamente
				</p>
				<div class="clearfix"></div>
				<div class="col-md-2">
					<img src="<?= base_url();?>assets/manager/categorias/<?= $categoria[0]->imagen_categoria;?>" class="img-responsive">
				</div>

				<div class="clearfix"></div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Nombre(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control required" value="<?= $categoria[0]->nombre_categoria;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Estado(*):</span>
					<select name="estado" id="estado" class="form-control required">
						<?php foreach($estados as $e){ ?>
							<?php if($e->id_estado == $categoria[0]->id_estado){?>
									<option selected value="<?= $e->id_estado;?>"><?= $e->estado;?></option>
							<?php } else { ?>
									<option value="<?= $e->id_estado;?>"><?= $e->estado;?></option>
							<?php } ?>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Tipo Categoría(*):</span>
					<select name="tipo" id="tipo" class="form-control required">
						<option <?php if($categoria[0]->tipo == 'plan'){ echo 'selected'; } ?> value="plan">Plan</option>
						<option <?php if($categoria[0]->tipo == 'plan'){ echo 'producto'; } ?> value="producto">Producto</option>
					</select>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Imagen(*):</span>
					<input type="file" name="imagen" class="form-control">
					<p class="bg-info" style="font-size:12px;">
					La imagen debe ser cuadrada para mantener el aspecto ordenado del sitio (por ejemplo 400x400, 600x600, etc...), sólo se aceptan jpg y png
					</p>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Editar</button>
			        <a href="<?=base_url();?>categorias" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>