<?php
for ($x = 1; $x < 5; $x++) {

	$nombre = 'imagen_' . $x;

	if($producto[0]->$nombre != ''){
		$cantidad = $cantidad + 1;
	}
}
?>

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Editar Producto</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>productos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<div class="clearfix"></div>
			<br>

			<form enctype="multipart/form-data" method="post" action="<?= base_url();?>productos/editar_producto">

			<input type="hidden" name="id_producto" value="<?= $producto[0]->id_producto;?>">
			<input type="hidden" name="imagen_actual_1" value="<?= $producto[0]->imagen_1;?>">
			<input type="hidden" name="imagen_actual_2" value="<?= $producto[0]->imagen_2;?>">
			<input type="hidden" name="imagen_actual_3" value="<?= $producto[0]->imagen_3;?>">
			<input type="hidden" name="imagen_actual_4" value="<?= $producto[0]->imagen_4;?>">

				<p>Estas son las imágenes de tu producto</p>
				<div class="col-md-2">
					<h4>IMAGEN 1</h4>
					<?php if($producto[0]->imagen_1 != ''): ?>
						<img src="<?= base_url();?>assets/manager/productos/<?= $producto[0]->imagen_1;?>" class="img-responsive">
					<?php else: ?>
						<h5>Sin imagen</h5>
					<?php endif; ?>
				</div>
				<div class="col-md-2">
					<h4>IMAGEN 2</h4>
					<?php if($producto[0]->imagen_2 != ''): ?>
						<img src="<?= base_url();?>assets/manager/productos/<?= $producto[0]->imagen_2;?>" class="img-responsive">
					<?php else: ?>
						<h5>Sin imagen</h5>
					<?php endif; ?>
				</div>
				<div class="col-md-2">
					<h4>IMAGEN 3</h4>
					<?php if($producto[0]->imagen_3 != ''): ?>
						<img src="<?= base_url();?>assets/manager/productos/<?= $producto[0]->imagen_3;?>" class="img-responsive">
					<?php else: ?>
						<h5>Sin imagen</h5>
					<?php endif; ?>
				</div>
				<div class="col-md-2">
					<h4>IMAGEN 4</h4>
					<?php if($producto[0]->imagen_4 != ''): ?>
						<img src="<?= base_url();?>assets/manager/productos/<?= $producto[0]->imagen_4;?>" class="img-responsive">
					<?php else: ?>
						<h5>Sin imagen</h5>
					<?php endif; ?>
				</div>

				<div class="clearfix"></div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Producto(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control" required value="<?= $producto[0]->nombre_producto;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Stock Real(*):</span>
					<input type="number" id="stock" name="stock" class="form-control" required value="<?= $producto[0]->stock_real;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Código de Producto(*):</span>
					<input type="text" id="codigo" name="codigo" class="form-control" required value="<?= $producto[0]->codigo_producto;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Categoria(*):</span>
					<select name="categoria" class="form-control" required>
		                <?php foreach ($this->functions->listarCategoriasDos() as $c) { ?>
							<option <?php if($producto[0]->id_categoria == $c->id_categoria){echo 'selected';} ?> value="<?= $c->id_categoria;?>"><?= $c->nombre_categoria;?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Precio(*):</span>
					<input type="number" name="precio" class="form-control" required value="<?= $producto[0]->precio_producto;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Precio Oferta(*):</span>
					<input type="number" name="precio_oferta" class="form-control" required value="<?= $producto[0]->precio_oferta;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Estado(*):</span>
					<select name="estado" class="form-control" required>
						<option <?php if($producto[0]->id_estado == 0){echo 'selected';} ?> value="0">Activo</option>
						<option <?php if($producto[0]->id_estado == 1){echo 'selected';} ?> value="1">Inactivo</option>
					</select>
				</div>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span>Descripción:</span>
                    <textarea class="form-control" name="descripcion"><?= $producto[0]->descripcion_producto;?></textarea>
                </div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<span>Ficha(*):</span>
					<p class="bg-info" style="font-size:12px;">
						Sólo fichas en formato PDF
					</p>
					<input type="file" name="ficha" placeholder="Subir Ficha" class="form-control multi" maxlength="1">
				</div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<span>Imagenes(*):</span>
					<p class="bg-info" style="font-size:12px;">
						La imagenes deben ser cuadradas para mantener el aspecto ordenado del sitio (por ejemplo 400x400, 600x600, etc...), sólo se aceptan jpg y png
						<br>
						Máximo 4 imagenes, mínimo 1
					</p>
					<input type="file" name="imagenes[]" placeholder="Subir imagenes" class="form-control multi with-preview" maxlength="<?= $cantidad;?>">
				</div>


				<div class="clearfix"></div>


				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>productos" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>