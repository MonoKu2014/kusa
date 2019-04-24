<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>Valores de Despacho</h1>
            <p>Los campos marcados con (*) son obligatorios
                <a href="<?= base_url();?>despacho" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
            <?= $this->session->flashdata('mensaje');?>
			<form method="post" action="<?= base_url();?>despacho/guardar_despachos">
                <div class="col-lg-12">
                    <p class="bg-info">
                    Sólo tienes 4 tipos de despacho y le puedes dar rangos a cada uno por separado, se validará que ningún rango quede dentro de otro.
                    Por ejemplo: rango 1 es de 0 a 12.000, rango 2 debe ser mayor a 12.000 o empezar de 12.001.
                    <br>NOTA: los valores deben ir sin puntos, por ejemplo: 12000, 25000, etc.
                    </p>
                </div>

				<div class="col-lg-4">
                    <span>Desde (RANGO UNO - PEQUEÑO)</span>
					<input type="number" class="form-control" name="rango_uno_desde" value="<?= $despachos[0]->desde_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Hasta (RANGO UNO - PEQUEÑO)</span>
					<input type="number" class="form-control" name="rango_uno_hasta" value="<?= $despachos[0]->hasta_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Valor (COBRO DESPACHO PEQUEÑO)</span>
					<input type="number" class="form-control" name="cobro_despacho_uno" value="<?= $despachos[0]->cobro_despacho;?>">
				</div>
                <div class="clearfix"></div>


				<div class="col-lg-4">
                    <span>Desde (RANGO DOS - MEDIANO)</span>
					<input type="number" class="form-control" name="rango_dos_desde" value="<?= $despachos[1]->desde_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Hasta (RANGO DOS - MEDIANO)</span>
					<input type="number" class="form-control" name="rango_dos_hasta" value="<?= $despachos[1]->hasta_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Valor (COBRO DESPACHO MEDIANO)</span>
					<input type="number" class="form-control" name="cobro_despacho_dos" value="<?= $despachos[1]->cobro_despacho;?>">
				</div>
                <div class="clearfix"></div>


				<div class="col-lg-4">
                    <span>Desde (RANGO TRES - GRANDE)</span>
					<input type="number" class="form-control" name="rango_tres_desde" value="<?= $despachos[2]->desde_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Hasta (RANGO TRES - GRANDE)</span>
					<input type="number" class="form-control" name="rango_tres_hasta" value="<?= $despachos[2]->hasta_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Valor (COBRO DESPACHO GRANDE)</span>
					<input type="number" class="form-control" name="cobro_despacho_tres" value="<?= $despachos[2]->cobro_despacho;?>">
				</div>
                <div class="clearfix"></div>


				<div class="col-lg-4">
                    <span>Desde (RANGO CUATRO - ESPECIAL)</span>
					<input type="number" class="form-control" name="rango_cuatro_desde" value="<?= $despachos[3]->desde_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Hasta (RANGO CUATRO - ESPECIAL)</span>
					<input type="number" class="form-control" name="rango_cuatro_hasta" value="<?= $despachos[3]->hasta_valor_despacho;?>">
				</div>
                <div class="col-lg-4">
                    <span>Valor (COBRO DESPACHO ESPECIAL)</span>
					<input type="number" class="form-control" name="cobro_despacho_cuatro" value="<?= $despachos[3]->cobro_despacho;?>">
				</div>
                <div class="clearfix"></div>



				<div class="col-lg-12">
					<input type="submit" class="btn btn-success" value="Guardar">
				</div>
			</form>
			<div class="clearfix"></div><hr>
        </div>




</div>