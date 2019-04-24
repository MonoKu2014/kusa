
<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Producto</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>productos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>
			<div class="clearfix"></div>
			<br>

			<form enctype="multipart/form-data" method="post" action="<?= base_url();?>productos/guarda_producto">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Producto(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Stock(*):</span>
					<input type="number" id="stock" name="stock" class="form-control" required>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Código de Producto(*):</span>
					<input type="text" id="codigo" name="codigo" class="form-control" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Categoria(*):</span>
					<select name="categoria" class="form-control" required>
						<option value="">Seleccione...</option>
		                <?php foreach ($this->functions->listarCategoriasDos() as $c) { ?>
							<option value="<?= $c->id_categoria;?>"><?= $c->nombre_categoria;?></option>
						<?php } ?>
					</select>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Precio(*):</span>
					<input type="number" name="precio" class="form-control" required>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Precio Oferta(*):</span>
					<input type="number" name="precio_oferta" class="form-control" required>
				</div>

                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <span>Estado(*)</span>
                    <select name="estado" class="form-control" required id="estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <span>Descripción:</span>
                    <textarea class="form-control" name="descripcion"></textarea>
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
					<input type="file" name="imagenes[]" placeholder="Subir imagenes" class="form-control multi with-preview" maxlength="4">
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