

<div id="main-content">


	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
		<a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
	</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
			<h1>Editar Vendedor</h1>
			<p>Los campos marcados con (*) son obligatorios
				<a href="<?= base_url();?>vendedores" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
				<div class="clearfix"></div>
			</p>
		</div>



		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

			<?= $this->session->flashdata('mensaje');?>

			<form id="add-user" method="post" action="<?= base_url();?>vendedores/editar_vendedor">
				<input type="hidden" name="id_vendedor" value="<?= $vendedor->id_vendedor;?>">

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Nombre(*):</span>
					<input type="text" id="nombre" name="nombre" class="form-control required" value="<?= $vendedor->nombre_vendedor; ?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Rut(*):</span>
					<input type="text" id="rut" name="rut" class="form-control required" value="<?= $vendedor->rut_vendedor; ?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Email(*):</span>
					<input type="text" id="email" name="email" class="form-control required" value="<?= $vendedor->email_vendedor; ?>">
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Fono(*):</span>
					<input type="number" id="fono" name="fono" class="form-control required" value="<?= $vendedor->fono_vendedor; ?>">
				</div>


				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Password(*):</span>
					<input type="text" id="password" name="password" class="form-control required" value="<?= $vendedor->password_vendedor; ?>">
					<p class="bg-info" style="font-size: 12px;">Deja el password en blanco y el sistema automáticamente creará uno.</p>
				</div>

				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<span>Estado(*):</span>
					<select name="estado" id="estado" class="form-control required">
						<?php foreach($estados as $e){ ?>
							<option <?php if($vendedor->estado_vendedor == $e->id_estado){ echo 'selected'; }?> value="<?= $e->id_estado;?>"><?= $e->estado;?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			      	<button type="submit" class="btn btn-success">Editar</button>
			        <a href="<?=base_url();?>vendedores" type="button" class="btn btn-danger">Cancelar</a>
				</div>

				<div class="clearfix"></div>
			</form>


		</div>

</div>