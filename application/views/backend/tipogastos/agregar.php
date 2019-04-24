

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Categoría</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>tipogastos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>


			<form id="add-user" method="post" action="<?= base_url();?>tipogastos/guarda_gasto">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Tipo de Gasto(*):</span>
					<input type="text" id="tipo_gasto" name="tipo_gasto" class="form-control required">
				</div>



				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>tipogastos" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>