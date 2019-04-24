

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Proveedor</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>proveedores" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>proveedores/guarda_proveedor">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Rut(*):</span>
					<input type="text" id="rut" name="rut" class="form-control required">
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Nombre(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control required">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Email(*):</span>
					<input type="text" id="email" name="email" class="form-control required">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Fono(*):</span>
					<input type="text" id="fono" name="fono" class="form-control required">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Dirección(*):</span>
					<input type="text" id="direccion" name="direccion" class="form-control required">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Contacto Proveedor(*):</span>
					<input type="text" id="contacto" name="contacto" class="form-control required">
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>proveedores" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>