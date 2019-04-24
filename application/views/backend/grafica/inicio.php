<div id="main-content">


    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-right hidden-lg hidden-md" id="content-button-menu-toggle">
        <a href="#" class="btn btn-primary text-right" id="menu-toggle"><i class="fa fa-bars"></i></a>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-header">
            <h1>Cambiar Gráfica</h1>
            <p>Los campos marcados con (*) son obligatorios
                <a href="<?= base_url();?>grafica" class="btn btn-default pull-right"><i class="fa fa-chevron-left"></i> Volver</a>
                <div class="clearfix"></div>
            </p>
        </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
            <?= $this->session->flashdata('mensaje');?>
			<form method="post" action="<?= base_url();?>grafica/guardar_primera_caluga" enctype="multipart/form-data">
				<div class="col-lg-12">
                <input type="hidden" class="form-control" name="imagen_actual_uno" value="<?= $grafica[0]->imagen_grafica;?>">
					<p>
                    La primera caluga del home de tu sitio tiene la siguiente imagen o vídeo:
                    <?php if($grafica[0]->imagen_grafica != ''):?>
                        <span><a href="<?= base_url();?>assets/manager/web/<?= $grafica[0]->imagen_grafica;?>" target="_blank">Ver imagen</a></span>
                    <?php else:?>
                        <span><a href="<?= desembed_video($grafica[0]->video_grafica); ?>" target="_blank">Ver vídeo</a></span>
                    <?php endif;?>
					</p>
				</div>
                <div class="col-lg-12">
                    <p class="bg-info">
                    Para cambiar la imagen sólo debes subir una nueva, lo mismo para un vídeo.<br>
                    Puedes subir una foto o enlazar un vídeo, pero sólo uno de los dos (por jerarquía quedará la imagen si es que subes ambas)<br>
                    La imagen debe ser de 1200x811 px obligatoriamente
                    </p>
                </div>
                <div class="col-lg-12">
					<input type="text" class="form-control" name="link_uno" value="<?= $grafica[0]->link_grafica;?>" placeholder="Link de redirección (https://kusa.cl/ejemplo)">
				</div>
				<div class="col-lg-5">
					<input type="file" class="form-control" name="imagen_uno" value="">
				</div>
                <div class="col-lg-5">
					<input type="text" class="form-control" name="video_uno" value="<?= desembed_video($grafica[0]->video_grafica); ?>" placeholder="enlaza un vídeo">
				</div>
				<div class="col-lg-2">
					<input type="submit" class="btn btn-success" value="Guardar">
				</div>
			</form>
			<div class="clearfix"></div><hr>
        </div>





        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
			<form method="post" action="<?= base_url();?>grafica/guardar_segunda_caluga" enctype="multipart/form-data">
				<div class="col-lg-12">
                <input type="hidden" class="form-control" name="imagen_actual_dos" value="<?= $grafica[1]->imagen_grafica;?>">
					<p>
                    La segunda caluga del home de tu sitio tiene la siguiente imagen:
                    <?php if($grafica[1]->imagen_grafica != ''):?>
                        <span><a href="<?= base_url();?>assets/manager/web/<?= $grafica[1]->imagen_grafica;?>" target="_blank">Ver imagen</a></span>
                    <?php endif;?>
					</p>
				</div>
                <div class="col-lg-12">
                    <p class="bg-info">
                    Para cambiar la imagen sólo debes subir una nueva<br>
                    La imagen debe ser de 1200x811 px obligatoriamente
                    </p>
                </div>
                <div class="col-lg-12">
					<input type="text" class="form-control" name="link_dos" value="<?= $grafica[1]->link_grafica;?>" placeholder="Link de redirección (https://kusa.cl/ejemplo)">
				</div>
				<div class="col-lg-5">
					<input type="file" class="form-control" name="imagen_dos" value="">
				</div>
				<div class="col-lg-2">
					<input type="submit" class="btn btn-success" value="Guardar">
				</div>
			</form>
			<div class="clearfix"></div><hr>
        </div>




        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
			<form method="post" action="<?= base_url();?>grafica/guardar_tercera_caluga" enctype="multipart/form-data">
				<div class="col-lg-12">
                <input type="hidden" class="form-control" name="imagen_actual_tres" value="<?= $grafica[2]->imagen_grafica;?>">
					<p>
                    La tercera caluga del home de tu sitio tiene la siguiente imagen:
                    <?php if($grafica[2]->imagen_grafica != ''):?>
                        <span><a href="<?= base_url();?>assets/manager/web/<?= $grafica[2]->imagen_grafica;?>" target="_blank">Ver imagen</a></span>
                    <?php endif;?>
					</p>
				</div>
                <div class="col-lg-12">
                    <p class="bg-info">
                    Para cambiar la imagen sólo debes subir una nueva<br>
                    La imagen debe ser de 1200x811 px obligatoriamente
                    </p>
                </div>
                <div class="col-lg-12">
					<input type="text" class="form-control" name="link_tres" value="<?= $grafica[2]->link_grafica;?>" placeholder="Link de redirección (https://kusa.cl/ejemplo)">
				</div>
				<div class="col-lg-5">
					<input type="file" class="form-control" name="imagen_tres" value="">
				</div>
				<div class="col-lg-2">
					<input type="submit" class="btn btn-success" value="Guardar">
				</div>
			</form>
			<div class="clearfix"></div><hr>
        </div>





        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
			<form method="post" action="<?= base_url();?>grafica/guardar_cuarta_caluga" enctype="multipart/form-data">
				<div class="col-lg-12">
                <input type="hidden" class="form-control" name="imagen_actual_cuatro" value="<?= $grafica[3]->imagen_grafica;?>">
					<p>
                    La tercera caluga del home de tu sitio tiene la siguiente imagen:
                    <?php if($grafica[3]->imagen_grafica != ''):?>
                        <span><a href="<?= base_url();?>assets/manager/web/<?= $grafica[3]->imagen_grafica;?>" target="_blank">Ver imagen</a></span>
                    <?php endif;?>
					</p>
				</div>
                <div class="col-lg-12">
                    <p class="bg-info">
                    Para cambiar la imagen sólo debes subir una nueva<br>
                    La imagen debe ser de 1200x811 px obligatoriamente
                    </p>
                </div>
                <div class="col-lg-12">
					<input type="text" class="form-control" name="link_cuatro" value="<?= $grafica[3]->link_grafica;?>" placeholder="Link de redirección (https://kusa.cl/ejemplo)">
				</div>
				<div class="col-lg-5">
					<input type="file" class="form-control" name="imagen_cuatro" value="">
				</div>
				<div class="col-lg-2">
					<input type="submit" class="btn btn-success" value="Guardar">
				</div>
			</form>
			<div class="clearfix"></div><hr>
        </div>




</div>