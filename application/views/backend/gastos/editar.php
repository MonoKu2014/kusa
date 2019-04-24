

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Editar Gastos</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>gastos" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>gastos/editar_gasto">
				<input type="hidden" name="id_gasto" value="<?= $gasto[0]->id_gasto;?>">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Monto del gasto(*):</span>
					<input type="number" id="monto" name="monto" class="form-control required" value="<?= $gasto[0]->monto_gasto;?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Sucursal(*):</span>
					<select name="sucursal" class="form-control" required>
						<option value="">Seleccione...</option>
		                <?php foreach ($this->functions->sucursales() as $c) { ?>
							<option <?php if($gasto[0]->id_sucursal == $c->id_sucursal){ echo 'selected'; } ?> value="<?= $c->id_sucursal;?>"><?= $c->nombre_sucursal;?></option>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Tipo de Gasto(*):</span>
					<select name="tipo" class="form-control" required>
						<option value="">Seleccione...</option>
		                <?php foreach ($this->functions->tipos_gastos() as $c) { ?>
							<option <?php if($gasto[0]->id_tipo_gasto == $c->id_tipo_gasto){ echo 'selected'; } ?> value="<?= $c->id_tipo_gasto;?>"><?= $c->tipo_gasto;?></option>
						<?php } ?>
					</select>
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Fecha del gasto(*):</span>
					<input type="date" id="fecha" name="fecha" class="form-control required" value="<?= $gasto[0]->fecha_gasto;?>">
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Observación:</span>
					<textarea name="observacion" id="obs" cols="30" rows="10" class="form-control"><?= $gasto[0]->observacion_gasto;?></textarea>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" id="save-button" class="btn btn-success">Editar</button>
			        <a href="<?=base_url();?>gastos" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>