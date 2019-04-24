

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Agregar Orden de Entrada N° <?= $numero->id_entrada + 1; ?></h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>entrada" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>


			<form id="add-user" method="post" action="<?= base_url();?>entrada/guarda_entrada">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Fecha de Orden(*):</span>
					<input type="date" id="fecha" name="fecha" value="<?= date('Y-m-d');?>" class="form-control required" required>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Guardar</button>
			        <a href="<?=base_url();?>entrada" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>